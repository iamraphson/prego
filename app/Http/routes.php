<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);

/**
 * Auth Routes
 */
Route::get('auth/register', [
    'uses' => 'AuthController@getRegister',
    'as' => 'auth.register',
    'middleware' => ['guest']
]);
Route::post('auth/register', [
    'uses' => 'AuthController@postRegister',
    'middleware' => ['guest']
]);
Route::get('auth/signin', [
    'uses' => 'AuthController@getLogin',
    'as' => 'auth.login',
    'middleware' => ['guest']
]);
Route::post('auth/signin', [
    'uses' => 'AuthController@postLogin',
    'middleware' => ['guest']
]);

Route::get('auth/logout', [
    'uses' => 'AuthController@logout',
    'as' => 'auth.logout'
]);