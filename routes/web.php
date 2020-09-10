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

// Route::get('/', function () {
//     return view('test');
// });

Auth::routes();

Route::get('/', 'HomePageController@index')->name('home');
Route::get('/admin', 'AdminPageController@index')->name('admin');
Route::get('/editpage/{id}', 'AdminPageController@editpage');
Route::post('/updatepage', 'AdminPageController@updatepage');
Route::get('/contact-us', 'ContactPageController@index')->name('contact');


