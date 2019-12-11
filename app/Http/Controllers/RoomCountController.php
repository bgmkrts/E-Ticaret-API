<?php

namespace App\Http\Controllers;

use App\Models\RoomCountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RoomCountController extends Controller
{
    public function index(){
        $room_counts=RoomCountModel::all();
        return Response::json([
            'data'=>$room_counts
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
        $room_counts=new RoomCountModel();
        $room_counts->name=$request->name;
        $room_counts->save();
        return Response::json([
            'message'=>'Room counts created'
        ]);

    }
}
