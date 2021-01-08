<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nisn'          => Str::random(4),
        'nama_siswa'    => $faker->name,
        'tanggal_lahir' => $faker->date,
        'jenis_kelamin' => $faker->randomElement(['L','P']),
    ];
});
