<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherTopic extends Model
{
    protected $table = "other_topics";
    protected $fillable = ['other_product_id', 'heading', 'title', 'status', 'description','is_chapter','page_status'];

    use SoftDeletes;

    public function other_product()
    {
        return $this->belongsTo(OtherProduct::class);
    }

    public function otherTopicContent()
    {
        return $this->hasMany(OtherTopicContent::class);
    }
}
