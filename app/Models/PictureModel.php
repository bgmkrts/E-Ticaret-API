<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PictureModel extends Model
{
    protected $table="pictures";
    public $timestamps=true;
    protected $fillable=[
        'adverts_id',
        'picture'
    ];
}
