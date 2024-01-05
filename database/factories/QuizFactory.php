<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'HTML 5 & CSS 3 Basics',
            'duration' => 30,
            'professor_name' => 'Mohammed Aarabane',
            'module_name' => 'Front-end'
        ];
    }
}
