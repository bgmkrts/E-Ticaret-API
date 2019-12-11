<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacadeModel extends Model
{
    protected $table="facades";
    public $timestamps=true;
    protected $fillable=[
        'name'
    ];
}
