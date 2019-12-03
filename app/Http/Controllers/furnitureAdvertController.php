<?php

namespace App\Http\Controllers;
use App\Models\FurnitureAdvertModel;
use App\Models\HomeAdvertModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class furnitureAdvertController extends Controller
{
    public function index(){
        $furniture_adverts=FurnitureAdvertModel::with('Cities','User','Advert','Statu','Wage')->get();
        return Response::json([
            'data'=>$furniture_adverts
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'cities_id'=>'required',
            'furniture_name'=>'required',
            'adverts_id'=>'required',
            'status_id'=>'required',
            'wages_id'=>'required',
            'users_id'=>''
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
        $user = auth('api')->user();
        $furniture_adverts=new FurnitureAdvertModel();
        $furniture_adverts->users_id=$user->id;
        $furniture_adverts->cities_id=$request->cities_id;
        $furniture_adverts->furniture_name=$request->furniture_name;
        $furniture_adverts->adverts_id=$request->adverts_id;
        $furniture_adverts->status_id=$request->status_id;
        $furniture_adverts->wages_id=$request->wages_id;
        $furniture_adverts->save();
        return Response::json([
            'message'=>'furniture advert created'
        ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cities_id'=>'required',
            'furniture_name'=>'required',
            'adverts_id'=>'required',
            'status_id'=>'required',
            'wages_id'=>'required',
            'users_id'=>''
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
        $furniture_adverts = FurnitureAdvertModel::find($request->id);
        $furniture_adverts->id=$request->id;
        $furniture_adverts->cities_id=$request->cities_id;
        $furniture_adverts->furniture_name=$request->furniture_name;
        $furniture_adverts->adverts_id=$request->adverts_id;
        $furniture_adverts->status_id=$request->status_id;
        $furniture_adverts->wages_id=$request->wages_id;
        $furniture_adverts->save();
        return Response::json([
            'result' => 'Furniture advert updated'
        ]);
    }
}
