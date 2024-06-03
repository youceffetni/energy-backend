<?php

namespace App\Http\Resources;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "ref"=>$this->ref,
            "nom"=>$this->nom,
            "prix"=>$this->prix,
            "quantite_stock"=>$this->quantite_stock,
            "quantite_min_stock"=>$this->quantite_min_stock,
            "description"=>$this->description,
            "unite"=>$this->unite,
            "famille"=>$this->famille,
            "created_at"=>$this->created_at->format('d/m/Y'),
            "updated_at"=>$this->updated_at->format('d/m/Y')
        ];
    }

   
}
