<?php

namespace App\Http\Controllers;

use App;
use App\foundite;
use App\room;
use App\Taskadd;
use DB;
use Illuminate\Http\Request;

class frontaddtask extends Controller
{

    public function indexassing()
    {

        $data = Taskadd::all();

        return view('AssingTask')->with('AssingTask', $data);


    }

    public function prnpriview()
    {
        $data = Taskadd::all();
        return view('print')->with('print', $data);
    }

    public function taskslist()
    {


        $data = Taskadd::all();
        return view('Tasks')->with('AssingTask', $data);


    }


    public function insert(Request $request)
    {

        //dd($request ->all());

        $this->validate($request, [
            'RoomNo' => 'required|max:3|min:3',
            'Date' => 'required',
            'RoomType' => 'required',
            'Task' => 'required',
            'Housekeeper' => 'required',

        ]);


        $RoomNo = $request->input('RoomNo');
        $Date = $request->input('Date');
        $RoomType = $request->input('RoomType');
        $Task = $request->input('Task');
        $Housekeeper = $request->input('Housekeeper');

        $data = array('RoomNo' => $RoomNo, 'Date' => $Date, 'RoomType' => $RoomType, 'Task' => $Task, 'Housekeeper' => $Housekeeper);

        DB::table('taskadds')->insert($data);

        $rget = Taskadd::all();


        return view('Tasks')->with('Tasks', $rget);


    }

    public function deletetask($id)
    {
        $task = Taskadd::find($id);

        $task->delete();
        return redirect()->back();
    }

    /*

        public function Listsearch()
        {

            return view('statusList');

            $data = room::all();

            return view('statusList')->with('statusList', $data);

        }


        public function retrive()
        {

            $dataa = room::all();

            return view('statusList',['sty'=>$dataa]);
        }

        */
    public function statusSearch(Request $request)
    {


        $gat = $request->get('search');

        $sty = DB::table('rooms')->where('id', 'like', '%' . $gat . '%')->paginate(5);


        return view('StatutsUpdate', ['up' => $sty]);


    }


    public function supdate()
    {


        return view('StatutsUpdate');


    }


    public function retriveupdate()
    {

        $datup = room::all();

        return view('StatutsUpdate', ['up' => $datup]);

    }


    public function founditems()
    {

        return view('found');

    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'typo' => 'required',
            'place' => 'required',
            'Description' => 'required',

        ]);


        $foundite = new foundite();

        $foundite->itm_typ = $request->input('typo');
        $foundite->place = $request->input('place');
        $foundite->discription = $request->input('Description');
        $foundite->image = $request->input('image');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/foundite/', $filename);
            $foundite->image = $filename;

        } else {

            return $request;
            $highlights->image = '';

        }

        $foundite->save();

        return view('found')->with('employee', $foundite);

    }


    public function updating($id)
    {

        $status = room::find($id);

        return view('RstatusUpdate')->with('statusdata', $status);


    }


    public function newViewUp(Request $request)
    {


        $this->validate($request, [
            'status' => 'required',
        ]);

        $id = $request->id;
        $status = $request->status;

        $data = room::find($id);
        $data->status = $status;
        $data->save();

        $datas = room::all();


        return view('StatutsUpdate', ['up' => $datas]);
    }

    /* public function itemview()
     {


         return view('lostitemsretrive');


     }
 */
    public function retriveLitems()
    {

        $last = foundite::all();

        return view('lostitemsretrive', ['lf' => $last]);

    }


    public function deleteLostItem($id)
    {
        $lf = foundite::find($id);

        $lf->delete();
        return redirect()->back();
    }

    //reports

    function indexH()
    {
        $housekeeping_data = $this->get_housekeeping_data();
        return view('taskrepo')->with('housekeeping_data', $housekeeping_data);
    }

    function get_housekeeping_data()
    {
        $housekeeping_data = DB::table('taskadds')
            ->limit(10)
            ->get();
        return $housekeeping_data;
    }

    function pdfH()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_housekeeping_data_to_html());
        return $pdf->stream();
    }

    function convert_housekeeping_data_to_html()
    {
        $housekeeping_data = $this->get_housekeeping_data();
        $output = '
     <h3 align="center">HOUSEKEEPING</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Room No</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Room Type</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Housekeeper</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Data</th>
   
   </tr>
     ';
        foreach ($housekeeping_data as $house) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">' . $house->RoomNo . '</td>
       <td style="border: 1px solid; padding:12px;">' . $house->RoomType . '</td>
       <td style="border: 1px solid; padding:12px;">' . $house->Housekeeper . '</td>
       <td style="border: 1px solid; padding:12px;">' . $house->Date . '</td>
       
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;

    }

//report2

    function indexF()
    {
        $founditems_data = $this->get_founditems_data();
        return view('foundrepo')->with('founditems_data', $founditems_data);
    }

    function get_founditems_data()
    {
        $founditems_data = DB::table('foundites')
            ->limit(10)
            ->get();
        return $founditems_data;
    }

    function pdfHF()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_founditems_data_to_html());
        return $pdf->stream();
    }

    function convert_founditems_data_to_html()
    {
        $founditems_data = $this->get_founditems_data();
        $output = '
     <h3 align="center">Lost And Found Items</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Item Type</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Place</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Description</th>
    
   
   </tr>
     ';
        foreach ($founditems_data as $found) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">' . $found->itm_typ . '</td>
       <td style="border: 1px solid; padding:12px;">' . $found->place . '</td>
       <td style="border: 1px solid; padding:12px;">' . $found->discription . '</td>
         
       
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;

    }

    //report3


    function indexState()
    {
        $status_d = $this->get_status_d();
        return view('Statusrepo')->with('status_d', $status_d);
    }

    function get_status_d()
    {
        $status_d = DB::table('rooms')
            ->limit(10)
            ->get();
        return $status_d;
    }

    function pdfstate()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_status_d_to_html());
        return $pdf->stream();
    }

    function convert_status_d_to_html()
    {
        $status_d = $this->get_status_d();
        $output = '
     <h3 align="center">Room Status</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Room number</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Floor</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Reservation status</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Housekeeping Status</th>
    
   
   </tr>
     ';
        foreach ($status_d as $state) {


// availability - formatting db value

            if ($state->availability) {
                $availability = "Available";
            } else {
                $availability = "Not Available";
            }


// status - formatting db value

            if ($state->status == 1) {
                $status = "Clean";
            } else if ($state->status == 2) {
                $status = "Not Clean";
            } else if ($state->status == 3) {
                $status = "Out of Service";
            }


            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">' . $state->id . '</td>
       <td style="border: 1px solid; padding:12px;">' . $state->floor . '</td>
       <td style="border: 1px solid; padding:12px;">' . $availability . '</td>
       <td style="border: 1px solid; padding:12px;">' . $status . '</td>
         
       
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }


}
