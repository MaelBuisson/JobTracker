<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $applications = \App\Models\Application::orderBy('created_at', 'desc')->get();

    $stats = [
        'total' => $applications->count(),
        'entretiens' => $applications->where('status', 'Entretien')->count(),
        'encours' => $applications->whereIn('status', ['En attente', 'Envoyé', 'Relancé'])->count(),
        'refus' => $applications->where('status', 'Refusé')->count(),
    ];

    return view('applications.index', compact('applications', 'stats')); 
}

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    return view('applications.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
    $request->validate([
        'company_name' => 'required',
        'job_title' => 'required',
        'applied_at' => 'required|date',
    ]);

    $request->user()->applications()->create($request->all());

    return redirect()->route('applications.index')->with('success', 'Candidature ajoutée !');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $application = \App\Models\Application::findOrFail($id);

        return view('applications.edit', compact('application')); 
    }

    public function update(Request $request, $id)
    {
        $application = \App\Models\Application::findOrFail($id);

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title'    => 'required|string|max:255',
            'status'       => 'required|string',
        ]);

        $application->update($validated);

        return redirect()->route('applications.index')
                         ->with('success', 'Application updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $candidature->delete();

        return redirect()->route('applications.index')
                         ->with('success', 'Candidature supprimée.');
    }
}
