<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){        
        DB::beginTransaction();
        try {
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required',
                'email'=>'required|email|unique:users',
                'rol'=>'required',
                'password'=>'required|confirmed',
            ]);
            $datos = request()->all();
            if ($request->password) {
                $datos['password']=Hash::make($request['password']);
                $data = User::create($datos);
            } 
            $rol_id = Rol::where('nombre',$request->rol)->first()->id;
            if ($rol_id){
                $data->rols()->attach($rol_id);
            }
            DB::commit();
            return response()->json([
                "status" => 1,
                "msg" =>"¡Registro de usuario exitoso!",
            ],200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
            DB::rollback();
        }
        
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
            "data" => auth()->user()->load("rols"),
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
