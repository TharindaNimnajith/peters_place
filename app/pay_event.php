<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pay_event extends Model
{
    protected $fillable = [

        'c_name',
        'event_date',
        'time',
        'category',
        'guests',
        'mid',
        'advance',
        'total'

    ];
}
