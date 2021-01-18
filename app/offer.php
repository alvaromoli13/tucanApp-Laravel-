<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    protected $table = 'offers';

    protected $fillable = [
        'id', 'name', 'description', 'start_date', 'finish_date', 'assessment', 'enterprise_id',
    ];
}
