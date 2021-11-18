<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = ['client_id', 'comment', 'blog_id', 'status'];



    use SoftDeletes;

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
