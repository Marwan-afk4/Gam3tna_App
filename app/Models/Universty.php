<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universty extends Model
{


    protected $fillable =[
        'name',
        'email',
        'location',
        'image'
    ];

    public function collages(){
        return $this->hasMany(Collage::class);}
}
