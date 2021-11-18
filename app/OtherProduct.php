<?php

namespace App;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherProduct extends Model
{
    protected $table = "other_products";
    protected $fillable = ['name', 'image', 'author', 'approve', 'user_id', 'description', 'other_id', 'slug', 'price', 'status'];

    use ImageUpload;

    use SoftDeletes;

    public function other()
    {
        return $this->belongsTo(Other::class);
    }

    public function other_topic()
    {
        return $this->hasMany(OtherTopic::class)->where('status',1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
