<?php

namespace App\Http\Controllers;

use App\Models\NeighborhoodModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class NeighborhoodController extends Controller
{
    public function index(){
        $neighborhoods=NeighborhoodModel::all();
        return Response::json([
            'data'=>$neighborhoods
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
        $neighborhoods=new NeighborhoodModel();
        $neighborhoods->name=$request->name;
        $neighborhoods->save();
        return Response::json([
            'message'=>'Neighborhood created'
        ]);
    }
}
