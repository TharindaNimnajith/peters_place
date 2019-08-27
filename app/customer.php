<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'cid',
        'fname',
        'lname',
        'nic',
        'email',
        'phone',
        'address'
    ];
}
