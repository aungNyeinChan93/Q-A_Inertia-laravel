<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionTags>
 */
class QuestionTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id'=>Question::factory(),
            'tag_id'=>Tag::factory(),
        ];
    }
}
