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

Route::prefix('homeAdvert')->group(function () {
   Route::post('create','HomeAdvertController@create')->middleware('auth:api');
   Route::get('index','HomeAdvertController@index');
   Route::post('update','HomeAdvertController@update');
});
Route::prefix('city')->group(function (){
    Route::post('create','CityController@create');
    Route::get('index','CityController@index');
});
Route::prefix('statu')->group(function () {
    Route::post('create','StatuController@create');
    Route::get('index','StatuController@index');

});
Route::prefix('advert')->group(function () {
    Route::post('create','AdvertController@create');
    Route::get('index','AdvertController@index');
    Route::post('update','AdvertController@update');
});
Route::prefix('wage')->group(function () {
    Route::post('create','WageController@create');
    Route::get('index','WageController@index');
    Route::post('update','WageController@update');
});
Route::prefix('picture')->group(function(){
    Route::post('create','PictureController@create');
    Route::get('index','PictureController@index');
});
Route::prefix('furnitureAdvert')->group(function(){
    Route::post('create','furnitureAdvertController@create');
    Route::get('index','furnitureAdvertController@index');
    Route::post('update','furnitureAdvertController@update');

});
