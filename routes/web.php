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
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/', 'Admin\AccountController@index')->name('admin');

        // Категории для статей
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
            ->where('id', '\d+')
            ->name('categories.edit');
        Route::get('/categories/delete/{id}', 'Admin\CategoriesController@deleteCategory')
            ->where('id', '\d+')
            ->name('categories.delete');

        // Категории для точек
        Route::get('/categories-points', 'Admin\CategoriesPointsController@index')->name('categories-points');
        Route::get('/categories-points/add', 'Admin\CategoriesPointsController@addCategory')->name('categories-points.add');
        Route::post('/categories-points/add', 'Admin\CategoriesPointsController@addRequestCategory');
        Route::get('/categories-points/edit/{id}', 'Admin\CategoriesPointsController@editCategory')
            ->where('id', '\d+')
            ->name('categories-points.edit');
        Route::get('/categories-points/delete/{id}', 'Admin\CategoriesPointsController@deleteCategory')
            ->where('id', '\d+')
            ->name('categories-points.delete');
    });
});