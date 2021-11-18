<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellerMessage extends Model
{
    protected $fillable = ['message', 'subject', 'status', 'client_id', 'seller_id'];

    use SoftDeletes;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class);
    }
}
