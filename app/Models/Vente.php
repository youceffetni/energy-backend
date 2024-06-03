<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Traits\MakeNumero;

class Vente extends Model
{
    use HasFactory,MakeNumero;

    
    protected $primaryKey="numero";
    protected $keyType = "string";
    public $incrementing = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function articles(){

        return $this->belongsToMany(Article::class)->withPivot('quantity', 'prix_vente');
        
    }

    public function factures(){

        return $this->hasMany(Facture::class);
        
    }


    
    
   
}
