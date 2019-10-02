<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task2 extends Model
{
    protected $fillable = [

        'id',
        'ItemName',
        'stockeddate',
        'stockedqty',
        'issueddate',
        'issuedqty',
        'availableqty',


    ];
}
