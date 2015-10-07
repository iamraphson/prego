<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 10/7/15
 * Time: 13:07
 */
?>

@extends('layouts.master')

@section('content')
    @include('layouts.partials.sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @include('layouts.partials.alerts')
        <h1 class="page-header">
            Edit Account
        </h1>

            <div class="col-lg-9">
                <form class="form-vertical" role="form" method="post" action="{{ route('account.edit') }}">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Your email address</label>
                        <input type="text" name="email" class="form-control" id="email" value="{!! $account->email  !!}">
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="control-label">Choose a username</label>
                        <input type="text" name="username" class="form-control" id="username" value="{!! $account->username !!}">
                        @if ($errors->has('username'))
                            <span class="help-block">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {!! method_field('PUT') !!}
                </form>
            </div>
        </div>

@stop
