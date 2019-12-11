<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    protected $table="addresses";
    public $timestamps=true;
    protected $fillable=[
        'cities_id',
        'districts_id',
        'neighborhoods_id',
        'latitude',
        'longitude',
        'adverts_id',
        'fullAddress',
        'users_id'
    ];
    public function City(){
        return $this->belongsTo(CityModel::class,'cities_id','id');
    }
    public function District(){
        return $this->belongsTo(DistrictModel::class,'districts_id','id');
    }
    public function Neighborhood(){
        return $this->belongsTo(NeighborhoodModel::class,'neighborhoods_id','id');
    }
   public function Adverts(){
        return $this->hasMany(AdvertModel::class,'id','adverts_id');
   }
}
