<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['name', 'image', 'author', 'approve', 'description', 'education_id', 'user_id', 'slug', 'semester_id', 'price', 'status','free'];

    use ImageUpload;

    use SoftDeletes;

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
    
    public function order(){
        return $this->hasMany(Order::class);
    }


    public function topic()
    {
        return $this->hasMany(Topic::class)->where('status',1);
    }

    // public function topiccontent()
    // {
    //     return $this->hasMany(TopicContent::class);
    // }
}
