<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DynamicPDFController1 extends Controller
{
    function index()
    {
        $accoms = $this->get_customer_data1();
        return view('index1')->with('customer_data1', $accoms);
    }

    function get_customer_data1()
    {
        $accoms = DB::table('accoms')
            ->limit(10)
            ->get();

        return $accoms;
    }

    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html1());
        //$pdf->stream();
        return $pdf->download('dynamic1_pdf');
    }

    function convert_customer_data_to_html1()
    {
        $accoms = $this->get_customer_data1();
        $dateth = date("Y/m/d");
        $output1 = '
        <h3 align="center">Accommodation Details</h3>
        <h2>' . $dateth . '</h2>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <th style="border: 1px solid; padding: 12px;" width="20%">Arrival</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Departure</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Adults</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Kids</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Room Type</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Room No</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Food Service</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Payment</th>
        <th style="border: 1px solid; padding: 12px;" width="40%">NIC</th>
        
</tr>
';
        foreach ($accoms as $customer1) {
            $output1 .= '
            <tr>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->arrival_date . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->deparure_date . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->adults . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->kids . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->room_type . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->room_no . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->food_ser . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->payment . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer1->nic . '</td>
            </tr>
            ';
        }
        $output1 .= '</table>';
        return $output1;
    }

}
