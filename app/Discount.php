<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $fillable = ['owner','title','description','price','start_date','exp_date','reserved','numbers'];
}
