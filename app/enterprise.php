<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enterprise extends Model
{
    protected $table = 'enterprises';

    protected $fillable = [
        'id', 'name', 'address', 'type', 'logo', 'own',
    ];

    public function ofertas()
    {
        return $this->hasMany('App\offer');
    }

    public function dueño(){
        return $this->belongsTo(User::class, 'own');
    }

    
}
