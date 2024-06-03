<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Http\Requests\Client\ClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;


class ClientController extends Controller
{
    
    public function index()
    {
        $clients=Client::all()->sortByDesc("created_at");

        if(is_null($clients->first())){

           
            $response=[
                "status"=>200,
                "message"=>"No client found"     
            ];
        }
        else{

            
            $response=[
                "status"=>200,
                "message"=>"Clients are retrieved successfully",
                "clients"=>ClientResource::collection($clients)
            ];    
        }

        
            return  response()->json($response,200);
    }

    
   
 
    public function store(ClientRequest $request)
    {
       
       $client=Client::create($request->all());

       $response=[
        "status"=>201,
        "message"=>"Client is created succssfully",
        "data"=>new ClientResource($client)
       ];

       return response()->json($response,201);
    }

  
    public function show(Client $client)
    {
        $response=[
            "status"=>200,
            "messgae"=>"client retrived successfully",
            "data"=>new ClientResource($client)
        ];

        return response()->json($response,200);
    }

   
  
    public function update(UpdateClientRequest $request , Client $client)
    {
       
        $client->update($request->all());

        $response=[
            "status"=>200,
            "message"=>"Client is updated succssfully",
            "data"=>new ClientResource($client)
        ];

       return response()->json($response,200);
    }

    
    public function destroy(Client $client)
    {
        $client->delete();
        $response=[
            'status' =>200,
            'message' => 'client is deleted successfully.'
        ];
        return response()->json($response,200);
    }
}
