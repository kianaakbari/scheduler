<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable=['user_id','offer_id','active','time','is_discount','discount_id','used'];
}
