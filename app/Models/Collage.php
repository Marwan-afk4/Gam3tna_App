<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{


    protected $fillable = [
        'universty_id',
        'name'
    ];

    public function universty(){
        return $this->belongsTo(Universty::class);
    }
}
