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

Route::post('/reserve_online', 'RoomController@');

Route::post('/add_room', 'RoomController@add_room');

Route::post('/view_room', 'RoomController@');

Route::post('/edit_room', 'RoomController@');

Route::post('/search_room', 'RoomController@');

Route::post('/delete_room', 'RoomController@');

Route::post('/add_room_type', 'RoomController@add_room_type');

Route::post('/view_room_type', 'RoomController@');

Route::post('/edit_room_type', 'RoomController@');

Route::post('/search_room_type', 'RoomController@');

Route::post('/delete_room_type', 'RoomController@');

Route::post('/add_room_reservation', 'RoomController@');

Route::post('/view_room_reservation', 'RoomController@');

Route::post('/edit_room_reservation', 'RoomController@');

Route::post('/search_room_reservation', 'RoomController@');

Route::post('/delete_room_reservation', 'RoomController@');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
