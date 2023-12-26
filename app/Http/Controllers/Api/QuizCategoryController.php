<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\QuizCategoryStoreRequest;
use App\Http\Requests\Api\QuizCategoryUpdateRequest;
use App\Http\Resources\QuizCategoryResource;
use App\Models\QuizCategory;

class QuizCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizCategory=QuizCategory::paginate(10);
        return QuizCategoryResource::collection($quizCategory);
    }

    /**
     * @param QuizCategoryStoreRequest $request
     * @return QuizCategoryResource
     */
    public function store(QuizCategoryStoreRequest $request) : QuizCategoryResource
    {
        $data = $request->validated();
        $quizCategory = QuizCategory::create($data);
        return new QuizCategoryResource($quizCategory);
       


    }

    /**
     * @param QuizCategoryUpdateRequest $request
     * @param QuizCategory $quizCategory
     * @return QuizCategoryResource
     */
    public function update(QuizCategoryUpdateRequest $request, QuizCategory $quizCategory) : QuizCategoryResource
    {
        $data = $request->validated();
        $quizCategory->update($data);
        return new QuizCategoryResource($quizCategory);

    }

    /**
     * @param QuizCategory $quizCategory
     * @return void
     */
    public function destroy(QuizCategory $quizCategory)
    {
        $quizCategory->delete();
        return response()->noContent();
    }
}
