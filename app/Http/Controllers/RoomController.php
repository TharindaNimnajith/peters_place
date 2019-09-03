<?php

namespace App\Http\Controllers;

use App\customer;
use App\Http\Requests\ReservationValidation;
use App\Http\Requests\RoomTypeValidation;
use App\Http\Requests\RoomValidation;
use App\reserve;
use App\room;
use App\room_type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function add_room(RoomValidation $request)
    {
        $validatedData = $request->validated();

        $room = new room([
            'id' => $request->get('r_no'),
            'floor' => $request->get('floor'),
            'description' => $request->get('desc'),
            't_id' => $request->get('roomtype'),
        ]);

        $room->save();

        $data = room::all();

        return redirect()->back()->with('rooms', $data)->with('success', 'A new room has been added successfully!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function add_room_type(RoomTypeValidation $request)
    {
        $validatedData = $request->validated();

        $room_type = new room_type([
            'id' => $request->get('t_id'),
            'name' => $request->get('t_name'),
            'description' => $request->get('desc'),
            'base_price' => $request->get('price')
        ]);

        $room_type->save();

        $data = room_type::all();

        return redirect()->back()->with('room_types', $data)->with('success', 'A new room type has been added successfully!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function reserve_online(ReservationValidation $request)
    {
        $validatedData = $request->validated();

        $customer = new customer([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'phone' => $request->get('phone')
        ]);

        $customer->save();

        $maxValue = DB::table('customers')->max('id');

        $reserve = new reserve([
            't_id' => $request->get('rtype'),
            'check_in' => $request->get('cin'),
            'check_out' => $request->get('cout'),
            'room_no' => 200,
            'cid' => $maxValue
        ]);

        $reserve->save();

        return redirect()->back()->with('success', 'Your room has been reserved successfully!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function add_reservation(ReservationValidation $request)
    {
        $validatedData = $request->validated();

        $customer = new customer([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'phone' => $request->get('phone')
        ]);

        $customer->save();

        $maxValue = DB::table('customers')->max('id');

        $reserve = new reserve([
            't_id' => $request->get('rtype'),
            'check_in' => $request->get('cin'),
            'check_out' => $request->get('cout'),
            'room_no' => $request->get('r_no'),
            'cid' => $maxValue
        ]);

        $reserve->save();

        $data = reserve::all();

        return redirect()->back()->with('reservations', $data)->with('success', 'Room has been reserved successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete_room($id)
    {
        $room = room::where('id', $id);
        $room->delete();

        return redirect()->back()->with('success', 'Room has been deleted successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete_room_type($id)
    {
        $room_type = room_type::where('id', $id);
        $room_type->delete();

        return redirect()->back()->with('success', 'Room type has been deleted successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete_room_reservation($id)
    {
        $reserve = reserve::where('id', $id);
        $reserve->delete();

        return redirect()->back()->with('success', 'Room reservation has been deleted successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function view_room_type($id)
    {
        $details = room_type::find($id);
        return view('view_room_type')->with('details', $details);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function view_room($id)
    {
        $details = room::find($id);
        return view('view_room')->with('details', $details);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function view_room_reservation($id)
    {
        $details = reserve::find($id);
        return view('view_room_reservation')->with('details', $details);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update_room_type($id)
    {
        $details = room_type::find($id);
        return view('update_room_type')->with('details', $details);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update_room($id)
    {
        $details = room::find($id);
        return view('update_room')->with('details', $details);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update_room_reservation($id)
    {
        $details = reserve::find($id);
        return view('update_room_reservation')->with('details', $details);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
