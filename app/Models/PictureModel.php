<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PictureModel extends Model
{
    protected $table="pictures";
    public $timestamps=true;
    protected $fillable=[
        'adverts_id',
        'pictures'
    ];
    public function Adverts(){
        return $this->hasMany(AdvertModel::class,'id','adverts_id');
    }

}

