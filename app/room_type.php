<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_type extends Model
{
    protected $fillable = [
        't_id',
        'name',
        'description',
        'base_price'
    ];
}
