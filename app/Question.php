<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = ['product_id', 'slug', 'name', 'description', 'question', 'image', 'status'];

    use ImageUpload;

    use SoftDeletes;
}
