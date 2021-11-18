<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RandomContent extends Model
{
    protected $table = "random_contents";
    protected $fillable = ['name', 'content', 'content_type', 'status'];


    use ImageUpload;

    use SoftDeletes;

  
}
