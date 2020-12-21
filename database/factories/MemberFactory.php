<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'member_user_id' => rand(1, 100),
        'member_project_id' => rand(1, 100),
        'member_role' => 'member',
        'member_status' => 'active',
    ];
});
