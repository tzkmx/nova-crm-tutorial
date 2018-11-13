<?php

use App\Location;
use Faker\Generator as Faker;

$factory->define(App\Lead::class, function (Faker $faker) {
    $location = Location::inRandomOrder()->first();
    // 1 in 20 chance of being a winner
    $winDate = null;
    $winner = rand(1,20) == 1;
    if ( $winner ) {
        $winDate = $faker->dateTimeBetween('-3 weeks', 'now');
    }
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'location_id' => $location->id,
        'is_winner' => $winDate,
    ];
});
