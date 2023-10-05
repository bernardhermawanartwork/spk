<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jemaat>
 */
class JemaatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama"          => fake()->name(),
            "pekerjaan"     => fake()->word(),
            "status"        => fake()->randomElement(['0','1']),
            "status_keaktifan"  => fake()->randomElement(['0','1']),
            "usia"          => fake()->randomNumber(2,true),
            "pendapatan"    => fake()->randomNumber(7,true),
            "alamat"        => fake()->text(),
            "kehadiran"     => 0,
        ];
    }
}
