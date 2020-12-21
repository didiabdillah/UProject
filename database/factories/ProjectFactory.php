<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_user_id' => rand(1, 100),
        'project_uuid' => $faker->uuid,
        'project_title' => $faker->text($maxNbChars = 150),
        'project_description' => $faker->sentence,
        'project_image' => NULL,
        'project_status' => 'active',
        'project_finish' => rand(0, 1),
    ];
});
