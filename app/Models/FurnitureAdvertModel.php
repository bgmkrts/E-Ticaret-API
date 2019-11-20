<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FurnitureAdvertModel extends Model
{
    protected $table="furniture_adverts";
    public $timestamps=true;
    protected $fillable=[
        'cities_id',
        'furnitureName',
        'adverts_id',
        'status_id',
        'wages_id',
        'users_id'
    ];
}
