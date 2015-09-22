<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 9/19/15
 * Time: 19:15
 */
?>
@extends('layouts.master')

@section('content')
    @if(!Auth::check())
    @include('layouts.partials.alerts')
    <h1>Project Management for Human Beings</h1>

    <p>The promise of Prego is simple. All your projects and todos on one screen without having to filter by team or users. Finally, project management built just for humanbeings. Very Intuitve, Slick and crafted with the power of Laravel</p>

    <p><img src="{{ asset('images/projectmanagement.jpg') }}" /></p>

    <a class="btn btn-large btn-info" href=" {{ route('auth.register') }}">Sign Up</a>

    <p class="login">Already signed up? <a class="btn btn-large btn-info" href="{{ route('auth.login')  }}">Login</a></p>
    @elseif(Auth::check())
        <div class="container-fluid">
            <div class="row">
                @include('layouts.partials.sidebar')
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Dashboard</h1>
                    <h2 class="sub-header">Projects</h2>
                    <a class="btn btn-info" href="{{ route('projects.create') }}">New Project</a>
                </div>
            </div>
        </div>
    @endif
@stop
