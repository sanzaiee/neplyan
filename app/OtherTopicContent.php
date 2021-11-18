<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherTopicContent extends Model
{
    protected $table = "other_topic_contents";
    protected $fillable = ['other_topic_id', 'content', 'title', 'status'];

    use SoftDeletes;


    public function otherTopic()
    {
        return $this->belongsTo(OtherTopic::class);
    }
}
