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

use App\Http\Controllers\Controller;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('index');
});

Route::get('/online_reservation', function () {
    return view('online_reservation');
});


Route::get('/room_management', function () {
    $data = App\room::all();

    return view('room_management')->with('rooms', $data);
});

Route::get('/room_type_management', function () {
    $data = App\room_type::all();

    return view('room_type_management')->with('room_types', $data);
});

Route::get('/room_reservation_management', function () {
    $data = App\reserve::all();

    return view('room_reservation_management')->with('reservations', $data);
});

Route::get('/room_reports', function () {
    return view('room_reports');
});



Route::post('/reserve_online', 'RoomController@reserve_online');

Route::post('/add_room_reservation', 'RoomController@add_reservation');


Route::post('/add_room', 'RoomController@add_room');

Route::post('/add_room_type', 'RoomController@add_room_type');


Route::post('/rooms/{id}', 'RoomController@delete_room');

Route::post('/room_types/{id}', 'RoomController@delete_room_type');

Route::post('/reserves/{id}', 'RoomController@delete_room_reservation');


//Route::post('/rooms/{id}', 'RoomController@view_room');

Route::get('/view_type/{id}', 'RoomController@view_room_type');

//Route::post('/reserves/{id}', 'RoomController@view_room_reservation');


//Route::post('/rooms/{id}', 'RoomController@edit_room');

//Route::post('/room_types/{id}', 'RoomController@edit_room_type');

//Route::post('/reserves/{id}', 'RoomController@edit_room_reservation');


//Route::post('/search_room', 'RoomController@search_room');

//Route::post('/search_room_type', 'RoomController@search_room_type');

//Route::post('/search_room_reservation', 'RoomController@search_room_reservation');



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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
