<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //
    public function index(){

        return view('login');
    }

    public function login(Request $request){
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            // dd("login");
            $request->session()->regenerate();
            if($request->remember_me){
                Cookie::queue('email',$request->email,10080);
                Cookie::queue('password',$request->password,10080);
            }
            return redirect()->intended('/home');
        }
        else{
            return back();

        }
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
