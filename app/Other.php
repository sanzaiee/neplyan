<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Other extends Model
{
    protected $table = "others";
    protected $fillable = ['name', 'status', 'slug'];

    use SoftDeletes;

    public function other()
    {
        return $this->hasMany(OtherProduct::class);
    }
    
    public function otherApprove()
    {
        return $this->hasMany(OtherProduct::class)->where('approve',1);
    }
}
