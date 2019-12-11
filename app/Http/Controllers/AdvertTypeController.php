<?php

namespace App\Http\Controllers;

use App\Models\AdvertTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AdvertTypeController extends Controller
{
    public function index(){
        $advert_types=AdvertTypeModel::all();
        return Response::json([
            'data'=>$advert_types
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
        $advert_types=new AdvertTypeModel();
        $advert_types->name=$request->name;
        $advert_types->save();
        return Response::json([
            'message'=>'Advert type created'
        ]);
    }
}
