<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    protected $table = "notices";
    protected $fillable = ['name', 'content', 'status', 'fordate', 'contentType', 'slug'];


    use ImageUpload;

    use SoftDeletes;
}
