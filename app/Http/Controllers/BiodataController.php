<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;

class BiodataController extends Controller
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
                $data = Http::withToken(Session::get('token'))->get($this->api_host.'/api/biodata')->json();
                
                $table = $this->getPaginator($data['data'], $request);
                return view('biodata.index', compact('table') );
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
    }

    public function create(Request $request)
    {
        if(Session::get('token')){  
            try{           
                return view('biodata.create');
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
                $response = Http::withToken(Session::get('token'))->post($this->api_host.'/api/biodata', [
                    'nama' => $request->input('nama'),
                    'jk' => $request->input('jk'),
                    'agama' => $request->input('agama'),
                    'alamat' => $request->input('alamat')
                ]);     

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('biodata');
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
        
    }

    public function edit(Request $request, $id)
    {
        if(Session::get('token')){  
            try{         
                $data = Http::withToken(Session::get('token'))->post($this->api_host.'/api/show', [
                    'id_user'        => $id,
                    'params'    => 'biodata_list'
                ])->json();

                $table = $data['data']; 

                return view('biodata.edit',compact('table'));
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
        
    }

    public function update(Request $request, $id)
    {
        if(Session::get('token')){  
            try{   
                $response = Http::withToken(Session::get('token'))->post($this->api_host.'/api/biodata', [
                    'id_user'    =>  $id,
                    'nama' => $request->input('nama'),
                    'jk' => $request->input('jk'),
                    'agama' => $request->input('agama'),
                    'alamat' => $request->input('alamat')
                ]);     
                
                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('edit-biodata', $id);
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
        
    }

    public function delete(Request $request, $id)
    {
        if(Session::get('token')){  
            try{   
                $data = Http::withToken(Session::get('token'))->post($this->api_host.'/api/delete', [
                    'id'        => $id,
                    'params'    => 'biodata_list'
                ])->json();    

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('biodata');
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
}
