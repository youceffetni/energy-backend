<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserReq extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {

       
         if($this->method()=="PUT")
                return [
                    "name"=>"required|unique:users,name,".$this->user->id,
                    "email"=>"required|email|unique:users,email,".$this->user->id,
                    "password"=>"confirmed",
                ];  


        return [
            "name"=>"required|string|unique:users",
            "email"=>"required|email|unique:users",
            "password"=>"required|confirmed",
        ]; 
    }

    public function messages (){


        return [
            'password.confirmed'=>"Mots de passes pas identiques.",
            'email.unique'=>"Cet email existe déjà.",
            "email.email"=>"Taper un email valide.",
            "name.unique"=>"Ce nom d'utilisateur existe déjà."
        ];
    }
}
