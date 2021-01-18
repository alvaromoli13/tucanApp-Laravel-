<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enterprise extends Model
{
    protected $table = 'enterprises';

    protected $fillable = [
        'id', 'name', 'address', 'type', 'logo', 'own',
    ];
}
