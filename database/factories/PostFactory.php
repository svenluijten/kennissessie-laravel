<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {

    return [
        'title'   => $faker->unique()->text('50'),
        'slug'    => function (array $post) {
            return str_slug($post['title']);
        },
        'body'    => $faker->realText(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
