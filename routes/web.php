<?php

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

//Route::group(['middlware' => 'guest'], function (){

Route::middleware(['guest'])->group(function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my/account', 'AccountController@index')->name('account');
    Route::get('/logout', function (){
        Auth::logout();
        return redirect(route('login'));
    })->name('logout');

    // Админ
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', 'Admin\AccountController@index')->name('admin');
    });
});