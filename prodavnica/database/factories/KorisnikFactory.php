<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\korisnik>
 */
class KorisnikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Ime' => $this->faker->firstName,
            'Prezime' => $this->faker->lastName,
            'Adresa' => $this->faker->address,
            'Email' => $this->faker->unique()->safeEmail,
            'broj_telefona' => $this->faker->phoneNumber
        ];
    }
}
