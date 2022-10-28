<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;

class TransactionController extends Controller
{
    protected $api_host;
    
    public function __construct()
    {
        $this->api_host = ENV('API_URL');
    }

    public function index(Request $request)
    {
        if(Session::get('token')){  
            try{       
                
                $biodata = Http::withToken(Session::get('token'))->post($this->api_host.'/api/show', [
                    'id_user'        => Session::get('id'),
                    'params'    => 'biodata_list'
                ])->json();
                $kelas = Http::withToken(Session::get('token'))->get($this->api_host.'/api/kelas')->json();
                $jurusan = Http::withToken(Session::get('token'))->get($this->api_host.'/api/jurusan')->json();
                $jadwal_belajar = Http::withToken(Session::get('token'))->get($this->api_host.'/api/jadwal-belajar')->json();


                $table['biodata'] = $biodata['data'];
                $table['kelas'] = $kelas['data'];
                $table['jurusan'] = $jurusan['data'];
                $table['jadwal_belajar'] = $jadwal_belajar['data'];
                
                return view('transaction.create', $table);
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
        
    }

    public function store(Request $request)
    {
        if(Session::get('token')){  
            try{   
                $response = Http::withToken(Session::get('token'))->post($this->api_host.'/api/transactions', [
                    'id_biodata' => $request->input('id_biodata'),
                    'id_kelas' => $request->input('id_kelas'),
                    'id_jurusan' => $request->input('id_jurusan'),
                    'id_jadwal' => $request->input('id_jadwal'),
                    'les' => $request->input('les')
                ]);     
                if($response){                    
                    $alert_toast = 
                    [
                        'title' => 'Operation Successful',
                        'text'  => 'Successfully melakukan registrasi bimbingan belajar, please check email untuk melakukan pembayaran.',
                        'type'  => 'success',
                    ];
                    Session::flash('alert_toast', $alert_toast);
                    return redirect()->route('transactions');
                }
                else{
                    return redirect()->route('error-404');
                }
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
        
    }
}
