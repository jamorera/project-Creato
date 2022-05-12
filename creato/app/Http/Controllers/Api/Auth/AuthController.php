<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);
        $datos = request()->all();
        if ($request->password) {
                $datos['password']=Hash::make($request['password']);
                User::create($datos);
            } 
        return response()->json([
            "status" => 1,
            "msg" =>"¡Registro de usuario exitoso!",
        ],200);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where("email","=",$request->email)->first();
        if(isset($user->id)){
            if (Hash::check($request->password,$user->password)) {
                # Creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status" => 1,
                    "msg" =>"Usuario logueado exitosamente",
                    "access_token" =>$token,
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "msg" =>"La password es incorrecta",
                ],404);
            }            
        }else{
            return response()->json([
                "status" => 0,
                "msg" =>"Usuario no registrado",
            ],404);
        }
       
    }

    public function userProfile(){
        return response()->json([
            "status" => 1,
            "msg" =>"Info usuario",
            "data" => auth()->user()
        ]);
    }

    public function logout() {
        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "msg" =>"Cierre de session"
        ]);
    }
}
