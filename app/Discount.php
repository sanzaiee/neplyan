<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable =['title','percent','status'];
    
    use SoftDeletes;

}
