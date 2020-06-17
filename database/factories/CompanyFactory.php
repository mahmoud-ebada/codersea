<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company, 
        'email' => $faker->companyEmail,  
        'website' => $faker->domainName, 
        'address' => $faker->address
    ];
});
