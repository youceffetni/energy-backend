<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MakeNumero;

class Facture extends Model
{
    use HasFactory,MakeNumero;
    protected $table="factures";
    protected $primaryKey = 'numero';
    protected $keyType = "string";
    public $incrementing = false;




    

    public function articles(){

        return $this->belongsToMany(Article::class)->withPivot('quantity', 'prix_vente');
        
    }


    public function client(){

        return $this->belongsTo(Client::class);
    }
    public function vente(){

        return $this->belongsTo(Vente::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }
}
