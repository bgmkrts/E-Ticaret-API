<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WageModel extends Model
{
    protected $table="wages";
    public $timestamps=true;
    protected $fillable=[
        'rentHome',
        'furniturePrice'
    ];
}
