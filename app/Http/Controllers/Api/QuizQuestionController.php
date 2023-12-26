<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use App\Models\QuizCategory;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function showWithQuestions($id)
    {
        // Retrieve the quiz along with its questions
        $quiz = Quiz::with('questions')->find($id);

        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        return response()->json($quiz);
    }
}
