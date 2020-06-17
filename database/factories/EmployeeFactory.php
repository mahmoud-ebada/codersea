<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName, 
        'last_name' => $faker->lastName, 
        'company_id' => function(){
            return \App\Company::find(rand(1,50))->id;
        }, 
        'email' => $faker->unique()->safeEmail, 
        'phone' => $faker->unique()->e164PhoneNumber
    ];
});