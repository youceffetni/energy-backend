<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            "nom"=>fake()->name(),
            "tel1"=>fake()->e164PhoneNumber(),
            "tel2"=>fake()->e164PhoneNumber(),
            "email"=>fake()->email(),
            "adresse"=>fake()->streetAddress(),  
            "NIS"=>fake()->numberBetween(10000,10000000),  
            "NIF"=>fake()->numberBetween(20000,10000000),  
            "NRC"=>fake()->numberBetween(20000,10000000),  
            "RIB"=>fake()->numberBetween(10000,10000000),  
            "NAI"=>fake()->numberBetween(30000,10000000),  
            "activite"=>fake()->company()  
        ];
    }
}
