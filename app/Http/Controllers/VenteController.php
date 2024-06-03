<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Desgination;
use App\Http\Resources\VenteResource;



class VenteController extends Controller
{
    

    public function index(){
        $ventes=Vente::all();
        $response=[
            "status"=>200,
            "message"=>"The sales are retreived successfully",
            "ventes"=>  VenteResource::collection($ventes)
        ];
        return response()->json($response,200);
    }
    
    public function store(Request $request){



      $vente=new Vente();
        $vente->numero=$request["date"];
        $vente->date=$request['date'];
        $vente->month_year=$request['date'];
        $vente->remise=$request['remise'];
        $vente->mode_paiement=$request['mode_paiement'];
        $vente->montant_total_a_payer=$request['montant_total_a_payer'];
        $vente->notes=$request['notes'];
        $vente->user_id=$request->user()->id;
        $vente->client_id=$request->client_id;
        $vente->save();   
            
    
        for($i=0;$i<count($request->designations);$i++){

            $ref=$request->designations[$i]["ref"];
            $quantity=$request->designations[$i]["Qt"];
            $prix_vente=$request->designations[$i]["prix"];

            $vente->articles()->attach($ref,[
                "quantity"=>$quantity,
                "prix_vente"=>$prix_vente,
                
            ]);

        } 
          
        
     return response()->json([
            "status"=>201,
            "message"=>"The sale is created successfully",
            "vente"=>new VenteResource($vente)
        ],201);  
    }


    public function show(Vente $vente){

        return response()->json([
            "status"=>200,
            "message"=> "The sale retrieved successfully",
            "vente"=>new VenteResource($vente)
        ],200); 
    }

    public function update(Request $request,Vente $vente){

        $vente->date=$request['date'];
        $vente->remise=$request['remise'];
        $vente->mode_paiement=$request['mode_paiement'];
        $vente->montant_total_a_payer=$request['montant_total_a_payer'];
        $vente->notes=$request['notes'];
        $vente->user_id=$request->user()->id;
        $vente->client_id=$request->client_id;
        $vente->save(); 

      $vente->articles()->detach();

      for($i=0;$i<count($request->designations);$i++){
            $ref=$request->designations[$i]["ref"];
            $quantity=$request->designations[$i]["Qt"];
            $prix_vente=$request->designations[$i]["prix"];
            $vente->articles()->attach($ref,[
                "quantity"=>$quantity,
                "prix_vente"=>$prix_vente,
                
            ]);

      }

      $response=[
        "status"=>200,
        "message"=>"Vente is updated successfully",
        "vente"=>new VenteResource($vente)
      ];

      return response()->json($response,200);

    }


    public function destroy(Vente $vente){

        $vente->delete();
        $response=[
            'status' =>204,
            'message' => 'Vente is deleted successfully.'
        ];
        return response()->json($response,204);
    }
}



