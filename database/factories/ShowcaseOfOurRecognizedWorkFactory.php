<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShowcaseOfOurRecognizedWork>
 */
class ShowcaseOfOurRecognizedWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'title_read_more' => $this->faker->sentence(4),
            'title2_read_more' => $this->faker->sentence(4),
            'image_url' => $this->faker->imageUrl(800, 600, 'business'),
            'image_galary' => [
                $this->faker->imageUrl(),
                $this->faker->imageUrl()
            ],
            'clients' => [
                $this->faker->company(),
                $this->faker->company(),
            ],
            'description' => $this->faker->paragraph(),
            'category' => $this->faker->word(),
            'data_address' => $this->faker->address(),
        ];
    }
}
