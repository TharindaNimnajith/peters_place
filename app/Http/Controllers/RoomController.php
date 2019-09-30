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
use PDF;

//use DB;

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

        //$data = room::with('room_type')->get();
        //$data = room::with('room_type:id,name')->get();

        //$data = room::all();

        $data = DB::table('rooms')
            ->join('room_types', 'rooms.t_id', '=', 'room_types.id')
            ->get();

        $data1 = DB::table('room_types')
            ->join('rooms', 'rooms.t_id', '=', 'room_types.id')
            ->get();

        //dd($data);

        //$id = room_type->id;

        /*
        return redirect()
            ->back()
            ->with('rooms', $data)
            ->with('success', 'A new room has been added successfully!');
        */

        /*
        $updateDetails = [
            'total' => 'total' +  1,
        ];

        DB::table('room_types')
            ->where('id', $id)
            ->update($updateDetails);
        */

        //return view('room_management', ['rooms' => $data, 'data1' => $data1])
        //->with('success', 'A new room has been added successfully!');

        return redirect()
            ->back()
            ->with(['rooms' => $data, 'dat' => $data1])
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

        /*
        $data = DB::table('reserves')
            ->join('reserves', 'reserves.t_id', '=', 'room_types.id')
            ->join('reserves', 'reserves.room_no', '=', 'rooms.id')
            ->join('reserves', 'reserves.cid', '=', 'customers.id')
            ->get();

        $data1 = DB::table('customers')
            ->join('reserves', 'reserves.cid', '=', 'customers.id')
            ->get();

        $data2 = DB::table('rooms')
            ->join('reserves', 'reserves.room_no', '=', 'rooms.id')
            ->get();

        $data3 = DB::table('room_types')
            ->join('reserves', 'reserves.t_id', '=', 'room_types.id')
            ->get();
        */

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

        $type_id = $details->t_id;

        $rt_details = room_type::where('id', $type_id)->first();

        /*
        return view('view_room')
            ->with('details', $details);
        */

        return view('view_room', ['details' => $details, 'rt_details' => $rt_details]);
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

        $cid = $details->cid;
        //dd($cid);

        $type_id = $details->t_id;

        //$cust_details = customer::where('id', $cid)->get();

        $cust_details = customer::where('id', $cid)->first();

        //dd($cust_details);
        //dd($cust_details->fname);
        //dd($cust_details[model]);

        $rt_details = room_type::where('id', $type_id)->first();

        //dd($rt_details);

        /*
        return view('view_room_reservation')
            ->with('details', $details)
            ->with('cust_details', $cust_details);
        */

        return view('view_room_reservation', ['details' => $details, 'cust_details' => $cust_details, 'rt_details' => $rt_details]);
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

        //$type_id = $details->t_id;

        //$rt_details = room_type::where('id', $type_id)->first();

        $rt_details = room_type::all();

        //dd($rt_details);
        //dd($rt_details->id);

        /*
        return view('update_room')
            ->with('details', $details);
        */

        return view('update_room', ['details' => $details, 'rt_details' => $rt_details]);
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

        $cid = $details->cid;
        $type_id = $details->t_id;

        $cust_details = customer::where('id', $cid)->first();

        //$rt_details = room_type::where('id', $type_id)->first();

        $rt_details = room_type::all();

        /*
        return view('update_room_reservation')
            ->with('details', $details);
        */

        return view('update_room_reservation', ['details' => $details, 'cust_details' => $cust_details, 'rt_details' => $rt_details]);
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

        //$data1 = App\room_type::all();

        //$data1 = DB::table('room_types');

        $data1 = room_type::all();

        /*
        $data = DB::table('rooms')
            ->orWhere('id', $id)
            ->orWhere('availability', $availability)
            ->orWhere('status', $status)
            ->paginate(5);
        */

        $data = DB::table('rooms')
            ->orWhere('id', $id)
            ->orWhere('availability', $availability)
            ->orWhere('status', $status)
            ->orWhere('t_id', $t_id)
            ->orWhere('floor', $floor)
            ->paginate(30);

        /*
        if ($id != null) {
            $data = DB::table('rooms')
                ->where('id', $id)
                ->paginate(5);
        } else {
            $data = DB::table('room_types')
                ->orWhere('id', $id)
                ->paginate(5);
        }
        */

        return view('room_management', ['rooms' => $data, 'dat' => $data1]);

        //return view('room_management')->with(['rooms' => $data, 'dat' => $data1]);

        /*
        $data = DB::table('rooms')
            ->where('id', $id)
            ->get();

            //->orWhere('floor', 'like', '%' . $floor . '%')
            //->orWhere('availability', 'like', '%' . $availability . '%')
            //->orWhere('status', 'like', '%' . $status . '%')

            //->paginate(5);

        return view('room_management', ['rooms' => $data]);
        */
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

        //dd($id);

        /*
        if ($id == null) {
            $data = DB::table('room_types')
                ->orWhere('name', 'like', '%' . $name . '%')
                ->paginate(5);
        } else {
            $data = DB::table('room_types')
                ->orWhere('id', $id)
                ->paginate(5);
        }
        */

        $data = DB::table('room_types')
            ->orWhere('id', $id)
            ->orWhere('name', 'like', '%' . $name . '%')
            //->orWhere('availability')
            ->paginate(30);

        /*
        $data = DB::table('room_types')
            ->orWhere('id', $id)
            ->orWhere('name', 'like', '%' . $name . '%')
            ->paginate(5);
        */

        /*
        if(is_null($data)) {
            $request->session()
                ->flash('no_id', 'No results!');

            return redirect()
                ->back();
        }
        */

        return view('room_type_management', ['room_types' => $data]);
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

        /*
        $data = DB::table('reserves')
            ->orWhere('id', $id)
            ->orWhere('cid', $cid)

            //->orWhere('fname', 'like', '%' . $fname . '%')
            //->orWhere('lname', 'like', '%' . $lname . '%')

            ->orWhere('room_no', $r_no)
            ->orWhere('t_id', $roomtype)
            ->orWhere('check_in', 'like', '%' . $cin . '%')
            ->orWhere('check_out', 'like', '%' . $cout . '%')

            ->paginate(5);
        */

        /*
        if ($id != null) {
            $data = DB::table('reserves')
                ->orWhere('id', $id)
                ->paginate(5);
        } else if ($cid != null) {
            $data = DB::table('reserves')
                ->orWhere('cid', $cid)
                ->paginate(5);
        } else if ($r_no != null) {
            $data = DB::table('reserves')
                ->orWhere('room_no', $r_no)
                ->paginate(5);
        } else if ($roomtype != null) {
            $data = DB::table('reserves')
                ->orWhere('t_id', $roomtype)
                ->paginate(5);
        }
        */

        /*
        else if ($cin != null) {
            $data = DB::table('reserves')
                ->orWhere('check_in', $cin)
                ->paginate(5);
        }
        */

        /*
        else if ($cout != null) {
            $data = DB::table('reserves')
                ->orWhere('check_out', $cout)
                ->paginate(5);
        }
        */

        //$data = App\reserve::all();
        //$data1 = App\customer::all();
        //$data2 = App\room_type::all();

        //return view('room_reservation_management')->with(['reservations' => $data, 'dat' => $data1, 'rt' => $data2]);

        /*
        $d = DB::table('room_types')
            ->join('rooms', 'rooms.t_id', '=', 'room_types.id')
            ->get();
        */

        $data1 = customer::all();
        $data2 = room_type::all();

        /*
        $data = DB::table('reserves')
            ->join('reserves', 'reserves.cid', '=', 'customers.id')
            //->join('reserves', 'reserves.t_id', '=', 'room_types.id')
            //->join('reserves', 'reserves.room_no', '=', 'rooms.id')

            ->orWhere('reserves.id', $id)
            ->orWhere('reserves.cid', $cid)

            ->orWhere('customers.fname', 'like', '%' . $fname . '%')
            ->orWhere('customers.lname', 'like', '%' . $lname . '%')

            ->orWhere('reserves.t_id', $roomtype)

            ->orWhere('reserves.room_no', $r_no)
            ->orWhere('reserves.check_in', 'like', '%' . $cin . '%')
            ->orWhere('reserves.check_out', 'like', '%' . $cout . '%')

            ->paginate(30);
        */

        //return view('room_reservation_management', ['reservations' => $data]);

        $data = DB::table('reserves')
            ->orWhere('id', $id)
            ->orWhere('cid', $cid)

            //->orWhere('fname', 'like', '%' . $fname . '%')
            //->orWhere('lname', 'like', '%' . $lname . '%')

            ->orWhere('t_id', $roomtype)
            ->orWhere('room_no', $r_no)

            //->orWhere('reserves.check_in', 'like', '%' . $cin . '%')
            //->orWhere('reserves.check_out', 'like', '%' . $cout . '%')

            ->paginate(30);

        /*
        $data1 = DB::table('customers')
            ->orWhere('fname', 'like', '%' . $fname . '%')
            ->orWhere('lname', 'like', '%' . $lname . '%')
            
            ->paginate(30);
        */

        return view('room_reservation_management', ['reservations' => $data, 'dat' => $data1, 'rt' => $data2]);
    }


    function dynamic_pdf_rooms()
    {
        $room_data = $this->get_room_data();
        
        return view('dynamic_pdf_rooms')->with('room_data', $room_data);
    }

    function get_rooms_data()
    {
        $rooms_data = DB::table('rooms')
            ->limit(30)
            ->get();

        return $rooms_data;
    }

    function get_room_types_data()
    {
        $room_types_data = DB::table('room_types')
            ->limit(30)
            ->get();

        return $room_types_data;
    }

    function rooms_pdf()
    {
        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($this->convert_rooms_data_to_html());

        return $pdf->stream();
    }

    function convert_rooms_data_to_html()
    {
        $rooms_data = $this->get_rooms_data();
        $room_types_data = $this->get_room_types_data();

        $output = '
            <h1 align="center">Room List</h1>

            <table width="100%" style="border-collapse:collapse; border:0px;">

            <tr style="background-color:black; color:white;">
                <th style="border:1px solid; padding:12px;" width="20%">Room No</th>
                <th style="border:1px solid; padding:12px;" width="20%">Floor</th>
                <th style="border:1px solid; padding:12px;" width="20%">Type</th>
                <th style="border:1px solid; padding:12px;" width="20%">Availability</th>
                <th style="border:1px solid; padding:12px;" width="20%">Status</th>
            </tr>
        ';

        foreach ($rooms_data as $rooms) {
            // availability - formatting db value
            if ($rooms->availability) {
                $availability = "Available"; 
            }
            else {
                $availability = "Not Available"; 
            }

            // status - formatting db value
            if ($rooms->status == 1) {
                $status = "Clean"; 
            }
            else if ($rooms->status == 2) {
                $status = "Not Clean"; 
            }
            else if ($rooms->status == 3) {
                $status = "Out of Service"; 
            }

            // room types - formatting db value
            foreach ($room_types_data as $room_type) {
                if ($room_type->id == $rooms->t_id) {
                    $type = $room_type->name;
                }
            }

            $output .= '
                <tr>
                    <td style="border:1px solid; padding:12px;">' . $rooms->id . '</td>
                    <td style="border:1px solid; padding:12px;">' . $rooms->floor . '</td>
                    <td style="border:1px solid; padding:12px;">' . $type . '</td>
                    <td style="border:1px solid; padding:12px;">' . $availability . '</td>
                    <td style="border:1px solid; padding:12px;">' . $status . '</td>
                </tr>
            ';
        }

        $output .= '</table>';

        return $output;
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
