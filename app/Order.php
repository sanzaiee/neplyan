<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['client_id', 'seller_id', 'amount', 'pid', 'status', 'paymode', 'product_id', 'other_product_id'];



    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


 public function seller()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function other_product()
    {
        return $this->belongsTo(OtherProduct::class);
    }

    // protected $appends = ['is_admin'];

    // public function getIsAdminAttribute()
    // {
    //     return $this->attributes['admin'] === 'yes';
    // }
}
