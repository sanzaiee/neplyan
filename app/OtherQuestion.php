<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherQuestion extends Model
{
    protected $table = "other_questions";
    protected $fillable = ['other_product_id', 'slug', 'name', 'description', 'question', 'image', 'status'];

    use ImageUpload;

    use SoftDeletes;
}
