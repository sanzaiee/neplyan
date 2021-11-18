<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    protected $table = 'terms';

    protected $fillable = ['description', 'title', 'status'];


    use SoftDeletes;
}
