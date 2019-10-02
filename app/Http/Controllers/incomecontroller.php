<?php

namespace App\Http\Controllers;

use App\income;
use Illuminate\Http\Request;

class incomecontroller extends Controller
{
    public function insert(Request $request)
    {
        $income = new income;

        $income->date = $request->date;

        $income->save();
    }
}
