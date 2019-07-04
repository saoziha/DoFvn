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

Auth::routes();
Route::pattern('id','[0-9]*');
Route::pattern('slug','(.*)');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
        Route::get('/','PostsController@index')->name('admin.index');
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/','PostsController@index')->name('admin.post.index');
            Route::get('add','PostsController@getAdd')->name('admin.post.index');
        });
        Route::group(['prefix' => 'tag'], function () {
            Route::get('/','TagController@index')->name('admin.tag.index');
            Route::get('add','TagController@getAdd')->name('admin.tag.index');
            Route::post('doAdd','TagController@doAdd');
            Route::post('{id}/edit','TagController@edit')->name('admin.tag.index');
            Route::post('{id}/delete','TagController@delete')->name('admin.tag.index');
        });
        Route::get('{id}/logout','AdminController@logout');
    });
});
Route::get('admin/login','Admin\AdminController@login');
Route::post('admin/doLogin','Admin\AdminController@doLogin');
