<?php

namespace App\Http\Requests\Article;
use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateArticleRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {   

       
        return [
            "ref"=>["required","max:255",Rule::unique("articles")->ignore($this->article->ref,"ref")],
            "nom"=>"required|max:255",
            "prix"=>"required|numeric|min:1",
            "unite"=>"required|alpha|max:255",
            "quantite_stock"=>"required|numeric|min:0",
            "quantite_min_stock"=>"required|numeric|min:0",
            
        ];

    }
    public function messages(){

        return [
            "ref.unique"=>"Cette référence c'est déjà existe dans vos articles."
        ];
    }
}
