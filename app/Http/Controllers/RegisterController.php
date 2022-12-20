<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $status = User::create($data);
        if($status){
            return response()->json('Account Created Successfully',201);
        }
        return response()->json('Account Create Fail',404);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $token = $user->createToken('user api token')->accessToken;
            return response()->json(['success'=>true,'message'=>'Successfully login','token'=>$token],200);
        }
        return response()->json(['success'=>false,'message'=>'Login fail!'],404);
    }

    public function user()  
    {
        $data = Auth()->guard('api')->user();
        return response()->json(['success'=>true,'data'=>$data],200);
    }
}
