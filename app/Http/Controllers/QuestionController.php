<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Question::all();
    }

    public function store(QuestionRequest $request)
    {
        $validate = $request->validated();
        $question = Question::create($validate);
        return new QuestionResource($question);
    }

    public function show(Question $question)
    {
       return new QuestionResource($question);
    }
    public function update(UpdateRequest $request, Question $question)
    {
        $validate = $request->validated();
        $question->update($validate);
        return new QuestionResource($question);

        
    }

    public function destroy(Question $question)
    {
       $question->delete();
       return ['result'=>"sucessfully deleted from the datbase"];
    }
}
