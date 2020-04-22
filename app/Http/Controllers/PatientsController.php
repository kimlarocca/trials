<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientsController extends Controller
{
    public function index()
    {
        return Patient::all();
    }

    public function show(Patient $Patient)
    {
        return $Patient;
    }

    public function store(Request $request)
    {
        $Patient = Patient::create($request->all());

        return response()->json($Patient, 201);
    }

    public function update(Request $request, Patient $Patient)
    {
        $Patient->update($request->all());

        return response()->json($Patient, 200);
    }

    public function delete(Patient $Patient)
    {
        $Patient->delete();

        return response()->json(null, 204);
    }
}
