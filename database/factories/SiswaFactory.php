<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    
    return [
        'uuid' => $faker->uuid,
        'nama' => $faker->name,
        'nis' =>  $faker->unique(true)->numberBetween(10000, 500000),
        'jk' => $faker->randomElement(['L','P']),
        'agama' => $faker->randomElement(['Islam','Kristen','Budha','Hindu','Katolik']),
        'tempat_lahir' => $faker->address,
        'tanggal_lahir' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        'point' => '100',
        'foto' => '',
        
    ];
});
