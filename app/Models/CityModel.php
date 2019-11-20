<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table="cities";
    public $timestamps=true;
    protected $fillable=[
        'cityName',
        'cityPlates'
    ];
}
