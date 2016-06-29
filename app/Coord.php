<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coord extends Model
{

    protected $table = 'gps_data';

    protected $fillable = [
        'lat',
        'lon',
        'speed'
    ];
}
