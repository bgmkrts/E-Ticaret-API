<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FurnitureAdvertModel extends Model
{
    protected $table="furniture_adverts";
    public $timestamps=true;
    protected $fillable=[
        'product',
        'brand',
        'model',
        'status',
        'isItGuarantee',
        'adverts_id'
 ];
    public function Adverts(){
        return $this->belongsTo(AdvertModel::class,'adverts_id','id');
    }
}
