<?php

namespace App\Http\Controllers;

use App\Models\AdvertModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = UserModel::where("email", $email)->first();

        if (isset($user)) {
            if (Hash::check($password, $user->password)) {
                return Response::json([
                    "result" => "ok",
                    "user" => $user,
                    "token" => $user->createToken("token")->accessToken
                ]);
            } else {
                return Response::json([
                    "result" => "errors"
                ]);
            }
        } else {
            return Response::json([
                "result" => "error"
            ]);
        }
    }

    public function userShow()
    {
         $user = auth('api')->user();
         $adverts=UserModel::with('Advert.AdvertType','Advert.Address','Advert.Picture','Advert')->find($user->id);
        return \response()->json([
            "user" => $user,
            "adverts" => $adverts
        ]);
    }


}
