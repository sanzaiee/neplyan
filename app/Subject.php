<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    protected $table = "subjects";
    protected $fillable = ['name', 'image', 'author', 'education_id', 'material_id', 'description', 'level_id', 'semester_id', 'price', 'status'];


    use ImageUpload;

    use SoftDeletes;

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
