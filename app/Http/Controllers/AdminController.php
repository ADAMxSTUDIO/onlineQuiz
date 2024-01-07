<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz = Quiz::first();
        return view('admin.index', compact('quiz'));
    }

    public function showAnswers(int $questionId)
    {
        $answers = Answer::where('question_id', $questionId)->get();
        return redirect()->intended('/admin#answer')->with('answers', $answers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editQuiz()
    {
        $quiz = Quiz::find(1);
        return view('admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateQuiz(Request $request)
    {
        $affectedQuizzes = Quiz::where('id', 1)->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'professor_name' => $request->professor_name,
            'module_name' => $request->module_name,
        ]);
        if ($affectedQuizzes === 1) {
            return redirect()->intended('/admin')->with('quiz.update.success', 'Quiz updated successfuly!');
        } else {
            return redirect()->intended('/admin')->with('quiz.update.error', 'Error, Quiz not found or couldn\'t be updated!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createQuestion()
    {
        return view('admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeQuestion(Request $request)
    {
        $question = Question::create([
            'content' => $request->content,
            'grade' => $request->grade,
            'correct_answers' => $request->correct_answers,
            'quiz_id' => 1,
        ]);

        if ($question) {
            return redirect()->intended('/admin')->with('question.store.success', 'Question ' . $question->id . ' created successfully!');
        } else {
            return redirect()->intended('/admin')->with('question.store.error', 'Error, Question couldn\'t be created!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editQuestion($question_id)
    {
        $question = Question::find($question_id);
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateQuestion(Request $request, int $question_id)
    {
        $affectedQuestions = Question::where('id', $question_id)->update([
            'content' => $request->content,
            'grade' => $request->grade,
            'correct_answers' => $request->correct_answers,
        ]);
        if ($affectedQuestions === 1) {
            return redirect()->intended('/admin')->with('question.update.success', 'Question ' . $question_id . ' updated successfuly!');
        } else {
            return redirect()->intended('/admin')->with('question.update.error', 'Error, Question not found or couldn\'t be updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyQuestion(int $question_id)
    {
        $question = Question::find($question_id);

        if ($question) {
            $question->delete();
            return redirect()->intended('/admin')->with('question.destroy.success', 'Question ' . $question_id . ' deleted successfully!');
        } else {
            return redirect()->intended('/admin')->with('question.destroy.error', 'Error, Question ' . $question_id . ' not found or couldn\'t be deleted!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAnswer()
    {
        $questions = Question::all();
        return view('admin.answer.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAnswer(Request $request)
    {
        $answer = Answer::create([
            'content' => $request->content,
            'is_correct' => $request->is_correct,
            'question_id' => $request->question_id
        ]);

        if ($answer) {
            return redirect()->intended('/admin')->with('answer.store.success', 'Answer ' . $answer->id . ' created successfully!');
        } else {
            return redirect()->intended('/admin')->with('answer.store.error', 'Error, Answer couldn\'t be created!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editAnswer($answer_id)
    {
        $answer = Answer::find($answer_id);
        $questions = Question::all();
        return view('admin.answer.edit', compact(['answer', 'questions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAnswer(Request $request, int $answer_id)
    {
        $affectedAnswers = Answer::where('id', $answer_id)->update([
            'content' => $request->content,
            'is_correct' => $request->is_correct,
            'question_id' => $request->question_id
        ]);
        if ($affectedAnswers === 1) {
            return redirect()->intended('/admin')->with('answer.update.success', 'Answer ' . $answer_id . ' of the question ' . $request->question_id . ' updated successfuly!');
        } else {
            return redirect()->intended('/admin')->with('answer.update.error', 'Error, Answer not found or couldn\'t be updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAnswer(int $answer_id)
    {
        $answer = Answer::find($answer_id);

        if ($answer) {
            $answer->delete();
            return redirect()->intended('/admin')->with('answer.destroy.success', 'Answer ' . $answer_id . ' of the question ' . $answer->question->id . ' deleted successfully!');
        } else {
            return redirect()->intended('/admin')->with('answer.destroy.error', 'Error, Answer ' . $answer_id . ' not found or couldn\'t be deleted!');
        }
    }

    public function dumpAll()
    {
        $default = 'none';
        Quiz::where('id', 1)->update([
            'title' => $default,
            'duration' => 0,
            'professor_name' => $default,
            'module_name' => $default,
        ]);

        // Disable foreign key checks again
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clearing the Question and Answer tables
        Question::truncate();
        Answer::truncate();

        // Enable foreign key checks again
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->intended('/admin')->with('dump.success', 'Everything is clear and ready specialy for you!');
    }
}
