<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateClientRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        
        return [
            "nom"=>"required|unique:clients,nom,".$this->client->id,
            "email"=>"email|nullable",
            "tel1"=>"size:10|nullable",
            "tel2"=>"size:10|nullable",
            "adresse"=>"nullable",
            "web_site"=>"nullable",
            "NRC"=>"nullable",
            "NIF"=>"nullable",
            "NIS"=>"nullable",
            "RIB"=>"nullable",
            "NAI"=>"nullable",
            "actvite"=>"nullable",
            
            

        ];
    }

    public function messages(){

        return [
            "nom.unique"=>"Le nom client c'est déjà existe dans votre liste clients."
        ];
    }
}
