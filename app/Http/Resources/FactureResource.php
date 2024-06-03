<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FactureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
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
            "numero_facture"=>format_numero_id($this->numero),
            "date_facturation"=>$this->date_facturation,
            "etat"=>$this->etat,
            "type"=>$this->type,
            "montant"=>$this->montant,
            "montant_remise"=>$this->montant_remise,
            "tva"=>$this->tva,
            "ttc"=>$this->ttc,
            "timbre"=>$this->timbre,
            "net_a_payer"=>$this->net_a_payer,
            "client"=>$this->client,
            "vente"=>$this->vente,
            "user"=>$this->user,
            "designations"=>$designations
        ];
    }
}
