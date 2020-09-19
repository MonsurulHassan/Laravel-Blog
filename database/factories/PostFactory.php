<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
	$fake_title = $faker->sentence($nbWords = 5, $variableNbWords = true);
    return [
        'user_id' => App\User::all()->random()->id,
		'category_id' => App\Category::all()->random()->id,
		'title' => $fake_title,
		'slug' => Str::of($fake_title)->slug('-'),
		'image' => $faker->imageUrl($width = 600, $height = 400),
		'description' => $faker->text($maxNbChars = 400),	
    ];
});
