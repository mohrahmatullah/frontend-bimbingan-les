<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class DashboardController extends Controller
{
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
}
