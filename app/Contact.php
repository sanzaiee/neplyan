<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    protected $fillable = ['fullname', 'message', 'subject', 'email', 'status'];
    use SoftDeletes;
}
