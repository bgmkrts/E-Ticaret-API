<?php

namespace App\Http\Controllers;

use App\Models\WarmingTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class WarmingTypeController extends Controller
{
    public function index(){
        $warming_types=WarmingTypeModel::all();
        return Response::json([
            'data'=>$warming_types
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',

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
        $warming_types=new WarmingTypeModel();
        $warming_types->name=$request->name;
        $warming_types->save();
        return Response::json([
            'message'=>'Warming type created'
        ]);

    }
}
