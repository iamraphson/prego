<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);
