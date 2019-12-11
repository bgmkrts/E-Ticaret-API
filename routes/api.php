<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::post('create','RegisterController@create');
    Route::get('index','RegisterController@index');
    Route::post('login','LoginController@login');
    Route::get('userShow','LoginController@userShow');
    Route::post('forgotPassword', 'ForgotPasswordController@forgotPassword');
    Route::post('resetPassword', 'ForgotPasswordController@resetPassword');

Route::prefix('city')->group(function (){
    Route::post('create','CityController@create');
    Route::get('index','CityController@index');
});

Route::prefix('advert')->group(function () {
    Route::post('create','AdvertController@create')->middleware('auth:api');
    Route::get('index','AdvertController@index');
    Route::post('update','AdvertController@update')->middleware('auth:api');
});

Route::prefix('picture')->group(function(){
    Route::post('create','PictureController@create');
    Route::get('index','PictureController@index');
});
Route::prefix('advertType')->group(function (){
    Route::post('create','AdvertTypeController@create')->middleware('auth:api');
    Route::get('/','AdvertTypeController@index');
});
Route::prefix('Address')->group(function(){
   Route::post('create','AddressController@create');
   Route::get('/','AddressController@index');
});
Route::prefix('District')->group(function (){
    Route::post('create','DistrictController@create');
    Route::get('/','DistrictController@index');
});
Route::prefix('Neighborhood')->group(function (){
    Route::post('create','NeighborhoodController@create');
    Route::get('/','NeighborhoodController@index');
});
Route::prefix('RoomCount')->group(function (){
    Route::post('create','RoomCountController@create');
    Route::get('/','RoomCountController@index');
});
Route::prefix('WarmingType')->group(function (){
    Route::post('create','WarmingTypeController@create');
    Route::get('/','WarmingTypeController@index');
});
Route::prefix('HousingType')->group(function (){
    Route::post('create','HousingTypeController@create');
    Route::get('/','HousingTypeController@index');
});
Route::prefix('Facade')->group(function (){
    Route::post('create','FacadeController@create');
    Route::get('/','FacadeController@index');
});
Route::prefix('furnitureAdvert')->group(function(){
    Route::post('create','furnitureAdvertController@create');
    Route::get('index','furnitureAdvertController@index');
    Route::post('update','furnitureAdvertController@update');
    Route::post('Search','furnitureAdvertController@Search');

});
Route::prefix('homeAdvert')->group(function () {
    Route::post('create','HomeAdvertController@create');
    Route::get('index','HomeAdvertController@index');
    Route::post('update','HomeAdvertController@update');
});


