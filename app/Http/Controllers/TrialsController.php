<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trial;

class TrialsController extends Controller
{
    public function index()
    {
        return Trial::all();
    }

    public function show(Trial $Trial)
    {
        return $Trial;
    }

    public function store(Request $request)
    {
        $Trial = Trial::create($request->all());

        return response()->json($Trial, 201);
    }

    public function update(Request $request, Trial $Trial)
    {
        $Trial->update($request->all());

        return response()->json($Trial, 200);
    }

    public function delete(Trial $Trial)
    {
        $Trial->delete();

        return response()->json(null, 204);
    }
}
