<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAdvertModel extends Model
{
    protected $table="home_adverts";
    public $timestamps=true;
    protected $fillable=[
        'cities_id',
        'status_id',
        'explanation',
        'wages_id',
        'users_id',
        'adverts_id'
    ];
    public function User(){
        return $this->belongsTo(UserModel::class,'users_id','id');
    }
    public function Cities(){
        return $this->hasMany(CityModel::class,'id','cities_id');
    }
    public function Statu(){
        return $this->belongsTo(StatuModel::class,'status_id','id');
    }
    public function Wage(){
        return $this->belongsTo(WageModel::class,'wages_id','id');
    }
    public function Advert(){
        return $this->belongsTo(AdvertModel::class,'adverts_id','id');
    }
}
