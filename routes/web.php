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
//FRONTEND ROUTES
Route::get('/', 'FrontendController@home')->name('website');
//Route::get('/about/{slug}', 'FrontendController@about')->name('website.about');
Route::get('/category', 'FrontendController@category')->name('website.category');
Route::get('/contact', 'FrontendController@contact')->name('website.contact');
Route::post('/contact', 'FrontendController@send_message')->name('website.contact');
Route::get('/post/{slug}', 'FrontendController@post')->name('website.post');
Route::get('/tag/{slug}', 'FrontendController@tag')->name('website.tag');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{slug}', 'FrontendController@category')->name('category.posts');


//ADMIN PANEL ROUTES

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	
	Route::resource('/category', 'CategoryController');
	Route::resource('/tag', 'TagController');
	Route::resource('/post', 'PostController');
	Route::resource('/user', 'UserController');
	Route::resource('/contact', 'ContactController');
	Route::resource('/setting', 'SettingController');
	
	Route::get('/edit-profile/{slug}', 'UserController@profile')->name('user.edit.profile');
	
});
