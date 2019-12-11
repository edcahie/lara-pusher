<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index(){

        return QuestionResource::collection(Question::latest()->get());
    }

    public function show(Question $question){

        return new QuestionResource($question);
    }

    public function destroy(Question $question){

        $question->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function store(Request $request){

        Question::create([

            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);
        return response('Created', Response::HTTP_CREATED);
    }

    public function update(Request $request, Question $question){

        $question->update([

            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);
        return response('Updated', Response::HTTP_ACCEPTED);
    }
}
