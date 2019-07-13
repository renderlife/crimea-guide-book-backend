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

Route::group(['middlware' => 'guest'], function (){
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');

});

Route::group(['middlware' => 'auth'], function (){
    Route::get('/my/account', 'AccountController@index')->name('account');
    Route::get('/logout', function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect(route('login'));
    })->name('logout');
});