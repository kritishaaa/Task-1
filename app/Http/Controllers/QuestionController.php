<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
   
    public function index()
    {
       $questions= Question::paginate(5);
       return  QuestionResource::collection($questions);
    }

    public function store(QuestionRequest $request)
    {
        $data = $request->validated();
        $question = Question::create($data);
        return new QuestionResource($question);
    }

    public function show(Question $question)
    {
       return new QuestionResource($question);
    }

    public function update( UpdateQuestionRequest $request ,Question $question)
    {
        $data = $request->validated(); 
       $question->update($data);
       return new QuestionResource($question);
        
    }

    public function destroy(Question $question)
    {
       $question->delete();
       return ['result'=>"sucessfully deleted from the datbase"];
    }
}
