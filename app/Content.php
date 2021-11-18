<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    protected $table = "contents";
    protected $fillable = ['heading_id', 'content', 'title', 'status'];

    use SoftDeletes;

    public function heading()
    {
        return $this->belongsTo(Heading::class);
    }
}
