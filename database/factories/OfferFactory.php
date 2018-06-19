<?php

use Faker\Generator as Faker;
use bheller\ImagesGenerator\ImagesGeneratorProvider;

$factory->define(App\Offer::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'numbers' => 10,
        'description' => $faker->text,
        'owner'=>1 ,// secret,
        'category'=>$faker->numberBetween(1,5),
        'escort'=>$faker->numberBetween(1,3),
        'escort_conditions'=> $faker->text,
        'start_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'exp_date'=>'2019-02-03',
        'start_time'=>'08:00:00',
        'end_time'=>'22:00:00',
        'price'=>$faker->numberBetween(15000,60000),
        'picture_url'=>'https://akm-img-a-in.tosshub.com/indiatoday/images/story/201507/fake-647-x--404_070315103909.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxvhXh4U2anS2XFg6tTb-OYZiWfR5fZ9ggbMphqmQBlfRZ6NeN',
    ];
});
