<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAdvertModel extends Model
{
    protected $table="home_adverts";
    public $timestamps=true;
    protected $fillable=[
        'cities_id',
        'status_id',
        'explanation',
        'wages_id',
        'users_id',
        'adverts_id'
    ];
}
