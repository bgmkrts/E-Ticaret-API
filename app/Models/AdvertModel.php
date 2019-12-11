<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertModel extends Model
{
    protected $table="adverts";
    public $timestamps=true;
    protected $fillable=[
        'title',
        'contents',
        'users_id',
        'price',
        'addresses_id',
        'advertNo',
        'advert_types_id',
        'isActive',
    ];

 public function User(){
     return $this->hasMany(UserModel::class,'id','users_id');
 }
 public function Address(){
     return $this->belongsTo(AddressModel::class,'addresses_id','id');
 }
 public function AdvertType(){
     return $this->belongsTo(AdvertTypeModel::class,'advert_types_id','id');
 }
 public function Picture(){
     return $this->hasMany(PictureModel::class,'adverts_id','id');
 }
}
