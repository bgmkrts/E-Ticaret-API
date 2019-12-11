<?php

namespace App\Http\Controllers;

use App\Models\FacadeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class FacadeController extends Controller
{
    public function index(){
        $facades=FacadeModel::all();
        return Response::json([
            'data'=>$facades
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
        $facades=new FacadeModel();
        $facades->name=$request->name;
        $facades->save();
        return Response::json([
            'message'=>'Facade created'
        ]);
    }
}
