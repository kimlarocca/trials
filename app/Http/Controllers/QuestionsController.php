<?php

namespace App\Http\Controllers;
use App\Question;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        return Question::all();
    }

    public function show(Question $Question)
    {
        return $Question;
    }

    public function store(Request $request)
    {
        $Question = Question::create($request->all());

        return response()->json($Question, 201);
    }

    public function update(Request $request, Question $Question)
    {
        $Question->update($request->all());

        return response()->json($Question, 200);
    }

    public function delete(Question $Question)
    {
        $Question->delete();

        return response()->json(null, 204);
    }
}
