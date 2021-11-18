<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertis extends Model
{
     protected $fillable = ['image', 'name', 'placement', 'status'];

    use SoftDeletes;

    use ImageUpload;
}
