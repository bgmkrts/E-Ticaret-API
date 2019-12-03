<?php

namespace App\Http\Controllers;
use App\Models\StatuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class StatuController extends Controller
{
    public function index(){
        $status=StatuModel::all();
        return Response::json([
            'data'=>$status
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'homeStatu'=>'required',
            'furnitureStatu'=>'required'
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
        $status=new StatuModel();
        $status->homeStatu=$request->homeStatu;
        $status->furnitureStatu=$request->furnitureStatu;
        $status->save();
        return Response::json([
            'message'=>'statu created'
        ]);





    }

}
