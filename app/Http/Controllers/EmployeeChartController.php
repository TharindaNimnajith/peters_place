<?php

namespace App\Http\Controllers;

use App\Charts\test1;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EmployeeChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = collect([]);//declare as a Array-----------------
        $data2 = collect([]);
        $user_info = DB::table('memployees')->where('month', 'Sep')
            ->select('id', DB::raw('count(*) as total'))
            ->groupBy('id')
            ->get();
        //find relevant information from table--------------
        foreach ($user_info as $row) {
            $data->push($row->id);
            $data2->push($row->total);
        };

        //add data to Array---------------------------------------

        $chart = new test1();
        //begin chart----------------------
        $chart->labels($data->values());
        $chart->dataset('Employee Attendance', 'line', $data2->values());
        //add label and data set
        return view('EmployeeChart', compact('chart'));

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
