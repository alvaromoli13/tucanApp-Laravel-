<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iWillGo extends Model
{
    protected $table = 'iWillGoes';

    protected $fillable = [
        'id', 'offer_id', 'user_id'
    ];

    public function oferta(){
        return $this->belongsTo(offer::class, 'offer_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
