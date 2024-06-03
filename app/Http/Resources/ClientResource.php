<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "nom"=>$this->nom,
            "email"=>$this->email,
            "tel1"=>$this->tel1,
            "tel2"=>$this->tel2,
            "adresse"=>$this->adresse,
            "web_site"=>$this->web_site,
            "NIF"=>$this->NIF,
            "NIS"=>$this->NIS,
            "NRC"=>$this->NRC,
            "RIB"=>$this->RIB,
            "activite"=>$this->activite,
            "NAI"=>$this->NAI,
            "created_at"=>$this->created_at->format("d/m/Y"),
            "updated_at"=>$this->updated_at->format("d/m/Y")
        ];
    }
}
