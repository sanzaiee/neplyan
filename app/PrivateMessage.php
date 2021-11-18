<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivateMessage extends Model
{
   protected $fillable = ['user_id','client_id', 'message', 'subject', 'status'];
    use SoftDeletes;
}
