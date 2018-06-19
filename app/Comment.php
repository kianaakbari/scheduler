<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=['offer_id','discount_id','comment','rate','user_id'];
}
