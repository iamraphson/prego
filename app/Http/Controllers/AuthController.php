<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;
use Prego\User;

class AuthController extends Controller{
    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $this->validate($request, [
           'email' => 'required|unique:prego_users|email|max:255',
            'username' => 'required|unique:prego_users|alpha_dash|max:20',
            'password' => 'required|min:6'
        ]);

        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('index')->with('info', 'Your account has been created and you can now sign in');
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));
        if(!$authStatus){
            return redirect()->back()->with('error', 'Invalid Email  and Password');
        }
        return redirect()->route('index')->with('info', 'You are now signed in');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
