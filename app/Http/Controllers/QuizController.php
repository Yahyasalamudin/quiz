<?php

namespace App\Http\Controllers;

use App\Events\NewQuiz;
use App\Models\DraftQuiz;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::get();

        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $quiz = Quiz::create([
                'title' => $request->title,
                'description' => $request->description,
                'teacher_id' => auth()->user()->id
            ]);

            $totalQuestions = count($request->questions);
            $score = 100 / $totalQuestions;

            foreach($request->questions as $q) {
                Question::create([
                    'quiz_id' => $quiz->id,
                    'question' => $q['question'],
                    'answer_a' => $q['answer_a'],
                    'answer_b' => $q['answer_b'],
                    'answer_c' => $q['answer_c'],
                    'answer_d' => $q['answer_d'],
                    'correct_answer' => $q['correct_answer'],
                    'score' => $score
                ]);
            }

            DraftQuiz::whereCodeQuiz($request->code_quiz)->delete();

            DB::commit();

            event(new NewQuiz($quiz));

            return response()->json(['data' => $quiz], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'quiz failed to save.' . $e], 400);
        }
    }
}
