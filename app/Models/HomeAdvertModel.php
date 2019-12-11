<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAdvertModel extends Model
{
    protected $table="home_adverts";
    public $timestamps=true;
    protected $fillable=[
        'adverts_id',
        'squareMeters',
        'room_counts_id',
        'buildingAge',
        'isItBalcony',
        'floorLocation',
        'countFloor',
        'warming_types_id',
        'countBathroom',
        'isItFurnished',
        'inTheSites',
        'dues',
        'deposit',
        'facades_id',
        'isTheElevator',
        'isTheParking',
        'housing_types_id',
        'usingStatus'
    ];

    public function Facade(){
        return $this->belongsTo(FacadeModel::class,'facades_id','id');
    }
    public function RoomCount(){
        return $this->belongsTo(RoomCountModel::class,'room_counts_id','id');
    }
    public function WarmingType(){
        return $this->belongsTo(WarmingTypeModel::class,'warming_types_id','id');
    }
    public function HousingType(){
        return $this->belongsTo(HousingTypeModel::class,'housing_types_id','id');
    }
    public function Advert(){
        return $this->belongsTo(AdvertModel::class,'adverts_id','id');
    }

}
