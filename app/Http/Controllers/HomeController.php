<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;

class HomeController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('index');
    }
}
