<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OurDemandingService>
 */
class OurDemandingServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'image_url' => $this->faker->imageUrl(600, 400, 'tech'),
            'icon' => $this->faker->randomElement([
                'icons 1',
                'icon 2'
            ]),
            'description' => $this->faker->paragraph(),
            'titleHead_description_read_more' => $this->faker->sentence(4),
            'title_description_read_more' => $this->faker->sentence(4),
            'description_add_more' => $this->faker->paragraph(),
        ];
    }
}
