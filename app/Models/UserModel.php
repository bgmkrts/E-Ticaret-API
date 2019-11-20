<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
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
}
