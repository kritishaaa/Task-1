<?php

use App\Http\Controllers\Api\QuestionCategoryController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\QuestionsByCategoryController;
use App\Http\Controllers\Api\QuizCategoryController;
use App\Http\Controllers\Api\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('questions',QuestionController::class);
Route::apiResource('/question-categories',QuestionCategoryController::class);
Route::get("/question-categories/{questionCategory}/questions", QuestionsByCategoryController::class);


Route::apiResource('/quiz',QuizController::class);
Route::apiResource('/quiz-categories',QuizCategoryController::class);
// Route::get('/quiz-categories/{quizCategory}/questions',QuizCategoryController::class);