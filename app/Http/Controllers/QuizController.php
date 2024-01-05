<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz = Quiz::first();
        return view('quiz.sheet', compact('quiz'));
    }


    /**
     * calculates the user's grade of the quiz.
     */
    public function submit(Request $request)
    {
        $submition = $request->except('_token');
        $totalAnswers = Answer::count();
        $correctAnswerCounter = 0;

        // Calculate the score from the answers submitted in the quiz form
        foreach ($submition as $answer) {
            if (is_array($answer)) {
                foreach ($answer as $singleAnswer) {
                    $correctAnswerCounter += $singleAnswer;
                }
            } else {
                $correctAnswerCounter += $answer;
            }
        }

        $score = round($correctAnswerCounter * 100 / $totalAnswers);
        $user_id = Auth::id();

        // Update the record into the database
        Record::where('user_id', $user_id)
            ->where('quiz_id', 1)
            ->update(['score' => $score]);

            User::find($user_id)->update([
                'has_passed' => 1
            ]);

        // Redirect to the view where the user views their score then logout
        return view('quiz.completion', compact('score'));
    }
}
