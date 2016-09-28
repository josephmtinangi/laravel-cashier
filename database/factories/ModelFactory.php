<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function(Faker\Generator $faker) {
	$title = $faker->realText(20);
	$slug = str_slug($title, '-');

	$pics = ['abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'];

	return [
		'user_id' => function() { return factory(App\User::class)->create()->id; },
		'title' => $title,
		'slug' => $slug,
		'image' => $faker->imageUrl(1200, 600, $pics[rand(0, 12)]),
		'content' => $faker->paragraphs(10, true),
		'premium' => rand(0, 1)
	];
});
