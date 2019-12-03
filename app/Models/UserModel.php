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
        'email',
        'password',
        'cities_id',
        'profilePhoto'
    ];
    public function City(){
        return $this->belongsTo('App\Models\CityModel','cities_id','id');
    }
}
