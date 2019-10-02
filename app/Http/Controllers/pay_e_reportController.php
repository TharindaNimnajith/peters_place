<?php

namespace App\Http\Controllers;

use App;
use App\pay_event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pay_e_reportController extends Controller
{
    public function index()
    {
        $eventreport = pay_event::all();
        return view('f_report.index', compact('eventreport'));

    }

    public function create()
    {
        return view('f_report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'c_name' => 'required',
            'event_date' => 'required',
            'time' => 'required',
            'category' => 'required',
            'guests' => 'required',
            'mid' => 'required',
            'advance' => 'required',
            'total' => 'required',
        ]);

        $eventreport = new pay_event([
            'c_name' => $request->get('c_name'),
            'event_date' => $request->get('event_date'),
            'time' => $request->get('time'),
            'category' => $request->get('category'),
            'guests' => $request->get('guests'),
            'mid' => $request->get('mid'),
            'advance' => $request->get('advance'),
            'total' => $request->get('total')

        ]);

        $eventreport->save();
        return redirect('/freport')->with('success', 'Details saved!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $eventreport = pay_event::find($id);
        return view('f_report.edit', compact('eventreport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'c_name' => 'required',
            'event_date' => 'required',
            'time' => 'required',
            'category' => 'required',
            'guests' => 'required',
            'mid' => 'required',
            'advance' => 'required',
            'total' => 'required',
        ]);


        $eventreport = pay_event::find($id);

        $eventreport->c_name = $request->get('c_name');
        $eventreport->event_date = $request->get('event_date');
        $eventreport->time = $request->get('time');
        $eventreport->category = $request->get('category');
        $eventreport->guests = $request->get('guests');
        $eventreport->mid = $request->get('mid');
        $eventreport->advance = $request->get('advance');
        $eventreport->total = $request->get('total');

        $eventreport->save();

        return redirect('/freport')->with('success', 'Details updated!');
    }

    public function destroy($id)
    {
        $eventreport = pay_event::find($id);
        $eventreport->delete();

        return redirect('/freport')->with('success', 'Details deleted!');
    }

    public function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_report_data_to_html());
        return $pdf->stream();
    }

    function convert_report_data_to_html()
    {
        $eventreport = $this->get_report_data();
        $dateth = date("Y/m/d");
        $output = '
                
            <h2 align="center">Event Report</h2>
            <h2>' . $dateth . '</h2>
        <table class="table table-bordered "  align="center">

              
           ';
        foreach ($eventreport as $freport) {
            $output .= '        
               <table  style=" border: 1px solid #ddd;text-align: left;color: #10707f">

                 
                <thead style=" border: 1px solid #ddd;text-align: left;background-color: #bbbfc3">
                <tr>
                    <th scope="col" colspan="4" style="color:blue;">Customer Information</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Customer name......................................................</td>
                    <td>' . $freport->c_name . '</td>
                    <td>Event date.................................................. ......</td>
                    <td>' . $freport->event_date . '</td>
                <tr>
                    <td>Event time.........................................................</td>
                    <td>' . $freport->time . '</td>
                    <td>Category...........................................................</td>
                    <td>' . $freport->category . '</td>
                </tr>
                </tr>
                <tr>

                    <td>No. of Guests.......................................................</td>
                    <td>' . $freport->guests . '</td>
                    <td>Menu ID.............................................................</td>
                    <td>' . $freport->mid . '</td>

                </tr>
                <tr>
                    <th colspan="4" style="color:blue;" >Payment Information</th>
                </tr>
                <tr>

                    <td colspan="2">Advancement.............................................</td>
                    <td>' . $freport->advance . '</td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2">Total Payment...........................................</td>
                    <td>' . $freport->total . '</td>
                    <td></td>

                </tr>
           
           

                </tbody>

         
             
                  
    


       

                ';
        }
        $output .= '</table>';
        return $output;

    }

    /**
     *
     * EXPORT FUNCTION
     *
     */

    public function get_report_data()
    {
        $eventreport = DB::table('pay_events')->limit(10)->get();

        return $eventreport;
    }


}

