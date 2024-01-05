<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'content' => 'What does HTML stand for?',
            'grade' => 2,
            'correct_answers' => 1,
        ]);

        Question::create([
            'content' => 'Unlike earlier versions of HTML, HTML5 produces pages that look the same across all browsers.',
            'grade' => 2,
            'correct_answers' => 1,
        ]);

        Question::create([
            'content' => 'Read this question carefully since we are asking about things we want to avoid.  HTML5 should **NOT**...',
            'grade' => 2,
            'correct_answers' => 1,
        ]);

        Question::create([
            'content' => 'An  HTML5 tag will always have the  same semantic meaning, regardless of the browser being used.',
            'grade' => 2,
            'correct_answers' => 1,
        ]);

        Question::create([
            'content' => 'W3C stands for:',
            'grade' => 2,
            'correct_answers' => 1,
        ]);

        Question::create([
            'content' => 'Which of the following is an option for specifying a color in CSS3?',
            'grade' => 2,
            'correct_answers' => 4,
        ]);

        Question::create([
            'content' => 'The browser defaults override rules specified in an external stylesheet.',
            'grade' => 2,
            'correct_answers' => 1,
        ]);

        Question::create([
            'content' => 'The default display value for the <a> element is:',
            'grade' => 2,
            'correct_answers' => 1,
        ]);

        Question::create([
            'content' => 'The default display value for <span> is **NOT**:',
            'grade' => 2,
            'correct_answers' => 3,
        ]);

        Question::create([
            'content' => 'Inline elements take up the full width of the browser, even if the content is smaller than the browser size.',
            'grade' => 2,
            'correct_answers' => 1,
        ]);
    }
}
