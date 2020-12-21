<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use Faker\Generator as Faker;


$factory->define(Task::class, function (Faker $faker) {
    return [
        'task_user_id' => rand(1, 17),
        'task_project_id' => 1,
        'task_title' => $faker->sentence,
        'task_deadline' => $faker->date($format = 'Y-m-d H:i:s', $max = '+50 years'),
        'task_status' => 'active',
        'task_finish' => rand(0, 1),
    ];
});
