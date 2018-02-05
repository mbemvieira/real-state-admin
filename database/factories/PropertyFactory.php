<?php

use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    $brFaker = Factory::create('pt_BR');
    return [
        'title' => $brFaker->lexify('Imóvel ??????'),
        'code' => $brFaker->numerify('###############'),
        'type' => $brFaker->randomElement(['a', 'c']),

        'address_cep' => $brFaker->numerify('#####-###'),
        'address_street' => $brFaker->streetName,
        'address_neighbour' => 'Bairro',
        'address_number' => $brFaker->buildingNumber,
        'address_complements' => $brFaker->secondaryAddress,
        'address_city' => $brFaker->city,
        'address_state' => $brFaker->state,

        'price' => $brFaker->randomFloat(2, 0, 1000000),
        'area' => $brFaker->randomFloat(2, 0, 1000000),
        'number_bedrooms' => $brFaker->numberBetween(1, 3),
        'number_suite' => $brFaker->numberBetween(0, 3),
        'number_bathrooms' => $brFaker->numberBetween(1, 3),
        'number_rooms' => $brFaker->numberBetween(1, 3),
        'number_parking_places' => $brFaker->numberBetween(0, 2),

        'description' => $brFaker->sentence(15, $variableNbWords = true),
        'image' => '',
    ];
});
