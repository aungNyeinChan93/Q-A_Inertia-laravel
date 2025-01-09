<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['HTML', "CSS", 'JS', 'Laravel', 'PHP', 'Vue', 'Inertia']),
            'slug' => Str::slug(fake()->randomElement(['HTML', "CSS", 'JS', 'Laravel', 'PHP', 'Vue', 'Inertia']))
        ];
    }
}
