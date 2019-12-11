<?php

namespace App\Http\Controllers;

use App\Models\DistrictModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    public function index(){
        $districts=DistrictModel::all();
        return Response::json([
            'data'=>$districts
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
        $districts=new DistrictModel();
        $districts->name=$request->name;
        $districts->save();
        return Response::json([
            'message'=>'District created'
        ]);
    }
}
