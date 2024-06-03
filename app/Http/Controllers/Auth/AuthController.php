<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
class AuthController extends Controller
{

    


    public function login(Request $request){
           

            $credentials=$request->validate([
                "name"=>"required",
                "password"=>"required"
            ]);

            
            if(!Auth::attempt($credentials)){

              return response()->json([
                "status"=>422,
                "message"=>"Les informations d'identification sont incorrectes"
              ],422);
            }

        $user=$request->user();
        $token=$user->createToken("Personel Access Token");

             
        return response()->json([
                "status"=>200,
                "message"=>"The credentials are corrects",
                "user"=>$user,
                "token"=>$token->plainTextToken
                
            ],200); 
                

            
    }

    public function logout (Request $request){

         $user=$request->user();
         $user->tokens()->delete(); 
       
     return response()->json('',204);  
    

    }
}
