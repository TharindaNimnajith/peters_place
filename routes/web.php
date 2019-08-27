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
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/room_management', function () {
    return view('room_management');
});

Route::get('/room_type_management', function () {
    return view('room_type_management');
});

Route::get('/room_reports', function () {
    return view('room_reports');
});

Route::get('/room_reservation_management', function () {
    return view('room_reservation_management');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
