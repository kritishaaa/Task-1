<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizStoreRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=Quiz::all();
        // dd($data);
    }

    /**
     * @param QuizStoreRequest
     * @return QuizResource
     */
    public function store(QuizStoreRequest $request)
    {
        $data = $request->validated();
        $quiz= Quiz::create($data);
        return new QuizResource($quiz);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param QuizUpdateRequest $request
     * @param Quiz $quiz
     * @return QuizResource
     */
    public function update(QuizUpdateRequest $request, Quiz $quiz) : QuizResource
    {
        $data = $request ->validated();
        $quiz->update($data);
        return new QuizResource($quiz);
    }

    /**
     * @param Quiz $quiz
     * @return void
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return response()->noContent();
    }
}
