<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    
    public function definition(): array
    {
        return [
          "ref"=> fake()->numerify('ref-####'),
          "nom"=>fake()->words(3,true),
          "prix"=>fake()->numberBetween(1000,50000),
          "unite"=>fake()->randomElement(["l","u","kg","kit"]),
          "quantite_stock"=>fake()->randomDigitNotNull(9),
          "quantite_min_stock"=>fake()->randomDigitNotNull(1),
        ];

    }
}
