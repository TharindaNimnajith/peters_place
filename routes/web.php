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

use App\User;

Route::get('/', function () {
    return view('peters_place');
});

Route::get('/online_reservation', function () {
    return view('online_reservation');
});


Route::get('/room_management', function () {
    $data = App\room::all();
    $data1 = App\room_type::all();

    //return view('room_management')->with('rooms', $data);
    return view('room_management')->with(['rooms' => $data, 'dat' => $data1]);
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


Route::post('/search_room', 'RoomController@search_room');

Route::post('/search_room_type', 'RoomController@search_room_type');

Route::post('/search_room_reservation', 'RoomController@search_room_reservation');


Route::get('/hr', function () {
    return view('welcome');
});


Route::get('customer', 'postcontroller@index');

Route::get('/search1', 'postcontroller@search');

Route::delete('/deleteall1', 'postcontroller@deleteAll');

Route::resource('posts', 'postcontroller');

Route::get('/report1', function () {
    return view('report1');
});


Route::get('accoms', 'accomcontroller@index');

Route::get('/search4', 'accomcontroller@search');

Route::delete('/deleteall2', 'accomcontroller@deleteAll');

Route::resource('accoms', 'accomcontroller');


Route::get('u', 'utilitycontroller@index');

Route::get('/search3', 'utilitycontroller@search');

Route::delete('/deleteall3', 'utilitycontroller@deleteAll');

Route::resource('utilities', 'utilitycontroller');


//sethma

Route::get('/eventh', 'EventController@index');


Route::resource('events', 'EventTController');


//add menu

Route::resource('menus', 'EventMenuController');

//search


Route::get('/search', 'EventMenuController@search');

//add item

Route::resource('eitems', 'EventItemController');

//staff

Route::resource('estaff', 'EstaffController');

//e report

Route::resource('ereport', 'EreportController');

Route::get('/create', 'EventItemController@create');


//himasha

Route::get('/vie', 'frontaddtask@indexassing');

Route::get('/vie2', 'frontaddtask@taskslist');

Route::post('/saved', 'frontaddtask@insert');

Route::get('/deletetask/{id}', 'frontaddtask@deletetask');

Route::get('/List', 'frontaddtask@Listsearch');

Route::get('/List', 'frontaddtask@retrive');

Route::get('/search5', 'frontaddtask@statusSearch');

Route::get('/Update', 'frontaddtask@supdate');

Route::get('/Update', 'frontaddtask@retriveupdate');

Route::get('/prnpriview', 'frontaddtask@prnpriview');

Route::get('/found', 'frontaddtask@founditems');

Route::post('/found', 'frontaddtask@store')->name('addimage');


Route::get('/supplier', function () {
    $data = App\supplier::all();
    return view('supplier')->with('supplier', $data);
});

Route::get('/booking', function () {
    return view('booking');
});
Route::get('/orderFinal', function () {
    return view('orderFinal');
});
Route::get('/expenditureFinal', function () {
    return view('expenditureFinal');
});
Route::post('/send', 'expenditureController@store');
Route::post('/makeorderTask', 'orderController@store');
Route::post('/savesup', 'suppliercontroller@store');
Route::get('/deletesup/{id}', 'suppliercontroller@deletesup');

Route::get('/savesup/{id,data}', 'suppliercontroller@updatetask');


Route::get('/inventory', function () {
    return view('inventory');
});

Route::get('/room', function () {
    return view('room');
});
Route::get('/hall', function () {
    return view('hall');
});

Route::post('/saveTask1', 'TaskController@store1');

Route::get('/inventory', 'TaskController@index1');


Route::post('/saveTask2', 'TaskController@store2');

Route::get('/hall', 'TaskController@index2');


Route::post('/saveTask3', 'TaskController@store3');

Route::get('/room', 'TaskController@index3');

Route::get('/delete/{id}', 'TaskController@delete');

Route::get('/task/destroy/{id}', 'TaskController@destroy');
Route::get('/task2/destroy/{id}', 'TaskController@destroy2');
Route::get('/task3/destroy/{id}', 'TaskController@destroy3');

Route::get('/search', 'TaskController@search');
//jima


//------------HR management----------------

Route::get('/Eadd', function () {
    return view('Employee_add');
});
Route::get('/Esalary', function () {
    return view('Employee_salary');
});

Route::get('/Eattendence', function () {
    return view('Employee_attendence');
});

Route::get('/Eleave', function () {
    return view('Employee_leave');
});

Route::get('/Emanagement', function () {
    return view('Employee_management');
});
Route::get('/Eprofile', function () {
    return view('Employee_profile');
});
Route::get('/Eprofile2', function () {
    return view('Employee_');
});
Route::get('/Eaddleave', function () {
    return view('Employee_add_leaveType');
});

Route::get('/Edelete', function () {
    return view('EmpDelete');
});

//Route::post('/addLeave' , 'LeaveTypeController@leave');

Route::post('/addLeave', 'LeaveTypeController@save');
Route::get('/Eaddleave', 'LeaveTypeController@index');
Route::get('/des/{id}', 'LeaveTypeController@destroy');

Route::post('/AddEmployee', 'EmployeeController@store');
Route::get('/Emanagement', 'EmployeeController@index');
Route::get('/search', 'EmployeeController@search');
Route::get('/Edelete', 'EmployeeController@showDeleteEmp');

Route::get('/show/{id}', 'EmployeeController@show');
//Route::post('/getid','EmployeeController@getid');
Route::get('/destroye/{leve_type}', 'EmployeeController@destroy');

Route::post('/edit', 'EmployeeController@edit');


//Route::get('/Eattendence','EmployeeController@attendence');

//Route::get('Employee_view','EmployeeController@getid');

Route::post('/addleave', 'LeaveController@store');
Route::get('/Eleave', 'LeaveController@index');
Route::get('/search2', 'LeaveController@search2');
Route::get('/destroyl/{id}', 'LeaveController@destroy');

Route::post('/store', 'attendenceController@store');
//Route::e('/Eattendence' , 'attendenceController');
Route::get('/Eattendence', 'attendenceController@index');
Route::post('/storeA', 'attendenceController@storeA');
Route::get('/destroya/{id}', 'attendenceController@destroy');


Route::get('/Esalary', 'salaryController@employee');
Route::post('/Esalary', 'salaryController@salary');
Route::get('/destroy/{id}', 'salaryController@destroy');

//Route::post('form', 'LeaveTypeController@save')->name('form.save');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/home', function () {
        return view('AdminD');
    });

    Route::get('/home', function () {
        if (Auth::user()->admin == 0) {
            return view('home');
        } else {
            $users['users'] = User::all();
            return view('AdminD')->with('users');
        }
    });
});
