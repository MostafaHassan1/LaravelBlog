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



    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
    Route::get('/','PagesController@getHome')->name('/');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
   
    /*
//auth
    Route::get('auth/login','Auth\AuthController@getLogin');
    Route::post('auth/login','Auth\AuthController@postLogin');
    Route::get('auth/logout','Auth\AuthController@getLogout');
//register
    Route::get('auth/register','Auth\AuthController@getRegister');
    Route::post('auth/register','Auth\AuthController@postRegister');
*/
/*
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/
    Route::get('about','PagesController@getAbout');
    Route::get('contact','PagesController@getContact');
    Route::post('contact','PagesController@postContact');

    Route::resource("posts",'PostController');
    Route::resource("categories","CateController",['except' => ['create']]);
    Route::resource("tags","TagController",['except' => ['create']]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
