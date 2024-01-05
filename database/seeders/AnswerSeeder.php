<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Answer::create([
            'content' => 'Hypertext Markup Language',
            'is_correct' => 1,
            'question_id' => 1
        ]);

        Answer::create([
            'content' => 'Highlighted Text Machine Language',
            'is_correct' => 0,
            'question_id' => 1
        ]);

        Answer::create([
            'content' => 'Highlighted Text Markup Language',
            'is_correct' => 0,
            'question_id' => 1
        ]);

        Answer::create([
            'content' => 'Hypertext Machine Language',
            'is_correct' => 0,
            'question_id' => 1
        ]);

        Answer::create([
            'content' => 'True',
            'is_correct' => 0,
            'question_id' => 2
        ]);

        Answer::create([
            'content' => 'False',
            'is_correct' => 1,
            'question_id' => 2
        ]);

        Answer::create([
            'content' => 'be device-independent',
            'is_correct' => 0,
            'question_id' => 3
        ]);

        Answer::create([
            'content' => 'use markup instead of scripting where appropriate',
            'is_correct' => 0,
            'question_id' => 3
        ]);

        Answer::create([
            'content' => 'take advantage of the most up-to-date plugins',
            'is_correct' => 1,
            'question_id' => 3
        ]);

        Answer::create([
            'content' => 'false',
            'is_correct' => 0,
            'question_id' => 4
        ]);

        Answer::create([
            'content' => 'true',
            'is_correct' => 1,
            'question_id' => 4
        ]);

        Answer::create([
            'content' => 'World Wide Web Consortium',
            'is_correct' => 1,
            'question_id' => 5
        ]);

        Answer::create([
            'content' => 'WWW Compliance',
            'is_correct' => 0,
            'question_id' => 5
        ]);

        Answer::create([
            'content' => 'World Wide Web Community',
            'is_correct' => 0,
            'question_id' => 5
        ]);

        Answer::create([
            'content' => 'rgba',
            'is_correct' => 1,
            'question_id' => 6
        ]);

        Answer::create([
            'content' => 'binary',
            'is_correct' => 0,
            'question_id' => 6
        ]);

        Answer::create([
            'content' => 'hexadecimal',
            'is_correct' => 1,
            'question_id' => 6
        ]);

        Answer::create([
            'content' => 'color name',
            'is_correct' => 1,
            'question_id' => 6
        ]);

        Answer::create([
            'content' => 'rgb',
            'is_correct' => 1,
            'question_id' => 6
        ]);

        Answer::create([
            'content' => 'true',
            'is_correct' => 0,
            'question_id' => 7
        ]);

        Answer::create([
            'content' => 'false',
            'is_correct' => 1,
            'question_id' => 7
        ]);

        Answer::create([
            'content' => 'inline-block',
            'is_correct' => 0,
            'question_id' => 8
        ]);

        Answer::create([
            'content' => 'block',
            'is_correct' => 0,
            'question_id' => 8
        ]);

        Answer::create([
            'content' => 'none',
            'is_correct' => 0,
            'question_id' => 8
        ]);

        Answer::create([
            'content' => 'inline',
            'is_correct' => 1,
            'question_id' => 8
        ]);

        Answer::create([
            'content' => 'block',
            'is_correct' => 1,
            'question_id' => 9
        ]);

        Answer::create([
            'content' => 'inline-block',
            'is_correct' => 1,
            'question_id' => 9
        ]);

        Answer::create([
            'content' => 'none',
            'is_correct' => 1,
            'question_id' => 9
        ]);

        Answer::create([
            'content' => 'inline',
            'is_correct' => 0,
            'question_id' => 9
        ]);

        Answer::create([
            'content' => 'true',
            'is_correct' => 0,
            'question_id' => 10
        ]);

        Answer::create([
            'content' => 'false',
            'is_correct' => 1,
            'question_id' => 10
        ]);
    }
}
