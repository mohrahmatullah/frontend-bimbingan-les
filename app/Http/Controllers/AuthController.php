<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    protected $api_host;
    
    public function __construct()
    {
        $this->api_host = ENV('API_URL');
    }

    public function index(Request $request)
    {
        return view('login.index');
    }

    public function register(Request $request)
    {
        return view('login.register');
    }

    public function saveRegister(Request $request)
    {
       try{   
            $response = Http::post($this->api_host.'/api/register', [
                'fullname'          => $request->input('fullname'),
                'username'              => $request->input('username'),
                'email'             => $request->input('email'),
                'password'          => $request->input('password')
            ]);    

            $alert_toast = 
            [
                'title' => 'Operation Successful',
                'text'  => 'Successfully register akun bimbingan belajar, please login.',
                'type'  => 'success',
            ];
            Session::flash('alert_toast', $alert_toast);

            return redirect()->route('get-auth');
        }
        catch (\Exception $e) {
            return redirect()->route('error-404'); 
        }
    }

    public function auth(Request $request){

        try {
            $response = Http::post($this->api_host.'/api/login', [
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ]);

            if($response->ok()){
                $login = $response->json();

                if($login){
                    Session([
                            'token' => $login['access_token'],
                            'id' => $login['id'],
                            'role' => $login['role'],
                        ]);

                    if($login['role'] == 'admin'){
                        $alert_toast = 
                        [
                            'title' => 'Successfully sign in',
                            'text'  => 'Welcome to dashboard admin',
                            'type'  => 'success',
                        ];
                        Session::flash('alert_toast', $alert_toast);
                        return redirect()->route('dashboard'); 
                    }
                    else{
                        return redirect()->route('transactions');
                    }
                    
                }
                else{
                    return redirect()->route('get-auth');
                }
                
            }
            else{
                return redirect()->route('get-auth'); 
            }

            return back()->with('error', $login->json()['message'])->withInput($request->all());
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'http_code' => $e->getCode(), 'message' => $e->getMessage()]);
        }
    }

    public function forgotPassword(){
        try{           
            return view('login.auth-forgot-password');
        }
        catch (\Exception $e) {
            return redirect()->route('error-404'); 
        }

    }

    public function sendLinkForgotPassword(Request $request){
        try{    
            $checkEmail = Http::post($this->api_host.'/api/check-email', [
                'email'          => $request->input('email')
            ]);

            if(isset($checkEmail['email'])){

                $encrypt_id = Crypt::encrypt($checkEmail['id']);

                $data = Http::post($this->api_host.'/api/send-link-forgot-password', [
                    'email'          => $request->input('email'),
                    'url'          => route('redirect-forgot-password', $encrypt_id)
                ]);

                $alert_toast = 
                [
                    'title' => 'Operation Successful',
                    'text'  => 'Successfully mengirim link forgot password, please check email.',
                    'type'  => 'success',
                ];

                Session::flash('alert_toast', $alert_toast);

                return view('login.auth-forgot-password');
            }       
        }
        catch (\Exception $e) {
            return redirect()->route('error-404'); 
        }

    }

    public function redirectForgotPassword($id){
        try{           
            return view('login.redirect-forgot-password');
        }
        catch (\Exception $e) {
            return redirect()->route('error-404'); 
        }

    }

    public function saveForgotPassword(Request $request, $id){
        try{           
            $decrypt_id = Crypt::decrypt($id); 
            $response = Http::post($this->api_host.'/api/save-forgot-password', [
                'id'                => $decrypt_id,
                'password'          => $request->input('password'),
                'confirm'           => $request->input('confirm')
            ]);    

            $alert_toast = 
            [
                'title' => 'Operation Successful',
                'text'  => 'Successfully merubah password akun bimbingan belajar, please login.',
                'type'  => 'success',
            ];
            Session::flash('alert_toast', $alert_toast);

            return redirect()->route('get-auth');

        }
        catch (\Exception $e) {
            return redirect()->route('error-404'); 
        }

    }

    public function logout(){
        Http::withToken(Session::get('token'))->get($this->api_host.'/api/logout')->json();
        
        Session::flush();

        return redirect()->route('get-auth'); 
    }

    public function error404(){

        return view('error.error-404'); 
    }

    public function profile(){
        if(Session::get('token')){  
            try{           
                $profile = Http::withToken(Session::get('token'))->get($this->api_host.'/api/profile-user')->json();
                return view('profile.index',compact('profile'));
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
