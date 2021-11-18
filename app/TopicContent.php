<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicContent extends Model
{
    protected $table = "topic_contents";
    protected $fillable = ['topic_id', 'content', 'title', 'status'];

    use SoftDeletes;


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
