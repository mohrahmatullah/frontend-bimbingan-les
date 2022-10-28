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
                $data = Http::withToken(Session::get('token'))->get($this->api_host.'/api/transactions')->json();
                
                $table = $this->getPaginator($data['data'], $request);
                
                return view('transaction.index', compact('table') );
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
        
    }

    public function show(Request $request)
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

    public function showById(Request $request)
    {
        if(Session::get('token')){  
            try{       
                
                $data = Http::withToken(Session::get('token'))->post($this->api_host.'/api/show', [
                    'id_user'        => Session::get('id'),
                    'params'    => 'transaction_list'
                ])->json();


                $table = $data['data'];
                
                return view('transaction.index-by-id', compact('table'));
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

    public function getPaginator($items, $request)
    {
        $total = count($items); // total count of the set, this is necessary so the paginator will know the total pages to display
        $page = $request->page ? $request->page : 1; // get current page from the request, first page is null
        $perPage = 5; // how many items you want to display per page?
        $offset = ($page - 1) * $perPage; // get the offset, how many items need to be "skipped" on this page

        $items = array_slice($items, $offset, $perPage); // the array that we actually pass to the paginator is sliced

        return new LengthAwarePaginator($items, $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);
    }

    public function approveTransaction($id)
    {
        if(Session::get('token')){            
            try{           
                $data = Http::withToken(Session::get('token'))->post($this->api_host.'/api/approve-transactions',[ 'id' => $id ])->json();
                            
                return redirect()->route('list-transactions'); 
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
    }

    public function cancelTransaction($id)
    {
        if(Session::get('token')){            
            try{           
                $data = Http::withToken(Session::get('token'))->post($this->api_host.'/api/cancel-transactions',[ 'id' => $id ])->json();

                return redirect()->route('list-transactions');
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
