<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blog', 'PagesController@blog');
Route::get('/register', 'PagesController@register');
Route::get('/{any}', function () { //keep this route at end if want to server all web routes defined in this file by laravel, rest request will be passed to Vue-router
    return view('welcome');
});
Route::get('/{any}/{slug}', function () { //keep this route at end if want to server all web routes defined in this file by laravel, rest request will be passed to Vue-router
    return view('welcome');
});
