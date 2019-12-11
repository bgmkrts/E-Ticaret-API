<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class UserModel extends Model
{
    use HasApiTokens, Notifiable;
    protected $table="users";
    public $timestamps=true;
    protected $fillable=[
        'name',
        'surname',
        'nickName',
        'email',
        'password',
        'cities_id',
        'profilePhoto',
        'telNo',
    ];
    public function City(){
        return $this->belongsTo(CityModel::class,'cities_id','id');
    }
    public function Advert(){
        return $this->hasMany(AdvertModel::class,'users_id','id');
    }
}
