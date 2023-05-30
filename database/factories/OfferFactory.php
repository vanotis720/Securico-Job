<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = [
            'Spécialiste du marketing numérique',
            'Digital Marketer',
            'Design & Development',
            'Rédacteur de contenu',
            'Ménagère'
        ];
        $school = ['Universitaire', 'École secondaire', 'École Primaire', 'Je n\'ai pas de diplôme'];
        $users = User::all()->toArray();

        return [
            'title' => $title[rand(0, count($title) - 1)],
            'description' => fake()->text(),
            'end_at' => fake()->date('d-m-Y', '01-01-2024'),
            'skills' => fake()->text(),
            'school' => $school[rand(0, count($school) - 1)],
            'user_id' => 1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
