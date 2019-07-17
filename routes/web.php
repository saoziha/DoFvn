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

Auth::routes();
Route::pattern('id','[0-9]*');
Route::pattern('slug','(.*)');

Route::get('/','GalleryController@home')->name('home.index');
Route::get('/gallery','GalleryController@index')->name('gallery.index');
Route::get('/blog','PostsController@index')->name('posts.index');
Route::get('/{slug}-{id}.html','PostsController@detail')->name('posts.index');
Route::get('/home', 'HomeController@index')->name('home');

//ADMIN
Route::group(['middleware' => 'auth:admin'], function () {
    Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
        Route::get('/','PostsController@index')->name('admin.index');
        //POST
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/','PostsController@index')->name('admin.post.index');
            Route::get('add','PostsController@getAdd')->name('admin.post.index');
            Route::post('doAdd','PostsController@doAdd');
            Route::get('{id}/edit','PostsController@edit')->name('admin.post.index');
            Route::post('{id}/doEdit','PostsController@doEdit');
            Route::post('{id}/delete','PostsController@delete');
            Route::post('{id}/status','PostsController@status');
        });
        //TAG
        Route::group(['prefix' => 'tag'], function () {
            Route::get('/','TagController@index')->name('admin.tag.index');
            Route::get('add','TagController@getAdd')->name('admin.tag.index');
            Route::post('doAdd','TagController@doAdd');
            Route::post('{id}/edit','TagController@edit')->name('admin.tag.index');
            Route::post('{id}/delete','TagController@delete')->name('admin.tag.index');
        });
        //CATEGORY
        Route::group(['prefix' => 'category'], function () {
            Route::get('/','CategoryController@index')->name('admin.category.index');
            Route::get('add','CategoryController@getAdd')->name('admin.category.index');
            Route::post('doAdd','CategoryController@doAdd');
            Route::post('{id}/edit','CategoryController@edit')->name('admin.category.index');
            Route::post('{id}/delete','CategoryController@delete')->name('admin.category.index');
        });
        //ARCHIVES
        Route::group(['prefix' => 'archives'], function () {
            Route::get('/','ArchivesController@index')->name('admin.archives.index');
            Route::post('{id}/edit','ArchivesController@edit')->name('admin.archives.index');
        });
        //COMMENT
        Route::group(['prefix' => 'comment'], function () {
            Route::get('/','CommentController@index')->name('admin.comment.index');
            Route::post('{id}/edit','CommentController@edit')->name('admin.comment.index');
            Route::post('{id}/delete','CommentController@delete')->name('admin.comment.index');
        });
        //CONTACT
        Route::group(['prefix' => 'contact'], function () {
            Route::get('{status}','ContactController@index')->name('admin.contact.index');
            Route::post('{id}/edit','ContactController@edit')->name('admin.contact.index');
            Route::post('{id}/send','ContactController@send')->name('admin.contact.index');
            Route::post('{id}/delete','ContactController@delete')->name('admin.contact.index');
        });
        //USER
        Route::group(['prefix' => 'user'], function () {
            Route::get('/','UserController@index')->name('admin.user.index');
            Route::get('add','UserController@getAdd')->name('admin.user.index');
            Route::post('doAdd','UserController@doAdd');
            Route::post('{id}/edit','UserController@edit')->name('admin.user.index');
            Route::post('{id}/editStatus','UserController@editStatus')->name('admin.user.index');
            Route::post('{id}/delete','UserController@delete')->name('admin.user.index');
        });
        //GALLERY
        Route::group(['prefix' => 'gallery'], function () {
            Route::get('/','GalleryController@index')->name('admin.gallery.index');
            Route::get('add','GalleryController@getAdd')->name('admin.gallery.index');
            Route::post('doAdd','GalleryController@doAdd');
            Route::post('{id}/edit','GalleryController@edit')->name('admin.gallery.index');
            Route::post('{id}/delete','GalleryController@delete')->name('admin.gallery.index');
        });
        //IMAGE
        Route::group(['prefix' => 'image'], function () {
            Route::get('{id}/list','ImageController@index')->name('admin.gallery.index');
            Route::get('{id}/add','ImageController@getAdd')->name('admin.gallery.index');
            Route::post('{id}/doAdd','ImageController@doAdd');
            Route::post('{id}/edit','ImageController@edit')->name('admin.gallery.index');
            Route::post('{id}/delete','ImageController@delete')->name('admin.gallery.index');
        });
        Route::get('{id}/logout','AdminController@logout');
    });
});

//AUTH
Route::get('admin/login','Admin\AdminController@login');
Route::post('admin/doLogin','Admin\AdminController@doLogin');

Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');
//USER
Route::get("user/login",'UserController@login');
Route::post("user/doLogin",'UserController@doLogin');
Route::group(['middleware' => 'auth:user'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('comment','UserController@comment');
    });
});
Route::get('contact','ContactController@index')->name('contact.index');
Route::post('contact/send','ContactController@send');
Route::group(['middleware' => 'auth:user'], function () {
    Route::group(['prefix' => 'user'], function () {
        //POST
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/','PostsController@list')->name('user.post.index');
            Route::get('add','PostsController@getAdd')->name('user.post.index');
            Route::post('doAdd','PostsController@doAdd');
            Route::get('{id}/edit','PostsController@edit')->name('user.post.index');
            Route::post('{id}/doEdit','PostsController@doEdit');
            Route::post('{id}/delete','PostsController@delete');
            Route::post('{id}/status','PostsController@status');
        });
        Route::get('{id}/logout','UserController@logout');
        Route::get('remove-comment','UserController@removeComment');
    });
});

