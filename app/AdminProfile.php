<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProfile extends Model
{

    protected $fillable = ['admin_id', 'fullname', 'image', 'about', 'address', 'facebook', 'instagram', 'twitter', 'youtube'];

    use ImageUpload;

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
