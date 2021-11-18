<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['name', 'status'];

    use SoftDeletes;

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
