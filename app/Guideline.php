<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guideline extends Model
{
    protected $table = "guidelines";
    protected $fillable = ['description1', 'description2', 'description3', 'title1', 'title2', 'title3', 'status'];

    use SoftDeletes;
}
