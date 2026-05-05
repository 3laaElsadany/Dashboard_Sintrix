<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HearFromOurHappyCustomer>
 */
class HearFromOurHappyCustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_user' => $this->faker->sentence(2),
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(300, 300, 'people'),
            'rating' => $this->faker->randomFloat(1, 1, 5),
        ];
    }
}
