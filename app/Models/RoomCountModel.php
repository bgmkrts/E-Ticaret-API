<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCountModel extends Model
{
    protected $table="room_counts";
    public $timestamps=true;
    protected $fillable=[
        'name'
    ];
}
