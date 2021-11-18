<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    protected $table = "materials";
    protected $fillable = ['name', 'education_id', 'status', 'slug'];

    use SoftDeletes;

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function level()
    {
        return $this->hasMany(Level::class);
    }
}
