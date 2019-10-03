<?php

namespace App\Http\Controllers;


use App\Expends;
use Illuminate\Http\Request;


class ExpendsController extends Controller
{
    public function index()
    {
        $expend = Expends::all();
        return view('expenditureFinal', compact('expend'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'date' => 'required'
        ]);

        $expend = new Expends([
            'type' => $request->get('item'),
            'amount' => $request->get('amount'),
            'date' => $request->get('date')
        ]);

        $expend->save();
        //$data = expends::all();

        return redirect('/expenditureFinal')->with('expend', 'saved');
    }

    public function create()
    {
        return view('expenditureFinal');
    }

    public function destroy($id)
    {
        $expend = Expends::find($id);
        $expend->delete();
        return redirect('/expenditureFinal')->with('success', 'supplier deleted');
    }

    public function edit($id)
    {

        $expend = Expends::find($id);

        return view('updateEx', compact('expend'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required',
            'date' => 'required'
        ]);
        $expend = Expends::find($id);
        $expend->item = $request->get('type');
        $expend->amount = $request->get('amount');
        $expend->o_date = $request->get('date');


        $expend->save();
        return redirect('/expenditureFinal')->with('success', 'updated');


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
