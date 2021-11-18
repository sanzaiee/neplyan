<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    protected $table = "education";
    protected $fillable = ['name', 'status', 'slug','position'];

    use SoftDeletes;

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    
    public function approveprod()
    {
        return $this->hasMany(Product::class)->where('status',1)->where('approve',1);
    }
}
