<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    protected $table = 'offers';

    protected $fillable = [
        'id', 'name', 'description', 'start_date', 'finish_date', 'assessment', 'enterprise_id', 'music_direct', 'sport_event'
    ];

    public function Bar(){
        return $this->belongsTo(enterprise::class, 'enterprise_id')->where('type', '=', 'Bar');
    }
    public function Restaurant(){
        return $this->belongsTo(enterprise::class, 'enterprise_id')->where('type', '=', 'Restaurant');
    }
    public function Discotheque(){
        return $this->belongsTo(enterprise::class, 'enterprise_id')->where('type', '=', 'Discotheque');
    }
}
