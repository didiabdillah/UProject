<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_id' => hexdec(uniqid()) . strtotime(now()),
        'user_name' => $faker->name,
        'user_provider_id' => NULL,
        'user_email' => $faker->unique()->email,
        'user_email_verified_at' => now(),
        'user_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'user_role' => 'user',
        'user_image' => 'default.jpg',
    ];
});
