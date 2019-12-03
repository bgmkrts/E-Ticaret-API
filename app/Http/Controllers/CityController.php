<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index(){
        $cities=CityModel::all();
        return Response::json([
            'data'=>$cities
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
             'cityName'=>'required',
             'cityPlates'=>'required'
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
        $cities=new CityModel();
        $cities->cityName=$request->cityName;
        $cities->cityPlates=$request->cityPlates;
        $cities->save();
        return Response::json([
            'message'=>'cities created'
        ]);

    }


}
