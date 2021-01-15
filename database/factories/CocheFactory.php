<?php

use Faker\Generator as Faker;

$factory->define(App\Coche::class, function(Faker $faker) {
    return [
        'maker' => $faker->name,
        'model' => $faker->paragraph,
        'produced_on' => $faker->state
    ];
});
