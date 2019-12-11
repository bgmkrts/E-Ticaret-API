<?php

namespace App\Http\Controllers;
use App\Models\FurnitureAdvertModel;
use App\Models\HomeAdvertModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class FurnitureAdvertController extends Controller
{
    public function index(){
        $furniture_adverts=FurnitureAdvertModel::with('Adverts','Adverts.User','Adverts.Address','Adverts.AdvertType')->get();
        return Response::json([
            'data'=>$furniture_adverts
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'product'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'status'=>'required',
            'isItGuarantee'=>'required',
            'adverts_id'=>'required'
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
        $furniture_adverts=new FurnitureAdvertModel();
        $furniture_adverts->product=$request->product;
        $furniture_adverts->brand=$request->brand;
        $furniture_adverts->model=$request->model;
        $furniture_adverts->status=$request->status;
        $furniture_adverts->adverts_id=$request->adverts_id;
        $furniture_adverts->isItGuarantee=$request->isItGuarantee;
        $furniture_adverts->save();
        return Response::json([
            'message'=>'furniture advert created'
        ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'status'=>'required',
            'isItGuarantee'=>'required',
            'adverts_id'=>'required'
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
        $furniture_adverts->product=$request->product;
        $furniture_adverts->brand=$request->brand;
        $furniture_adverts->model=$request->model;
        $furniture_adverts->status=$request->status;
        $furniture_adverts->adverts_id=$request->adverts_id;
        $furniture_adverts->isItGuarantee=$request->isItGuarantee;
        $furniture_adverts->save();
        return Response::json([
            'result' => 'Furniture advert updated'
        ]);
    }
    public function Search(Request $request)
    {
        $filters = [
            'product' => $request->product,
            'model'    => $request->model,
            'brand'    => $request->brand,
            'status'    => $request->status,
            'isItGuarantee' =>$request->isItGuarantee,
        ];

        $furniture_adverts = FurnitureAdvertModel::where(function ($query) use ($filters) {
            if ($filters['product']) {
                $query->where('product', '=', $filters['product']);
            }
            if ($filters['model']) {
                $query->where('model', '=', $filters['model']);
            }
            if ($filters['brand']) {
                $query->where('brand', '=', $filters['brand']);
            }
            if ($filters['status']) {
                $query->where('status', '=', $filters['status']);
            }

            if ($filters['isItGuarantee']) {
                $query->where('isItGuarantee', '=', $filters['isItGuarantee']);
            }

        })->get();

        return $furniture_adverts;
    }
}
