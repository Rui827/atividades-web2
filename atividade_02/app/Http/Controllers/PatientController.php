<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();

        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|date',
            'cpf' => 'required',
            'mom' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required',
        ]);
        
        Patient::create($request->all());
        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|date',
            'cpf' => 'required',
            'mom' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required',
        ]);
        
        $patient->update($request->all());
        
        return view('patient.show', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patient.index');
    }
}
