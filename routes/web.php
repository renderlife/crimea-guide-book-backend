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

// [TODO] Старый синтаксис middlware, выяснить почему так
//Route::group(['middlware' => 'guest'], function (){

//
Route::middleware(['guest'])->group(function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my/account', 'AccountController@index')->name('account');
    Route::get('/logout', function (){
        Auth::logout(); // [TODO] Переписать в контроллер
        return redirect(route('login'));
    })->name('logout');

    // Админка
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        // Главная страница админки (dashboard)
        Route::get('/', 'Admin\AccountController@index')->name('admin');

        // Категории для статей
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')->where('id', '\d+')->name('categories.edit');
        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory')->where('id', '\d+')->name('categories.post-edit');
        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');

        // Категории для точек
        Route::get('/categories-points', 'Admin\CategoriesPointsController@index')->name('categories-points');
        Route::get('/categories-points/add', 'Admin\CategoriesPointsController@addCategory')->name('categories-points.add');
        Route::post('/categories-points/add', 'Admin\CategoriesPointsController@addRequestCategory');
        Route::get('/categories-points/edit/{id}', 'Admin\CategoriesPointsController@editCategory')->where('id', '\d+')->name('categories-points.edit');
        Route::post('/categories-points/edit/{id}', 'Admin\CategoriesPointsController@editRequestCategory')->where('id', '\d+')->name('categories-points.post-edit');
        Route::delete('/categories-points/delete', 'Admin\CategoriesPointsController@deleteCategory')->name('categories-points.delete');

        // Точки
        Route::get('/points', 'Admin\PointsController@index')->name('points');
        Route::get('/points/add', 'Admin\PointsController@addPoint')->name('points.add');
        Route::post('/points/add', 'Admin\PointsController@addRequestPoint');
        Route::get('/points/edit/{id}', 'Admin\PointsController@editPoint')->where('id', '\d+')->name('points.edit');
        Route::post('/points/edit/{id}', 'Admin\PointsController@editRequestPoint')->where('id', '\d+')->name('points.post-edit');
        Route::delete('/points/delete', 'Admin\PointsController@deletePoint')->name('points.delete');

        // Комментарии точек
        Route::get('/points/comments', 'Admin\PointCommentsController@index')->name('points.comments');

        // Статьи
        Route::get('/articles', 'Admin\ArticlesController@index')->name('articles');
        Route::get('/articles/add', 'Admin\ArticlesController@addPoint')->name('articles.add');
        Route::post('/articles/add', 'Admin\ArticlesController@addRequestPoint');
        Route::get('/articles/edit/{id}', 'Admin\ArticlesController@editPoint')->where('id', '\d+')->name('articles.edit');
        Route::post('/articles/edit/{id}', 'Admin\ArticlesController@editRequestPoint')->where('id', '\d+')->name('articles.post-edit');
        Route::delete('/articles/delete', 'Admin\ArticlesController@deletePoint')->name('articles.delete');

        // [TODO] Комментарии статей пока не делаем
        // Route::get('/points/comments', 'Admin\ArticleCommentsController@index')->name('articles.comments');
    });
});