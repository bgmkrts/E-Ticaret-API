<?php

namespace App\Http\Controllers;

use App\Models\HousingTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class HousingTypeController extends Controller
{
    public function index(){
        $housing_types=HousingTypeModel::all();
        return Response::json([
            'data'=>$housing_types
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required'
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
        $housing_types=new HousingTypeModel();
        $housing_types->name=$request->name;
        $housing_types->save();
        return Response::json([
            'message'=>'Housing type created'
        ]);
    }
}
