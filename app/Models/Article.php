<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    protected $table="articles";
    protected $primaryKey = 'ref';
    protected $keyType = "string";
    public $incrementing = false;
    
    protected $fillable=[
        'ref',
        "nom",
        "description",
        "unite",
        "quantite_stock",
        "quantite_min_stock",
        "prix"

    ];

    public function ventes(){

        return $this->belongsToMany(Vente::class);
    }
}
