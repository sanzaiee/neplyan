<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    protected $table = "topics";
    protected $fillable = ['product_id', 'heading', 'title', 'status', 'description','is_chapter','page_status'];

    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function topiccontent()
    {
        return $this->hasMany(TopicContent::class);
    }
}
