<?php

namespace App\Http\Controllers;


//Requests 
use App\Http\Requests\Article\ArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use Illuminate\Http\Request;

//Models

use App\Models\Article;

//Resources 

use App\Http\Resources\ArticleResource;


//Storages
use Illuminate\Support\Facades\Storage;
 
class ArticleController extends Controller
{
    
    public function index()
    {
        $articles=Article::all()->sortByDesc("created_at");
        
        if(is_null($articles->first()))
            $response=[
                "status"=>204,
                "message"=>"No article Found",
                
            ];
        
        else

            $response=[
                "status"=>200,
                "message"=>"Articles are retrieved successfully.",
                "articles"=> ArticleResource::collection($articles)
            ];
        return response()->json($response,200);
    }

  
    public function store(ArticleRequest $request)
    {
       

        /* if($request->hasFile('image')){
            $image = $request->image->store('public/articles/images');

        }
        else
            $image=null; */

            /* [
                "ref"=>$data["ref"],
                "nom"=>$data["nom"],
                "description"=>$data["description"],
                "unite"=>$data["unite"],
                "famille"=>$data["famille"],
                "quantite_stock"=>$data["quantite_stock"],
                "quantite_min_stock"=>$data["quantite_min_stock"],
                "image"=>$image
            ] */
              
        $article=Article::create($request->all());

        $response = [
            'status' => 201,
            'message' => 'Article is added successfully.',
            'data' => new ArticleResource($article),
        ];

        return response()->json($response,201); 
    }

 
    public function show(Article $article)
    {

       
        $response = [
            'status' => 200,
            'message' => 'Article is retrieved successfully.',
            'data' => new ArticleResource($article)
        ];

        return response()->json($response,200);

       
    }

   
    public function update(UpdateArticleRequest $request, Article $article)
    {
     

       /*  if($request->hasFile("image")){
            Storage::delete($article->image);
            $image=$request->image->store("/public/images/articles");
        }else{
            $image=$article->image;
        } */

        $article->update($request->all());
        $response=[
            "status"=>200,
            "message"=>"Article updated successfully",
            "data"=>new ArticleResource($article)
        ];
        return response()->json($response,200);
        
    }

    public function destroy(Article $article)
    {
/* 
        if(!is_null($article->image))
            Storage::delete($article->image);
             */
        $article->delete();
        $response=[
            'status' =>200,
            'message' => 'Article is deleted successfully.'
        ];
        return response()->json($response,200);
        
    }
}
