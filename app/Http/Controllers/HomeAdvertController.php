<?php

namespace App\Http\Controllers;
use App\Models\HomeAdvertModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class HomeAdvertController extends Controller
{
    public function index(){

        $home_adverts=HomeAdvertModel::with('Advert','Facade','RoomCount','WarmingType','HousingType','Advert.User','Advert.AdvertType')->get();
        return Response::json([
            'result'=>'ok',
            'data'=>$home_adverts,
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'adverts_id'=>'required|int',
            'squareMeters'=>'required',
            'room_counts_id'=>'required|int',
            'buildingAge'=>'required',
            'isItBalcony'=>'required',
            'floorLocation'=>'required',
            'countFloor'=>'required',
            'warming_types_id'=>'required|int',
            'countBathroom'=>'required',
            'isItFurnished'=>'required',
            'inTheSites'=>'required',
            'dues'=>'required',
            'deposit'=>'required',
            'facades_id'=>'required|int',
            'isTheElevator'=>'required',
            'isTheParking'=>'required',
            'housing_types_id'=>'required|int',
            'usingStatus'=>'required'

            ]);

        if ($validator->fails()) {
            $errors = array();
            foreach ($validator->errors()->messages() as $key => $value) {
                $errors[] = [
                    'field' => $key,
                    'message' => $value[0]
                ];
            }
            return Response::json([
                'result' => 'Error',
                "code" => "10",
                'errors' => $errors,
            ]);
        }
        $home_adverts=new HomeAdvertModel();
        $home_adverts->adverts_id=$request->adverts_id;
        $home_adverts->squareMeters=$request->squareMeters;
        $home_adverts->room_counts_id=$request->room_counts_id;
        $home_adverts->buildingAge=$request->buildingAge;
        $home_adverts->isItBalcony=$request->isItBalcony;
        $home_adverts->floorLocation=$request->floorLocation;
        $home_adverts->countFloor=$request->countFloor;
        $home_adverts->warming_types_id=$request->warming_types_id;
        $home_adverts->countBathroom=$request->countBathroom;
        $home_adverts->isItFurnished=$request->isItFurnished;
        $home_adverts->inTheSites=$request->inTheSites;
        $home_adverts->dues=$request->dues;
        $home_adverts->deposit=$request->deposit;
        $home_adverts->facades_id=$request->facades_id;
        $home_adverts->isTheElevator=$request->isTheElevator;
        $home_adverts->isTheParking=$request->isTheParking;
        $home_adverts->housing_types_id=$request->housing_types_id;
        $home_adverts->usingStatus=$request->usingStatus;
        $home_adverts->save();
        return Response::json([
            'message'=>'Home advert created',
            'result'=>'ok'
        ]);

    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'adverts_id'=>'required|int',
            'squareMeters'=>'required',
            'room_counts_id'=>'required|int',
            'buildingAge'=>'required',
            'isItBalcony'=>'required',
            'floorLocation'=>'required',
            'countFloor'=>'required',
            'warming_types_id'=>'required|int',
            'countBathroom'=>'required',
            'isItFurnished'=>'required',
            'inTheSites'=>'required',
            'dues'=>'required',
            'deposit'=>'required',
            'facades_id'=>'required|int',
            'isTheElevator'=>'required',
            'isTheParking'=>'required',
            'housing_types_id'=>'required|int',
            'usingStatus'=>'required'

        ]);
        if ($validator->fails()) {
            $errors = array();
            foreach ($validator->errors()->messages() as $key => $value) {
                $errors[] = [
                    'field' => $key,
                    'message' => $value[0]
                ];
            }
            return Response::json([
                'result' => 'Error',
                "code" => "10",
                'errors' => $errors,
            ]);
        }
        $home_adverts = HomeAdvertModel::find($request->id);
        $home_adverts->id=$request->id;
        $home_adverts->adverts_id=$request->adverts_id;
        $home_adverts->squareMeters=$request->squareMeters;
        $home_adverts->room_counts_id=$request->room_counts_id;
        $home_adverts->buildingAge=$request->buildingAge;
        $home_adverts->isItBalcony=$request->isItBalcony;
        $home_adverts->floorLocation=$request->floorLocation;
        $home_adverts->countFloor=$request->countFloor;
        $home_adverts->warming_types_id=$request->warming_types_id;
        $home_adverts->countBathroom=$request->countBathroom;
        $home_adverts->isItFurnished=$request->isItFurnished;
        $home_adverts->inTheSites=$request->inTheSites;
        $home_adverts->dues=$request->dues;
        $home_adverts->deposit=$request->deposit;
        $home_adverts->facades_id=$request->facades_id;
        $home_adverts->isTheElevator=$request->isTheElevator;
        $home_adverts->isTheParking=$request->isTheParking;
        $home_adverts->housing_types_id=$request->housing_types_id;
        $home_adverts->usingStatus=$request->usingStatus;
        $home_adverts->save();
        return Response::json([
            'result' => 'Home advert updated'
        ]);
    }
}
