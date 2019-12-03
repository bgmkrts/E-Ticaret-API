<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FurnitureAdvertModel extends Model
{
    protected $table="furniture_adverts";
    public $timestamps=true;
    protected $fillable=[
        'cities_id',
        'furniture_name',
        'adverts_id',
        'status_id',
        'wages_id',
        'users_id'
    ];
    public function Cities(){
        return $this->hasMany(CityModel::class,'id','cities_id');
    }
    public function User(){
        return $this->belongsTo(UserModel::class,'users_id','id');
    }
    public function Advert(){
        return $this->belongsTo(AdvertModel::class,'adverts_id','id');
    }
    public function Statu(){
        return $this->belongsTo(StatuModel::class,'status_id','id');
}
  public function Wage(){
        return $this->belongsTo(WageModel::CLASS,'wages_id','id');
  }
}
