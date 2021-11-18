<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Heading extends Model
{
    protected $table = "headings";
    protected $fillable = ['subject_id', 'heading', 'title', 'status'];

    use SoftDeletes;

    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
