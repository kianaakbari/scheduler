<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class untaggedReservations extends Model
{
    protected $fillable=['reservation_id','isReviewed'];
}
