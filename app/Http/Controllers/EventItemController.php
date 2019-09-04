<?php

namespace App\Http\Controllers;

use App\eventItem;
use Illuminate\Http\Request;

class EventItemController extends Controller
{

    public function store(Request $request)
    {
        $eventitem = new eventItem();
        $eventitem->event_id = $request->eventid;
        $eventitem->event_date = $request->eventdate;
        $eventitem->item_name = $request->itemnm;
        $eventitem->quantity = $request->qty;

        $eventitem->save();
    }

    public function index()
    {
        return view('e_item/index');
    }

    public function create()
    {

        return view('e_item/create');
    }

}
