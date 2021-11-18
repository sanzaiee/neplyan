<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    protected $fillable = ['subject', 'message', 'client_id', 'seller_id', 'status'];

    use SoftDeletes;
    
    public function client(){
        return $this->belongsTo(Client::class);
    }
    
    
    public function seller(){
        return $this->belongsTo(User::class);
    }
}
