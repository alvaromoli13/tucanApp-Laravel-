<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class iWillGo extends Model
{
    protected $table = 'i_will_gos';

    protected $fillable = [
        'id', 'offer_id', 'user_id', 'value'
    ];

    public function oferta(){
        return $this->belongsTo(offer::class, 'offer_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
