<?php

namespace App\Http\Controllers;

use App\customer;
use App\Http\Requests\ReservationValidation;
use App\Http\Requests\RoomReservationUpdateValidation;
use App\Http\Requests\RoomTypeUpdateValidation;
use App\Http\Requests\RoomTypeValidation;
use App\Http\Requests\RoomUpdateValidation;
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
     * @param RoomValidation $request
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

        return redirect()
            ->back()
            ->with('rooms', $data)
            ->with('success', 'A new room has been added successfully!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param RoomTypeValidation $request
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

        return redirect()
            ->back()
            ->with('room_types', $data)
            ->with('success', 'A new room type has been added successfully!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ReservationValidation $request
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

        return redirect()
            ->back()
            ->with('success', 'Your room has been reserved successfully!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ReservationValidation $request
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

        return redirect()
            ->back()
            ->with('reservations', $data)
            ->with('success', 'Room has been reserved successfully!');
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

        return redirect()
            ->back()
            ->with('success', 'Room has been deleted successfully!');
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

        return redirect()
            ->back()
            ->with('success', 'Room type has been deleted successfully!');
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

        return redirect()
            ->back()
            ->with('success', 'Room reservation has been deleted successfully!');
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

        return view('view_room_type')
            ->with('details', $details);
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

        return view('view_room')
            ->with('details', $details);
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

        return view('view_room_reservation')
            ->with('details', $details);
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

        return view('update_room_type')
            ->with('details', $details);
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

        return view('update_room')
            ->with('details', $details);
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

        return view('update_room_reservation')
            ->with('details', $details);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomUpdateValidation $request
     * @return void
     */
    public function edit_room(RoomUpdateValidation $request)
    {
        //dd($request);

        $validatedData = $request->validated();

        $id = $request->id;
        $roomtype = $request->roomtype;
        $floor = $request->floor;
        $desc = $request->desc;
        $available = $request->available;
        $status_btn = $request->status_btn;

        //dd($id);

        $updateDetails = [
            'floor' => $floor,
            'availability' => $available,
            'status' => $status_btn,
            'description' => $desc,
            't_id' => $roomtype
        ];

        DB::table('rooms')
            ->where('id', $id)
            ->update($updateDetails);

        $data = room::all();

        return redirect()
            ->to('room_management')
            ->with('rooms', $data)
            ->with('success', 'The room has been updated successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomTypeUpdateValidation $request
     * @return void
     */
    public function edit_room_type(RoomTypeUpdateValidation $request)
    {
        //dd($request);

        $validatedData = $request->validated();

        $id = $request->id;
        $t_name = $request->t_name;
        $desc = $request->desc;
        $price = $request->price;

        //dd($id);

        $updateDetails = [
            'name' => $t_name,
            'description' => $desc,
            'base_price' => $price
        ];

        DB::table('room_types')
            ->where('id', $id)
            ->update($updateDetails);

        $data = room_type::all();

        return redirect()
            ->to('room_type_management')
            ->with('room_types', $data)
            ->with('success', 'The room type has been updated successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomReservationUpdateValidation $request
     * @return void
     */
    public function edit_room_reservation(RoomReservationUpdateValidation $request)
    {
        //dd($request);

        $validatedData = $request->validated();

        $id = $request->id;
        $fname = $request->fname;
        $lname = $request->lname;
        $phone = $request->phone;
        $roomtype = $request->roomtype;
        $r_no = $request->r_no;
        $cin = $request->cin;
        $cout = $request->cout;

        //dd($id);

        $updateDetails = [
            't_id' => $roomtype,
            'room_no' => $r_no,
            'check_in' => $cin,
            'check_out' => $cout
        ];

        /*
        $updateDetails2 = [
            'fname' => $fname,
            'lname' => $lname,
            'phone' => $phone
        ];
        */

        DB::table('reserves')
            ->where('id', $id)
            ->update($updateDetails);

        $data = reserve::all();

        return redirect()
            ->to('room_reservation_management')
            ->with('reservations', $data)
            ->with('success', 'The reservation has been updated successfully!');
    }


    /**
     * Search the specified resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function search_room(Request $request)
    {
        $id = $request->r_no;
        $t_id = $request->roomtype;
        $floor = $request->floor;
        $availability = $request->available;
        $status = $request->status_btn;

        $data = DB::table('rooms')
            ->orWhere('id', 'like', '%' . $id . '%')
            ->orWhere('floor', 'like', '%' . $floor . '%')
            ->orWhere('availability', 'like', '%' . $availability . '%')
            ->orWhere('status', 'like', '%' . $status . '%')
            ->paginate(5);

        return redirect()
            ->to('room_management')
            ->with('rooms', $data);
    }


    /**
     * Search the specified resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function search_room_type(Request $request)
    {
        $id = $request->t_id;
        $name = $request->t_name;
        $availability = $request->available;

        $data = DB::table('room_types')
            ->orWhere('id', 'like', '%' . $id . '%')
            ->orWhere('name', 'like', '%' . $name . '%')
            //->orWhere('availability', 'like', '%' . $availability . '%')
            ->paginate(5);

        return redirect()
            ->to('room_type_management')
            ->with('rooms', $data);
    }


    /**
     * Search the specified resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function search_room_reservation(Request $request)
    {
        $id = $request->id;
        $cid = $request->cid;
        $fname = $request->fname;
        $lname = $request->lname;
        $roomtype = $request->rtype;
        $r_no = $request->r_no;
        $cin = $request->cin;
        $cout = $request->cout;

        $data = DB::table('reserves')
            ->orWhere('id', 'like', '%' . $id . '%')
            ->orWhere('cid', 'like', '%' . $cid . '%')
            //->orWhere('fname', 'like', '%' . $fname . '%')
            //->orWhere('lname', 'like', '%' . $lname . '%')
            ->orWhere('room_no', 'like', '%' . $r_no . '%')
            ->orWhere('t_id', 'like', '%' . $roomtype . '%')
            ->orWhere('check_in', 'like', '%' . $cin . '%')
            ->orWhere('check_out', 'like', '%' . $cout . '%')
            ->paginate(5);

        return redirect()
            ->to('room_management')
            ->with('rooms', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
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
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
