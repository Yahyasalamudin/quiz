<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DraftQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class DraftQuizController extends Controller
{
    public function store(Request $request)
    {
        $code_quiz = $request->code_quiz;
        if(!$request->code_quiz) {
            $randomString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890"), 0, 3);
            $date = date("dmY");

            $code_quiz = $randomString . '-' . $date;
        }
        $title = $request->title;
        $description = $request->description;
        $question = [];
        $answer_a = [];
        $answer_b = [];
        $answer_c = [];
        $answer_d = [];
        $correct_answer = [];
        foreach($request->questions as $q) {
            array_push($question, $q['question'] ?? null);
            array_push($answer_a, $q['answer_a'] ?? null);
            array_push($answer_b, $q['answer_b'] ?? null);
            array_push($answer_c, $q['answer_c'] ?? null);
            array_push($answer_d, $q['answer_d'] ?? null);
            array_push($correct_answer, $q['correct_answer'] ?? null);
        }

        try {
            DB::beginTransaction();

            if (!$request->code_quiz) {
                // return response()->json(['message' => 1], 400);
                $quiz = DraftQuiz::create([
                    'code_quiz' => $code_quiz,
                    'title' => $title,
                    'description' => $description,
                    'question' => json_encode($question),
                    'answer_a' => json_encode($answer_a),
                    'answer_b' => json_encode($answer_b),
                    'answer_c' => json_encode($answer_c),
                    'answer_d' => json_encode($answer_d),
                    'correct_answer' => json_encode($correct_answer)
                ]);
            } else {
                // return response()->json(['message' => 2], 400);
                $quiz = DraftQuiz::where('code_quiz', $code_quiz)->first();

                $quiz->update([
                    'code_quiz' => $code_quiz,
                    'title' => $title,
                    'description' => $description,
                    'question' => json_encode($question),
                    'answer_a' => json_encode($answer_a),
                    'answer_b' => json_encode($answer_b),
                    'answer_c' => json_encode($answer_c),
                    'answer_d' => json_encode($answer_d),
                    'correct_answer' => json_encode($correct_answer)
                ]);

                $quiz->refresh();
            }

            DB::commit();

            return response()->json(['message' => 'data saved successfully', 'data' => $quiz], 200);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => $e], 400);
        }
    }

    public function destroy($code_quiz)
    {
        $draft_quiz = DraftQuiz::where('code_quiz', $code_quiz)->first();
        $draft_quiz->delete();

        return response()->json(['data' => $draft_quiz], 200);
    }
}
