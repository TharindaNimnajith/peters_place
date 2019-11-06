<?php

namespace App\Http\Controllers;

use App\supplier;
use Illuminate\Http\Request;

class suppliercontroller extends Controller
{

    public function index()
    {
        $supplier = supplier::all();
        return view('supplier', compact('supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'suppName' => 'required',
            'email' => 'required',
            'suptype' => 'required',
            'item' => 'required',
            'date' => 'required',
            'bank' => 'required',
            'accNo' => 'required',

        ]);
        $supplier = new supplier([
            'name' => $request->get('suppName'),
            'email' => $request->get('email'),
            'type' => $request->get('suptype'),
            'item' => $request->get('item'),
            'inac_date' => $request->get('date'),
            'bank' => $request->get('bank'),
            'acc_no' => $request->get('accNo'),


        ]);
        $supplier->save();

        return redirect('/supplier')->with('supplier', 'saved');
    }

    public function create()
    {
        return view('supplier');

    }

    public function destroy($id)
    {
        $supplier = supplier::find($id);
        $supplier->delete();
        return redirect('/supplier')->with('success', 'supplier deleted');

        /* supplier::where('id',$id) -> delete();
         return redirect('/supplier')->with('succes','supplier deleted');*/
    }

    /* public function update(Request $request, $id)
     {

         $request->validate([
             'suppName' => 'required',
             'email' => 'required',
             'suptype' => 'required',
             'item' => 'required',
             'date' => 'required',
             'bank' => 'required',
             'accNo' => 'required',

         ]);

         $name = $request->get('suppName');
         $email = $request->get('email');
         $type = $request->get('suptype');
         $item = $request->get('item');
         $inac_date = $request->get('date');
         $bank = $request->get('bank');
         $acc_no = $request->get('accNo');

         $posts = DB::update('update supplier set   name=?, email=?, type=?, item=?, inac_date=?, bank=?,acc_no=? where id=?',[$name, $email, $type, $item, $inac_date, $bank, $acc_no,$id]);
         if($posts){
             $red = redirect('suppliers')->with('success', 'Data has been updated');
         } else{
             $red = redirect('suppliers/edit/' ,$id)->with('danger','Error update, please try again');
         }
         return $red;
     }*/
    public function edit($id)
    {

        $supplier = supplier::find($id);

        return view('updatesupplier', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'suppName' => 'required',
            'email' => 'required',
            'suptype' => 'required',
            'item' => 'required',
            'date' => 'required',
            'bank' => 'required',
            'accNo' => 'required',
        ]);
        $supplier = supplier::find($id);
        $supplier->suppName = $request->get('name');
        $supplier->email = $request->get('email');
        $supplier->suptype = $request->get('type');
        $supplier->item = $request->get('item');
        $supplier->date = $request->get('inac_date');
        $supplier->bank = $request->get('bank');
        $supplier->accNo = $request->get('acc_no');

        $supplier->save();
        return redirect('/supplier')->with('success', 'updated');


        /*$id=$request->id;
        $name=$request->suppName;
        $email=$request->email;
        $suptype=$request->suptype;
        $item=$request->item;
        $date=$request->date;
        $bank=$request->bank;
        $acc=$request->accNo;
        $data=supplier::find($id);

        $data->suppName=$name;
        $data->email=$email;
        $data->suptype=$suptype;
        $data->item=$item;
        $data->date=$date;
        $data->bank=$bank;
        $data->accNo=$acc;

        $data->save();

        $datas=supplier::all();

        return view('supplier')->with('supplier',$datas);*/


    }


    public function show($id)
    {
        //
    }
}
