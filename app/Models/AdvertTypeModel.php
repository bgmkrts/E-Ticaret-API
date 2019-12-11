<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertTypeModel extends Model
{
    protected $table = "advert_types";
    public $timestamps=true;
    protected $fillable=[
        'name'
    ];

}
