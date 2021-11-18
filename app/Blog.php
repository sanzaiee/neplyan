<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected $table = "blogs";
    protected $fillable = ['name', 'image', 'tag_id', 'slug', 'description', 'short_description', 'status'];


    use ImageUpload;

    use SoftDeletes;

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
