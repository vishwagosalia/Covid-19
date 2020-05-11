<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    protected $table = 'state_data';
    protected $fillable = [
        'state', 'active', 'confirmed', 'deaths', 'recovered',
    ];
}
