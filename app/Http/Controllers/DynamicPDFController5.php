<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DynamicPDFController5 extends Controller
{
    function index()
    {
        $events = $this->get_customer_data5();
        return view('index5')->with('customer_data5', $events);
    }

    function get_customer_data5()
    {
        $events = DB::table('events')
            ->limit(10)
            ->get();

        return $events;
    }

    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html5());
        //$pdf->stream();
        return $pdf->download('dynamic_pdf5');
    }

    function convert_customer_data_to_html5()
    {
        $events = $this->get_customer_data5();
        $dateth = date("Y/m/d");
        $output5 = '
        <h3 align="center">Event Details</h3>
        <h2>' . $dateth . '</h2>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <th style="border: 1px solid; padding: 12px;" width="20%">Customer Name</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Event Date</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Event Time</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Category</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">No. of Guests</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Menu ID</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Advancement</th>
        <th style="border: 1px solid; padding: 12px;" width="40%">Total Payment</th>
        
        
</tr>
';
        foreach ($events as $customer5) {
            $output5 .= '
            <tr>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->c_name . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->event_date . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->time . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->category . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->guests . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->mid . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->advance . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer5->total . '</td>
            
            </tr>
            ';
        }
        $output5 .= '</table>';
        return $output5;
    }


}
