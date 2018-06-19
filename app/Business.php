<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'phone','email', 'address', 'location', 'credit', 'instagram_account'
    ];
}
