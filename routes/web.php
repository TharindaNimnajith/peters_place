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

Route::get('/online_reservation', function () {
    return view('online_reservation');
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
    $data = App\room::all();

    return view('room_management') -> with('rooms', $data);
});

Route::get('/room_type_management', function () {
    $data = App\room_type::all();

    return view('room_type_management') -> with('room_types', $data);
});

Route::get('/room_reports', function () {
    return view('room_reports');
});

Route::get('/room_reservation_management', function () {
    $data = App\reserve::all();

    return view('room_reservation_management') -> with('reservations', $data);;
});

Route::post('/reserve_online', 'RoomController@reserve_online');

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

Route::post('/add_room_reservation', 'RoomController@add_reservation');

Route::post('/view_room_reservation', 'RoomController@');

Route::post('/edit_room_reservation', 'RoomController@');

Route::post('/search_room_reservation', 'RoomController@');

Route::post('/delete_room_reservation', 'RoomController@');

Auth::routes();

Route::get('/home', 'HomeController@index') -> name('home');
