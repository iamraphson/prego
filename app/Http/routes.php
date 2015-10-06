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

/*
 * Add new route resources for project
 */

Route::resource('projects', 'ProjectController');

/*
 * tasks routes
 */
Route::post('projects/{projects}/tasks', [
    'uses' => 'ProjectTasksController@postNewTask',
    'as' => 'projects.tasks.create'
]);

Route::get('projects/{projects}/tasks/{tasks}/edit', [
    'uses' => 'ProjectTasksController@getOneProjectTask',
    'as' => 'projects.tasks'
]);

Route::put('projects/{projects}/tasks/{tasks}', [
    'uses' => 'ProjectTasksController@updateOneProjectTask'
]);

Route::delete('projects/{projects}/tasks/{tasks}',[
    'uses' => 'ProjectTasksController@deleteOneProjectTask'
]);

/*
 * files routes
 */
Route::post('projects/{projects}/files',[
   'uses' => 'FilesController@uploadAttachments',
   'middleware' => ['auth'],
   'as' => 'projects.files'
]);

Route::get('projects/{projects}/files/get/{files}', [
     'uses' => 'FilesController@getFile',
     'middleware' => ['auth']
]);
