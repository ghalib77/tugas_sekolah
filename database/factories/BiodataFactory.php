<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\en_US\Address;

class BiodataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $table="biodata";
    public function definition()
    {
        return [
           "nama"=>$this->faker->name(),
           "kelas_id"=>mt_rand(1,3),
           "NIS"=>$this->faker->unique()->numerify("########"),
           "tanggal_lahir"=>$this->faker->date(),
           "tempat_lahir"=>$this->faker->word(5),
           "email"=>$this->faker->unique()->email
        ];
    }
}
