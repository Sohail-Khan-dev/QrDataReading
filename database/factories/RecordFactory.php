<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'honesty' => fake()->name(),
            'municipal' => fake()->name(),
            'id_number' => fake()->randomNumber(), // Correct method for generating a random number
            'occupation' => fake()->jobTitle(), // Correct method for generating a random number
            'health_certificate_number' => fake()->randomNumber(), // Correct method for generating a random number
            'nationality' => fake()->country(),
            'sex' => fake()->randomElement(['male', 'female']), // Correct method for generating a random gender
            'issue_date_hc_H' => fake()->date(),
            'issue_date_hc_Ad' => fake()->date(),
            'end_date_hc_H' => fake()->date(),
            'end_date_hc_AD' => fake()->date(),
            'end_date_edu' => fake()->date(),
            'type_of_edu' => fake()->title(),
            'licence_number' => fake()->numberBetween(10000,1000000),
            'facility_name' => fake()->title(),
            'facility_no' => fake()->numberBetween(),

        ];
    }
}
