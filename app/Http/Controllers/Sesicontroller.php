<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Sesicontroller extends Controller
{
    function Login(){
        return view('loginform.login');
    }
    function LoginData(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required'=>'email wajib diisi',
            'password.required'=>'password wajib diisi',
        ],
    ); 

    $infologin = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($infologin)){
        
    }else{
        return redirect('/loginform')->withErrors('username dan password tidak sesuai')->withInput();
    }

    }

     function createRegister()
    {
        return view('loginform.register');
    }

   
    function register(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       
        Auth::login($user);

        
        return redirect('/loginform')->with('success', 'Registrasi berhasil! Selamat datang.');
    }
   
        
    
}
