<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Admin;
$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' =>'Administrator',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt(123456789), // password
        'remember_token' => Str::random(10),
        'status'=>1,
    ];
});
