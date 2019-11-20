<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertModel extends Model
{
    protected $table="adverts";
    public $timestamps=true;
    protected $fillable=[
        'advertSubject',
        'isItSold'
    ];
}
