<?php

namespace App\Http\Controllers;

use App\Models\AdvertModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
{
    public function index()
    {
        $adverts = AdvertModel::all();
        return Response::json([
            'data' => $adverts
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'advertSubject' => 'required',
            'isItSold' => 'required'
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
        $adverts->advertSubject = $request->advertSubject;
        $adverts->isItSold = $request->isItSold;
        $adverts->save();
        return Response::json([
            'message' => 'Adverts created'
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'advertSubject' => 'required',
            'isItSold' => 'required'
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
        $adverts->advertSubject = $request->advertSubject;
        $adverts->isItSold = $request->isItSold;
        $adverts->save();
        return Response::json([
            'result' => 'Adverts updated'
        ]);
    }
}
