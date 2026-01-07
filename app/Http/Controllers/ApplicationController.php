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
    $applications = auth()->user()->applications()->latest()->get();
    return view('applications.index', compact('applications'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
