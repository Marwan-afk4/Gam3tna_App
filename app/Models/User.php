<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;


    protected $fillable =[
        'collage_id',
        'universty_id',
        'name',
        'email',
        'password',
        'phone',
        'year',
        'role',
    ];

    protected $hidden = [
        'password','remember_token',
    ];

    public function college(){
        return $this->belongsTo(Collage::class);
    }

    public function universty(){
        return $this->belongsTo(Universty::class);
    }
}
