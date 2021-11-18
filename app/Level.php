<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    protected $table = "levels";
    protected $fillable = ['name', 'material_id', 'status', 'slug','position'];

    use SoftDeletes;


    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function semester()
    {
        return $this->hasMany(Semester::class);
    }
}
