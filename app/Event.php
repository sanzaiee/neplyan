<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $table = "events";
    protected $fillable = ['name', 'image', 'address', 'slug', 'description', 'maplink', 'status', 'start', 'end', 'onDate'];


    use ImageUpload;

    use SoftDeletes;
}
