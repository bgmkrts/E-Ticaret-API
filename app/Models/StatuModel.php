<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatuModel extends Model
{
    protected $table="status";
    public $timestamps=true;
    protected $fillable=[
        'homeStatu',
        'furnitureStatu'
    ];
}
