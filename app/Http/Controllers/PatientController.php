<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //$patients = Patient::all();
        $patients = Patient::take(30)->get();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // :requestResponse
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email|unique:patients',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);

        // Create a new patients record
        $patient = Patient::create($validatedData);


        return redirect()->route('patients.index')
            ->with('success', 'Patient has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient): view
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient): view
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient): RedirectResponse
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email|unique:patients,email,' . $patient->id, // No take current patient for checking
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);

        // Update the patient with the validated data
        $patient->update($validatedData);


        return redirect()->route('patients.show', $patient)
            ->with('success', 'Patient has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient): RedirectResponse
    {
        $patient->delete();
        return redirect()->route('patients.index')
            ->with('success', 'Patient has been deleted successfully.');
    }
}
