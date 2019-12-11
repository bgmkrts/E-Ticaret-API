<?php

namespace App\Http\Controllers;

use App\Models\AdvertModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
{
    public function index()
    {

      $adverts=AdvertModel::with('User','AdvertType','Address','Picture')->get();
        return Response::json([
            'data' => $adverts
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'contents' => 'required',
            'users_id'=>'',
            'price'=>'required',
            'addresses_id'=>'required',
            'advertNo'=>'required',
            'advert_types_id'=>'required',
            'isActive'=>'required',

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

        $adverts = new AdvertModel();
        $adverts->title = $request->title;
        $adverts->contents = $request->contents;
        $adverts->users_id=$request->users_id;
        $adverts->price=$request->price;
        $adverts->addresses_id=$request->addresses_id;
        $adverts->advertNo=$request->advertNo;
        $adverts->advert_types_id=$request->advert_types_id;
        $adverts->isActive=$request->isActive;
        $adverts->save();
        return Response::json([
            'message' => 'Adverts created'
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'contents' => 'required',
            'users_id'=>'',
            'price'=>'required',
            'addresses_id'=>'required',
            'advertNo'=>'required',
            'advert_types_id'=>'required',
            'isActive'=>'required'
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

        $adverts = AdvertModel::find($request->id);
        $adverts ->id=$request->id;
        $adverts->title = $request->title;
        $adverts->contents = $request->contents;
        $adverts->users_id=$request->users_id;
        $adverts->price=$request->price;
        $adverts->addresses_id=$request->addresses_id;
        $adverts->advertNo=$request->advertNo;
        $adverts->advert_types_id=$request->advert_types_id;
        $adverts->isActive=$request->isActive;
        $adverts->save();
        return Response::json([
            'result' => 'Adverts updated'
        ]);
    }
}
