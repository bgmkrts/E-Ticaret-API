<?php

namespace App\Http\Controllers;

use App\Models\PictureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
    public function index(){
        $pictures=PictureModel::with('Adverts')->get();
        return Response::json([
            'data'=>$pictures
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'adverts_id'=>'required',
            'pictures'=>'required'
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
        $pictures=new PictureModel();
        $pictures->adverts_id=$request->adverts_id;
        $pictures->pictures=$request->pictures;

        if ($request->hasFile('pictures')) {
            $file = $request->file('pictures');
            $file->move(public_path() . '/images/pictures', $file->getClientOriginalName());
            $pictures->pictures = $file->getClientOriginalName();
        }

        $pictures->save();
        return Response::json([
            'message'=>'pictures created'
            ]);
    }
}
