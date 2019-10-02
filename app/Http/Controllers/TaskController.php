<?php

namespace App\Http\Controllers;

use App\Hall;
use App\Http\Requests\my;
use App\Roominventory;
use App\Task2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index1()
    {
        $inventory = Task2::all();
        return view('inventory')->with('inventoryD', $inventory);
    }

    public function index2()
    {
        $inventory = Hall::all();
        return view('hall')->with('inventoryD', $inventory);
    }

    public function index3()
    {
        $inventory = Roominventory::all();
        return view('room')->with('inventoryD', $inventory);
    }

    public function store1(my $request)
    {
        $validate = Validator::make($request->all(), [
            'name1' => 'required|max:25',
            'std' => 'required'
        ],
            [
                'name1.required' => 'This field is required'
            ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $task1 = new Task2([
            'ItemName' => $request->get('name1'),
            'stockeddate' => $request->get('std'),
            'stockedqty' => $request->get('stq'),
            'issueddate' => $request->get('isd'),
            'issuedqty' => $request->get('isq'),
            'availableqty' => $request->get('avq'),


        ]);
        $task1->save();
        return redirect()->back()->with('success', 'Your Data Successfully Added ');;
        //dd($request -> all());
    }


    public function store3(my $request)
    {
        $validatedData = $request->validated();

        $task2 = new Roominventory([
            'ItemName' => $request->get('name1'),
            'stockeddate' => $request->get('std'),
            'stockedqty' => $request->get('stq'),
            'issueddate' => $request->get('isd'),
            'issuedqty' => $request->get('isq'),
            'availableqty' => $request->get('avq'),


        ]);
        $task2->save();
        return redirect()->back()->with('success', 'Your Data Successfully Added ');
        //dd($request -> all());
    }


    public function store2(my $request)
    {
        $validatedData = $request->validated();

        $task3 = new Hall([
            'ItemName' => $request->get('name1'),
            'stockeddate' => $request->get('std'),
            'stockedqty' => $request->get('stq'),
            'issueddate' => $request->get('isd'),
            'issuedqty' => $request->get('isq'),
            'availableqty' => $request->get('avq'),


        ]);


        $task3->save();

        return redirect()->back()->with('success', 'Your Data Successfully Added ');


        //dd($request -> all());
    }

    public function store5(my $request)
    {
        $task5 = new Roominventory([
            'ItemName' => $request->get('name1'),
            'stockeddate' => $request->get('std'),
            'stockedqty' => $request->get('stq'),
            'issueddate' => $request->get('isd'),
            'issuedqty' => $request->get('isq'),
            'availableqty' => $request->get('avq'),


        ]);

        $task5->save();
        return redirect()->back()->with('success', 'Your Data Successfully Added ');
    }


    public function destroy($id)
    {
        $data = Task2::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Recode Deleted');

    }

    public function destroy2($id)
    {
        $data = Roominventory::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Recode Deleted');

    }

    public function destroy3($id)
    {
        $data = Hall::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Recode Deleted');

    }


    public function search(Request $request)
    {
        $search = $request->get('search');
//       search if ($search == 'all') {
//        $inventoryD = Task::all();
//        return View('inventory', compact("inventoryD"));
//
//    } else {
        $inventoryD = Task2::where('id', 'like', '%' . $search . '%')->get();
        return View('inventory', compact("inventoryD"));//->with('employeeD',$empdata);

    }


}


