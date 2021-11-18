<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


// use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $guard = 'client';

    protected $table = "clients";
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'address', 'loggedIn', 'status'
    ];

    use SoftDeletes;

    
    public function profile(){
        return $this->hasOne(ClientProfile::class);
    }
    
    public function support(){
        return $this->hasMany(Support::class);
    }
    
    
}
