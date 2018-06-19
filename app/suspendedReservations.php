<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suspendedReservations extends Model
{
    protected $fillable=['reservation_id','time','infuencer_instagram_token','business_instagram_username'];
}
