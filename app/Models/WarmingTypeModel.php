<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarmingTypeModel extends Model
{
    protected $table="warming_types";
    public $timestamps=true;
    protected $fillable=[
        'name'
    ];
}
