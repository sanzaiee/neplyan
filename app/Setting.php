<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['name', 'location', 'phone','fav','mobile', 'email', 'footer', 'image', 'opening', 'maplink', 'facebook', 'twitter', 'instagram', 'youtube', 'tiktok', 'status'];

    use ImageUpload;
    use SoftDeletes;
}
