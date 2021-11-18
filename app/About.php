<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    protected $table = 'abouts';

    protected $fillable = ['image', 'short_description', 'description', 'status', 'title'];

    use SoftDeletes;

    use ImageUpload;
}
