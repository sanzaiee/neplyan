<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationNotice extends Model
{
    protected $table = "education_notices";
    protected $fillable = ['name', 'status', 'image', 'description', 'education_id', 'slug'];

    use SoftDeletes;

    use ImageUpload;

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
