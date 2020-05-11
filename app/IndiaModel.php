<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndiaModel extends Model
{
    protected $table = 'india_data';
    protected $fillable = [
        'active', 'confirmed', 'deaths', 'recovered'
    ];
}
