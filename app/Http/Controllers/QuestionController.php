<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
  

   public function index()
   {
      $questions = Question::paginate(5);
      return QuestionResource::collection($questions);
   }
   
   /**
    *  @param StoreQuestionRequest $request
    * @return QuestionResource
    */
   public function store(StoreQuestionRequest $request) : QuestionResource
   {
      $data = $request->validated();
      $question = Question::create($data);
      return new QuestionResource($question);
   }

   /** @param Question $question
    *  @return QuestionResource
    */
   public function show(Question $question): QuestionResource
   {
      return new QuestionResource($question);
   }
    /**
     * @param UpdateQuestionRequest $request
     * @param Question $question
     * @return QuestionResource
     */
   public function update(UpdateQuestionRequest $request, Question $question)
   {
      $data = $request->validated();
      $question->update($data);
      return new QuestionResource($question);

   }

    /**
     * @param Question $question
     * 
     */
   public function destroy(Question $question)
   {
      $question->delete();
      return response()->noContent(); 
   }
}
