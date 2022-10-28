<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
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
                $data = Http::withToken(Session::get('token'))->get($this->api_host.'/api/category')->json();
                
                $table = $this->getPaginator($data, $request);
                return view('categories.index', compact('table') );
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
                return view('categories.create');
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
                $response = Http::withToken(Session::get('token'))->post($this->api_host.'/api/category', [
                    'title' => $request->input('title')
                ]);     

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Save Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('category');
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
                $table = Http::withToken(Session::get('token'))->get($this->api_host.'/api/category/'.$id)->json(); 

                return view('categories.edit',compact('table'));
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
                $response = Http::withToken(Session::get('token'))->post($this->api_host.'/api/category/'.$id, [
                    'title' => $request->input('title')
                ]);     

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Update Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('category');
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
                $response = Http::withToken(Session::get('token'))->delete($this->api_host.'/api/category/'.$id);     

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully Delete Data.',
                    'type'  => 'success',
                ];
                Session::flash('alert_toast', $alert_toast);
                return redirect()->route('category');
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
