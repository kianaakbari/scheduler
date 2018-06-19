<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QRCodes extends Model
{
    //
    protected $fillable = ['reserve_id','code','picture_url'];
}
