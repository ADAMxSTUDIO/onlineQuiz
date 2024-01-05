<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Record;
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
        
        // Insert the record into the database
        // $record = new Record;
        // $record->user_id = Auth::id();
        // $record->quiz_id = 1;
        // $record->score = $score;
        // $record->save();

        // Record::find(1)->update([
        //     'score' => $score
        // ]);

        // Redirect to the view where the user views their score then logout
        return view('quiz.completion', compact('score'));
    }
}
