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

Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index')->name('blog.guest');
    Route::get('/{slug}', 'BlogController@guestView')->name('blog.guest-view');
    
    Route::namespace('Admin')->group(function(){
        Route::get('/admin/category/index', 'CategoryController@index')->name('blog.admin.category.index');
        Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('blog.admin.category.edit');
        Route::post('/admin/category/update/{id}', 'CategoryController@update')->name('blog.admin.category.update');
        Route::get('/admin/category/destroy/{id}', 'CategoryController@destroy')->name('blog.admin.category.destroy');
        Route::get('/admin/category/create', 'CategoryController@create')->name('blog.admin.category.create');
        Route::post('/admin/category/store', 'CategoryController@store')->name('blog.admin.category.store');
        
        Route::get('/admin/tag/index', 'TagController@index')->name('blog.admin.tag.index');
        Route::get('/admin/tag/edit/{id}', 'TagController@edit')->name('blog.admin.tag.edit');
        Route::post('/admin/tag/update/{id}', 'TagController@update')->name('blog.admin.tag.update');
        Route::get('/admin/tag/destroy/{id}', 'TagController@destroy')->name('blog.admin.tag.destroy');
        Route::get('/admin/tag/create', 'TagController@create')->name('blog.admin.tag.create');
        Route::post('/admin/tag/store', 'TagController@store')->name('blog.admin.tag.store');
        
        Route::get('/admin/post/index', 'PostController@index')->name('blog.admin.post.index');
        Route::get('/admin/post/edit/{id}', 'PostController@edit')->name('blog.admin.post.edit');
        Route::post('/admin/post/update/{id}', 'PostController@update')->name('blog.admin.post.update');
        Route::get('/admin/post/destroy/{id}', 'PostController@destroy')->name('blog.admin.post.destroy');
        Route::get('/admin/post/create', 'PostController@create')->name('blog.admin.post.create');
        Route::post('/admin/post/store', 'PostController@store')->name('blog.admin.post.store');
    });
});
