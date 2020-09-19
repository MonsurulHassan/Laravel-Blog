<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
		'slug' => Str::of($faker->word)->slug('-'),
		'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true)
    ];
});
