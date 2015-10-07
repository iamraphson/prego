<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Prego\User;

class accountController extends Controller{

    public function edit(){

        return view('account.editAccount')->with('account', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'username' => 'required|unique:prego_users|alpha_dash|max:20'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->save();

        return redirect()->back()->with('info', 'Your account has been updated successfully');
    }
}
