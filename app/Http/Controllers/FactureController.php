<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Http\Resources\FactureResource;
class FactureController extends Controller
{
    

    function index (){
        $factures=Facture::where("etat",1)->orderBy("date_facturation","DESC")->get();
        if($factures->count()==0)
            return response()->json("",204);

        return response()->json([
            "status"=>200,
            "factures"=>FactureResource::collection($factures)
        ],200);
    }

    function show(Facture $facture){

        $response=[
            "status"=>200,
            "message"=>"Facture retrieved successfully",
            "facture"=>new FactureResource($facture)
        ];
        return response()->json($response,200);

    }

    function post (Request $request){



        $facture=new Facture();

        $facture->numero=$request["date_facturation"];

        $facture->month_year=$request["date_facturation"];

        $facture->date_facturation=$request["date_facturation"];

        $facture->etat=$request["etat"];
        $facture->type=$request["type"];
        $facture->montant=$request["montant"];
        $facture->montant_remise=$request["montant_remise"];
        $facture->tva=$request["tva"];
        $facture->ttc=$request["ttc"];
        $facture->timbre=$request["timbre"];
        $facture->net_a_payer=$request["net_a_payer"];
        $facture->user_id=$request->user()->id;
        $facture->client_id=$request["client_id"];
        $facture->vente_numero=$request['vente_numero'];
        
       $facture->save();
       
    
         for($i=0;$i<count($request->designations);$i++){

            $ref=$request->designations[$i]["ref"];
            $quantity=$request->designations[$i]["Qt"];
            $prix_vente=$request->designations[$i]["prix"];
            $facture->articles()->attach($ref,[
                "quantity"=>$quantity,
                "prix_vente"=>$prix_vente,
                
            ]);

        } 

      return response()->json([
            "status"=>201,
            "message"=>"Facture created successfully",
            "facture"=>new FactureResource($facture)
        ]); 
          
    }

    function publish(Facture $facture){
        $factures=Facture::where("vente_numero",$facture->vente_numero)
                         ->where("type",$facture->type)
                         ->update(["etat"=>0]);
        $facture->etat=1;
        $facture->save(); 

        return response()->json("",204);

    }
    function destroy (Facture $facture){

        $facture->delete();
        return response()->json("",204);

    }

}

