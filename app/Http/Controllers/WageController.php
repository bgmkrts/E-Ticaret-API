<?php

namespace App\Http\Controllers;

use App\Models\WageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class WageController extends Controller
{
    public function index(){
        $wages=WageModel::all();
        return Response::json([
            'data'=>$wages
        ]);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rentHome'=>'',
            'furniturePrice'=>''
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
        $wages=new WageModel();
        $wages->rentHome=$request->rent_Home;
        $wages->furniturePrice=$request->furniturePrice;
        $wages->save();
        return Response::json([
            'message'=>'wage created'
        ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rentHome'=>'',
            'furniturePrice'=>''
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
        $wages = WageModel::find($request->id);
        $wages->id=$request->id;
        $wages->rentHome=$request->rentHome;
        $wages->furniturePrice=$request->furniturePrice;
        $wages->save();
        return Response::json([
            'result' => 'Wages updated'
        ]);
    }
}
