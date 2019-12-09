<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index(){

        return Question::latest()->get();
    }

    public function show(Question $question){

        return $question;
    }

    public function destroy(Question $question){

        $question->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function store(Request $request){

        Question::create($request->all());
        return response('Created', Response::HTTP_CREATED);
    }
}
