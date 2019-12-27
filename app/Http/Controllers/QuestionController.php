<?php

namespace App\Http\Controllers;


use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class QuestionController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);

    }


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

       // dd($request);
       // Question::create($request->all());
        //$request['slug'] = str_slug($request->title);
        $question = auth()->user()->question()->create($request->all());
        return response(new QuestionResource($question), Response::HTTP_CREATED);
    }

    public function update(Request $request, Question $question){

        $question->update([

            'title' => $request->title,
            //'slug' => str_slug($request->title)
        ]);
        return response('Updated', Response::HTTP_ACCEPTED);
    }
}
