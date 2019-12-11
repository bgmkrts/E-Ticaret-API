<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index(){
        $addresses=AddressModel::with('City','District','Neighborhood','Adverts.Address','Adverts.AdvertType','Adverts.User')->get();
        return Response::json([
            'data'=>$addresses
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'cities_id'=>'required',
            'districts_id'=>'required',
            'neighborhoods_id'=>'required',
            'latitude'=>'',
            'longitude'=>'',
            'adverts_id'=>'required',
            'fullAddress'=>'required',
            'users_id'=>'',

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

        $addresses=new AddressModel();
        $addresses->cities_id=$request->cities_id;
        $addresses->users_id=$request->users_id;
        $addresses->districts_id=$request->districts_id;
        $addresses->neighborhoods_id=$request->neighborhoods_id;
        $addresses->latitude=$request->latitude;
        $addresses->longitude=$request->longitude;
        $addresses->adverts_id=$request->adverts_id;
        $addresses->fullAddress=$request->fullAddress;
        $addresses->save();
        return Response::json([
            'message'=>'Address created'
        ]);

    }
}
