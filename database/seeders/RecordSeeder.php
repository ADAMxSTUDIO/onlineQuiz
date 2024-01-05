<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;
use App\Models\User;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Record::create([
        //     'user_id' => 1,
        //     'quiz_id' => 1,
        //     'score' => 0
        // ]);

        $user = User::find(1); // Assuming you have a user with ID 1
        $quiz = Quiz::find(1); // Assuming you have a quiz with ID 1

        // Attach a quiz to a user with a specific score
        $user->quiz()->attach($quiz, ['score' => 0]);
    }
}
