<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    protected $table="districts";
    public $timestamps=true;
    protected $fillable=[
        'name'
    ];
}
