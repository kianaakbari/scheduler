<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'phone','gender', 'picture_url', 'followers','following', 'instagram_token','category','instagram_username'
    ];
}
