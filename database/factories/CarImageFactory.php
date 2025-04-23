<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarImage>
 */
class CarImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => 'https://dummyimage.com/640x480/0000cc/ffffff&text=' . urlencode(fake()->word),
            'position' => function(array $attributes) {
                return \App\Models\Car::find($attributes['car_id'])->images()->count() + 1;
            },
        ];
    }
}
