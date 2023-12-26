<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\QuizCategoryStoreRequest;
use App\Http\Requests\Api\QuizCategoryUpdateRequest;
use App\Http\Resources\QuizCategoryResource;
use App\Models\Quiz;
use App\Models\QuizCategory;
use Illuminate\Http\Request;

class QuizCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizCategoryStoreRequest $request)
    {
        $data = $request->validated();
        $quizCategory = Quiz::create($data);
        return new QuizCategoryResource($quizCategory);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizCategoryUpdateRequest $request, QuizCategory $quizCategory)
    {
        $data = $request->validated();
        $quizCategory->update($data);
        return new QuizCategoryResource($quizCategory);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizCategory $quizCategory)
    {
        $quizCategory->delete();
        return response()->noContent();
    }
}
