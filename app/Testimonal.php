<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonal extends Model
{
    protected $fillable = ['name', 'message', 'post', 'image', 'status'];

    use SoftDeletes;

    use ImageUpload;
}
