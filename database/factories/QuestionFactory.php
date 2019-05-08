<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Question;
use App\Model\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
   
    $title = $faker->sentence;

    return [
        'title' => $faker->sentence(),
        'slug' => str_slug($title),
        'body' => $faker->text,
        'category_id' => function(){
         	return Category::all()->random();
         },
         'user_id' => function() {
         	return User::all()->random();
         }
    ];
});
