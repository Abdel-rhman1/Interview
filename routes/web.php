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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/driver', 'Auth\LoginController@showDriverLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/driver', 'Auth\RegisterController@showDriverRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/driver', 'Auth\LoginController@DriverLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/driver', 'Auth\RegisterController@createDriver');


Route::view('/admin', 'admin.home');
Route::view('/driver', 'driver.home');

Route::get('changeLang/{lang}' , 'LanguageController@change')->name('changeLang');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');