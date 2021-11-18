<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProfile extends Model
{
    protected $table = "client_profiles";

    protected $fillable = ['client_id', 'fullname', 'image', 'about', 'address', 'facebook', 'instagram', 'twitter', 'youtube'];

    use ImageUpload;

    use SoftDeletes;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
