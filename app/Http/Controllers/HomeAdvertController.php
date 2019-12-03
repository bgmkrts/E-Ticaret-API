<?php

namespace App\Http\Controllers;
use App\Models\HomeAdvertModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class HomeAdvertController extends Controller
{
    public function index(){

        $home_adverts=HomeAdvertModel::with('User','Cities','Statu','Wage','Advert')->get();
        return Response::json([
            'result'=>'ok',
            'data'=>$home_adverts,
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'cities_id'=>'',
            'status_id'=>'required|int',
            'explanation'=>'required',
            'wages_id'=>'required|int',
            'users_id'=>'',
            'adverts_id'=>'required|int'
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
        $home_adverts=new HomeAdvertModel();
        $home_adverts->users_id=$user->id;
        $home_adverts->cities_id=$request->cities_id;
        $home_adverts->status_id=$request->status_id;
        $home_adverts->explanation=$request->explanation;
        $home_adverts->wages_id=$request->wages_id;
        $home_adverts->adverts_id=$request->adverts_id;
        $home_adverts->save();
        return Response::json([
            'message'=>'Home advert created',
            'result'=>'ok'
        ]);

    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cities_id'=>'',
            'status_id'=>'required|int',
            'explanation'=>'required',
            'wages_id'=>'required|int',
            'users_id'=>'',
            'adverts_id'=>'required|int'
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
        $home_adverts = homeAdvertController::find($request->id);
        $home_adverts->id=$request->id;
        $home_adverts->cities_id=$request->cities_id;
        $home_adverts->furniture_name=$request->explanation;
        $home_adverts->adverts_id=$request->adverts_id;
        $home_adverts->status_id=$request->status_id;
        $home_adverts->wages_id=$request->wages_id;
        $home_adverts->save();
        return Response::json([
            'result' => 'Home advert updated'
        ]);
    }
}
