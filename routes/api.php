<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsSuperAdmin;



Route::controller(AuthController::class)->group(function(){

    route::post("/login","login");
    
});


Route::get("/testapi",function(){

    return "Api successfully";

});



Route::middleware("auth:sanctum")->group(function(){ 
    
    
    Route::controller(AuthController::class)->group(function(){
        
        Route::get("/logout","logout");
        
    });
   
    
    
    Route::post("/profile",[UserController::class,"profile"]);


    /********************** USERS ROUTES **************************/
    Route::controller(UserController::class)->middleware(IsSuperAdmin::class)->group(function(){
        Route::get("/users","index");
        Route::post("/register","register");
        Route::put("/users/edit/{user}","update");
        Route::delete("/users/delete/{user}","delete");
        
    });
    /************************** ARTICLE ROUTES ***************************/
    Route::controller(ArticleController::class)->group(function(){
        Route::get("/articles","index"); 
        Route::get("/articles/{article}","show");
        Route::post("/articles","store");
        Route::put("/articles/{article}","update");
        Route::delete("/articles/{article}","destroy");
    });
    
    /***************************** CLIENT ROUTES *********************/
    Route::controller(ClientController::class)->group(function(){
        Route::get("/clients","index");
        Route::get("/clients/{client}","show");
        Route::post("/clients","store");
        Route::put("/clients/{client}","update");
        Route::delete("/clients/{client}","destroy");
    });
    
    
    
    /*******************FACTURE ROUTES********************/

    Route::controller(FactureController::class)->group(function(){
    
        Route::get("/factures","index");
        Route::get("/factures/{facture}","show");
        Route::delete("/factures/{facture}","destroy");
        Route::post("/factures","post");
        Route::put("/factures/{facture}","publish");

    });

    /***********************  VENTES ROUTES ****************/
    Route::controller(VenteController::class)->group(function(){
  
        Route::get("/ventes","index");
        Route::get("/ventes/{vente}","show");
        Route::post("/ventes","store");
        Route::put("/ventes/{vente}","update");
        Route::delete("/ventes/{vente}","destroy");
       
    });
    
});




