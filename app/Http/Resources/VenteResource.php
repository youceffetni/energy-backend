<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ClientResource;

class VenteResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {

        $designations=[];
        foreach ($this->articles as $article) {
            $designations[]=[
                "ref"=>$article->ref,
                "nom"=>$article->nom,
                "unite"=>$article->unite,
                "prix"=>$article->pivot->prix_vente,
                "Qt"=>$article->pivot->quantity,
                "montant"=>$article->pivot->quantity*$article->pivot->prix_vente,
            ];
        }  
       
        return [
            "numero"=>$this->numero,
            "numero_vente"=>format_numero_id($this->numero),
            "date"=>$this->date,
            "mode_paiement"=>$this->mode_paiement,
            "remise"=>$this->remise,
            "montant_total_a_payer"=>$this->montant_total_a_payer,
            "user"=>$this->user,   
            "client"=>$this->client,
            "notes"=>$this->notes,
            "designations"=>$designations,
            "factures"=>FactureResource::collection($this->factures),
        ];
    }
}
