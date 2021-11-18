<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    protected $table = "semesters";
    protected $fillable = ['name', 'level_id', 'status', 'slug'];

    use SoftDeletes;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
