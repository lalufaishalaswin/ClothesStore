<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }

    public function register(Request $request){
        // dd($request->all());
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'fullname' => 'required',
            'password' => 'required|min:8',
            'password2' => 'min:8|same:password'
        ],
        [
            'email.required' => 'Email must be filled',
            'email.unique' => 'Email has been taken',
            'email.email' => 'Email must be email format',
            'password.required' => 'Password must be filled',
            'password.min' => 'Password min length 8',
            'password2.min' => 'Password2 min length 8',
            'password2.same' => 'Password must be same with Password1'
        ]
        );

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create([
            'email' => $request->email,
            'fullname' => $request->fullname,
            'password' => $validatedData['password'],
            'role' => 'Buyer',
        ]);

        return redirect('/login');
    }
}
