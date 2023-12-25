<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\QuestionCategoryStoreRequest;
use App\Http\Requests\Api\QuestionCategoryUpdateRequest;
use App\Http\Resources\QuestionCategoryResource;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class QuestionCategoryController extends Controller
{
    /**
     * 
     */
    public function index()
    {
       $questionCategories = QuestionCategory::paginate(10);
       return QuestionCategoryResource::collection($questionCategories);

    }


    /**
     * @param QuestionCategoryStoreRequest $request
     * @return QuestionCategoryResource
     */
    public function store(QuestionCategoryStoreRequest $request)
    {
        $data = $request->validated();
        $questionCategory = QuestionCategory::create($data);
        return new QuestionCategoryResource($questionCategory);
    }

    /**
     * @param QuestionCategory $questionCategory
     * @return QuestionCategoryResource
     */
    public function show(QuestionCategory $questionCategory)
    {
        return new QuestionCategoryResource($questionCategory);
    }

    /**
     * @param QuestionCategoryUpdateRequest $request
     * @param  QuestionCategory $questionCategory
     * @return QuestionCategoryResource
     */
    public function update(QuestionCategoryUpdateRequest $request, QuestionCategory $questionCategory)
    {
        $data = $request->validated();
        $questionCategory->update($data);
        return new QuestionCategoryResource($questionCategory);
    }

    /**
     * @param QuestionCategory $questionCategory
     */
    public function destroy( QuestionCategory $questionCategory)
    {
        $questionCategory->delete();
        return response()->json([
            "message"=>"deleted sucessfully"
        ]);
    }
}
