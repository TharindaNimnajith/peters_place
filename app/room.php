<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $fillable = [
        'room_no',
        'floor',
        'availability',
        'status',
        'description',
        't_id'
    ];
}
