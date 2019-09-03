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
    return view('peters_place');
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


Route::get('/view_room/{id}', 'RoomController@view_room');

Route::get('/view_type/{id}', 'RoomController@view_room_type');

Route::get('/view_reserves/{id}', 'RoomController@view_room_reservation');


Route::get('/update_room/{id}', 'RoomController@update_room');

Route::get('/update_room_type/{id}', 'RoomController@update_room_type');

Route::get('/update_room_reservation/{id}', 'RoomController@update_room_reservation');


Route::post('/edit_room', 'RoomController@edit_room');

Route::post('/edit_room_type', 'RoomController@edit_room_type');

Route::post('/edit_room_reservation', 'RoomController@edit_room_reservation');


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


Route::get('customer', 'postcontroller@index');
Route::get('/search1', 'postcontroller@search');
Route::delete('/deleteall1', 'postcontroller@deleteAll');
Route::resource('posts', 'postcontroller');

Route::get('accoms', 'accomcontroller@index');
Route::get('/search2', 'accomcontroller@search');
Route::delete('/deleteall2', 'accomcontroller@deleteAll');
Route::resource('accoms', 'accomcontroller');

Route::get('u', 'utilitycontroller@index');
Route::get('/search3', 'utilitycontroller@search');
Route::delete('/deleteall3', 'utilitycontroller@deleteAll');
Route::resource('utilities', 'utilitycontroller');
