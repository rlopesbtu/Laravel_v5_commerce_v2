<?php
/**
 * Created by PhpStorm.
 * User: Ricardo_2
 * Date: 24/08/2015
 * Time: 20:57
 */

$factory->define('CodeCommerce\User', function ($faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10)
    ];
});

$factory->define('CodeCommerce\Category', function ($faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});