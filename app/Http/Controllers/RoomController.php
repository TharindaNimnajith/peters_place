<?php

namespace App\Http\Controllers;

use App\room;
use App\room_type;
use App\customer;
use App\reserve;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\RoomValidation;
use App\Http\Requests\RoomTypeValidation;
use App\Http\Requests\ReservationValidation;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function add_room(RoomValidation $request)
    {
        $validatedData = $request -> validated();

        $room = new room([
            'room_no'     => $request -> get('r_no'),
            'floor'       => $request -> get('floor'),
            'description' => $request -> get('desc'),
            't_id'        => $request -> get('roomtype')
        ]);

        $room -> save();

        return redirect() -> back() -> with('success', 'A new room has been added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function add_room_type(RoomTypeValidation $request)
    {
        $validatedData = $request -> validated();

        $room_type = new room_type([
            't_id'        => $request -> get('t_id'),
            'name'        => $request -> get('t_name'),
            'description' => $request -> get('desc'),
            'base_price'  => $request -> get('price')
        ]);

        $room_type -> save();

        return redirect() -> back() -> with('success', 'A new room type has been added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function reserve_online(ReservationValidation $request)
    {
        $validatedData = $request -> validated();

        $customer = new customer([
            'fname' => $request -> get('fname'),
            'lname' => $request -> get('lname'),
            'phone' => $request -> get('phone')
        ]);

        $customer -> save();

        $maxValue = DB::table('customers') -> max('cid');

        $reserve = new reserve([
            't_id'      => $request -> get('rtype'),
            'check_in'  => $request -> get('cin'),
            'check_out' => $request -> get('cout'),
            'room_no'   => 200,
            'cid'       => $maxValue
        ]);

        $reserve -> save();

        return redirect() -> to('/'.'#reservation') -> with('success', 'Your room has been reserved successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function add_reservation(ReservationValidation $request)
    {
        $validatedData = $request -> validated();

        $customer = new customer([
            'fname' => $request -> get('fname'),
            'lname' => $request -> get('lname'),
            'phone' => $request -> get('phone')
        ]);

        $customer -> save();

        $maxValue = DB::table('customers') -> max('cid');

        $reserve = new reserve([
            't_id'      => $request -> get('rtype'),
            'check_in'  => $request -> get('cin'),
            'check_out' => $request -> get('cout'),
            'room_no'   => 200,
            'cid'       => $maxValue
        ]);

        $reserve -> save();

        return redirect() -> back() -> with('success', 'Room has been reserved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
