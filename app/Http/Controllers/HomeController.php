<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $api_host;
    
    public function __construct()
    {
        $this->api_host = ENV('API_URL');
    }

    public function index()
    {
        if(Session::get('token')){  
            try{   
                return view('home.index');
            }
            catch (\Exception $e) {
                return redirect()->route('error-404'); 
            }
        }
        else{
            return redirect()->route('get-auth'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post( $id = null, Request $request)
    {
        try{        
            if($id){
                $data = Http::get($this->api_host.'/api/posts/category/'.$id)->json();
            }    
            else{
                $data = Http::get($this->api_host.'/api/posts/category/all')->json();  
            }
            
            $table = $this->getPaginator($data, $request);
            $category = Http::get($this->api_host.'/api/list-category')->json();

            return view('eksternal.post.index', compact('table','category'));
        }
        catch (\Exception $e) {
            // return response()->json(['success' => false, 'http_code' => $e->getCode(), 'message' => $e->getMessage()]);
            return redirect()->route('error-404'); 
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail( $id = null )
    {
        try{        
            $table = Http::get($this->api_host.'/api/posts/'.$id)->json();            
            $category = Http::get($this->api_host.'/api/list-category')->json();
            $tag = Http::get($this->api_host.'/api/list-tag')->json();

            return view('eksternal.post.detail', compact('table','category','tag'));
        }
        catch (\Exception $e) {
            // return response()->json(['success' => false, 'http_code' => $e->getCode(), 'message' => $e->getMessage()]);
            return redirect()->route('error-404'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
