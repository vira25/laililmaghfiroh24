<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function index()
    {
        return view("login/index");
    }
    function login(Request $request)
    {
        Session::flash('email', $request->email); //untuk menyimpan email sementara
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required'=>'email tidak boleh kosong',
            'password.required'=>'password tidak boleh kosong',
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if (Auth::attempt( $infologin )) { 
           return redirect('pegawai')->with('success', 'Anda berhasil Login');
        } else{
            return redirect('login')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }
    
    function logout()
    {
       Auth::logout(); //cek langsung logout
        return redirect('/login')->with('success', 'Anda telah logout');
    }  
    
    function register()
    {
        return view('login/register');
    }
    
    function create(Request $request) 
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ], [
            'name.required'=>'Nama wahib diisi',
            'email.required'=>'email tidak boleh kosong',
            'email.email'=>'silahkan masukkan email yang valid',
            'email.unique'=>'email sudah pernah digunakan',
            'password.required'=>'password tidak boleh kosong',
            'password.min'=>'Minimum password yang diizinkan adalah 8 karakter'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if (Auth::attempt( $infologin )) {
           return redirect('login')->with('success', Auth::user()->name, 'berhasil Login');
        } else{
            return redirect('login')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }

}

