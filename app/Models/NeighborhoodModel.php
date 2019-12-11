<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeighborhoodModel extends Model
{
    protected $table="neighborhoods";
    public $timestamps=true;
    protected $fillable=[
        'name'
    ];
}
