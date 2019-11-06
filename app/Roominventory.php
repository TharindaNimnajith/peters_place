<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roominventory extends Model
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

