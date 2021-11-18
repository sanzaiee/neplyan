<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fnq extends Model
{
    protected $table = "fnqs";
    protected $fillable = ['question', 'answer', 'status'];

    use SoftDeletes;
}
