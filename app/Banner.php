<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    protected $table = "banners";
    protected $fillable = ['name', 'image', 'description', 'status'];


    use ImageUpload;

    use SoftDeletes;
}
