<?php

namespace App\Http\Controllers;

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
        $data =  Taskadd::all();
        return view('print')->with('print', $data);
    }

    public function taskslist(){



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
    public function statusSearch(Request $request){



        $gat = $request->get('search');

        $sty = DB::table('rooms')->where('id','like','%'.$gat.'%')->paginate(5);


        return view('StatutsUpdate',['up'=>$sty]);


    }



    public function supdate()
    {


      return view('StatutsUpdate');


    }




    public function retriveupdate()
    {

        $datup = room::all();

   return view('StatutsUpdate',['up'=>$datup]);

    }




    public function founditems(){

         return view('found');

}

public function store(Request $request){


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


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/foundite/',$filename);
            $foundite->image=$filename;

        }else {

            return $request;
            $highlights->image = '';

        }

            $foundite->save();

            return view('found')->with('employee', $foundite);

    }


    public function updating($id){

        $status = room::find($id);

        return view('RstatusUpdate')->with('statusdata',$status);



    }


    public function newViewUp(Request $request){


        $this->validate($request, [
            'status' => 'required',
        ]);

        $id=$request->id;
        $status=$request->status;

        $data=room::find($id);
        $data->status=$status;
        $data->save();

        $datas=room::all();


        return view('StatutsUpdate',['up'=>$datas]);
    }

   /* public function itemview()
    {


        return view('lostitemsretrive');


    }
*/
    public function retriveLitems()
    {

        $last = foundite::all();

        return view('lostitemsretrive',['lf'=>$last]);

    }


    public function deleteLostItem($id)
    {
        $lf = foundite::find($id);

        $lf->delete();
        return redirect()->back();
    }

}
