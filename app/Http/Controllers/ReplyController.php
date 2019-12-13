<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyRessource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index(Question $question){

        return ReplyRessource::collection($question->replies()->get());
    }

    public function show(Question $question, Reply $reply){

        return new ReplyRessource($reply);
    }

    public function store(Question $question, Request $request){

        $reply = $question->replies()->create($request->all());
        return response(['reply' => new ReplyRessource($reply)], Response::HTTP_CREATED);

    }

    public function destroy(Question $question, Reply $reply){

        $reply->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, Question $question ,Reply $reply){

        $reply->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }
}
