<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
		'slug' => Str::of($faker->word)->slug('-'),
		'description' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true)
    ];
});
