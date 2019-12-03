<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        $users=UserModel::with('City')->get();
        return Response::json([
            'data'=>$users
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'cities_id'=>'required',
            'profilePhoto'=>'required'
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
        $users=new UserModel();
        $users->name=$request->name;
        $users->surname=$request->surname;
        $users->email=$request->email;
        $users->password = Hash::make($request->password);
        $users->cities_id=$request->cities_id;
        $users->profilePhoto=$request->profilePhoto;
        $users->save();
        return Response::json([
            "message"=>"başarılı kayıt",
            'result'=>'Users created',
            "token"=> $users->createToken("token")->accessToken

        ]);
    }

}
