<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserve extends Model
{
    protected $fillable = [
        'r_id',
        'cid',
        'room_no',
        't_id',
        'resereved_date_time',
        'check_in',
        'check_out'
    ];
}
