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


Route::get('/','PagesController@getHome');
Route::get('posts/{id}/{slug}','PagesController@getPosts');
Route::post('posts/{id}/{slug}','PagesController@postComments');
Route::get('category/{id}/{slug}','PagesController@getCategory');

Route::get('login','PagesController@getLogin');
Route::post('login','PagesController@postLogin');
Route::get('logout','PagesController@getLogout');
Route::get('register','PagesController@getRegister');
Route::post('register','PagesController@postRegister');

// search
Route::get('search','PagesController@getSearch');
Route::get('account','PagesController@getAccount');
Route::post('account','PagesController@postAccount');

Route::get('about','PagesController@getAbout');

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'login','middleware'=>'CheckLoginAdmin'], function () {
            Route::get('/','LoginController@getLoginAdmin');
            Route::post('/','LoginController@postLoginAdmin');
        });
        Route::get('logout','LoginController@getLogout');
        Route::group(['prefix' => 'category','middleware'=>'CheckLogoutAdmin'], function () {

        Route::get('/','CateController@getCate');
        Route::post('/','CateController@postCate');

        Route::get('edit/{id}','CateController@getEditCate');
        Route::post('edit/{id}','CateController@postEditCate');

        Route::get('delete/{id}','CateController@getDeleteCate');
       });
       Route::group(['prefix' => 'users','middleware'=>'CheckLogoutAdmin'], function () {

        Route::get('/','UsersController@getUsers');

        Route::get('add','UsersController@getAddUser');
        Route::post('add','UsersController@postAddUser');

        Route::get('edit/{id}','UsersController@getEditUser');
        Route::post('edit/{id}','UsersController@postEditUser');

        Route::get('delete/{id}','UsersController@getDeleteUser');
       });
       Route::group(['prefix' => 'posts','middleware'=>'CheckLogoutAdmin'], function () {

        Route::get('/','PostsController@getPosts');
        Route::post('/','PostsController@postPosts');

        Route::get('add','PostsController@getAddPosts');
        Route::post('add','PostsController@postAddPosts');

        Route::get('edit/{id}','PostsController@getEditPosts');
        Route::post('edit/{id}','PostsController@postEditPosts');

        Route::get('delete/{id}','PostsController@getDeletePosts');
       });
    });
});

