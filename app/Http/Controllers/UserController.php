<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserReq;
use App\Models\User;
use App\Http\Resources\UserResource;
class UserController extends Controller
{

    public function index(){

        $users=User::where("id","!=","1")->get();

        if(!count($users))
          return response()->json("",204);

        return response()->json([
            "status"=>200,
            "message"=>"Users are retrieved successfully",
            "users"=>UserResource::collection($users)
        ],200);

    }
    public function register(UserReq $request){

     



        $user=User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "role"=>$request->role,
                "password"=>$request->password
            ]);
        

        $response=[
            "status"=>201,
            "message"=>"User is created successfully",
            "user"=>$user,
        ];
        return response()->json($response,201); 
    }


    public function update(User $user,UserReq $request){
       
        $user->update([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "role"=>$request->role,
                
            ]);

           if(!is_null($request->password)){
               $user->password=$request->password;
               $user->save();
           }
        
       $response=[
            "status"=>200,
            "message"=>"User is updated successfully",
            "user"=>$user,
        ];
        return response()->json($response,200); 
    }

    public function profile(Request $request){

        $user=$request->user();

        $request->validate([
            "name"=>"unique:users,name,".$user->id,
            "password"=>"confirmed"
        ]);

        $user->name=$request->name;

        if(!is_null($request->password))
            $user->password=$request->password;

        $user->save();

        

    }

    public function delete(User $user,Request $request){
     
        
         $user->tokens()->delete(); 
        $user->delete();

        return response()->json("",204); 

        
    }


}
