<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HousingTypeModel extends Model
{
    protected $table="housing_types";
    public $timestamps=true;
    protected $fillable=[
        'name'
    ];
}
