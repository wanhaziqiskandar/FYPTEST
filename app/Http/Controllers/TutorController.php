<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the tutor.
     */
    public function index()
    {
        // Get all tutors
        $tutors = Tutor::with('user')->get();

        // Return the view with tutor data
        return view('tutors.index', compact('tutors'));
    }

    /**
     * Show the form for creating a new tutor.
     */
    public function create()
    {
        // Return the view for creating a tutor
        return view('tutors.create');
    }

    /**
     * Store a newly created tutor in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
            'price' => 'required|numeric',
            'bankaccountNumber' => 'required|string|max:255',
        ]);

        // Create a new tutor record
        Tutor::create($request->all());

        // Redirect to the tutor list
        return redirect()->route('tutors.index')->with('success', 'Tutor created successfully.');
    }

    /**
     * Display the specified tutor.
     */
    public function show($id)
    {
        // Find the tutor by id
        $tutor = Tutor::findOrFail($id);

        // Return the view with tutor data
        return view('tutors.show', compact('tutor'));
    }

    /**
     * Show the form for editing the specified tutor.
     */
    public function edit($id)
    {
        // Find the tutor by id
        $tutor = Tutor::findOrFail($id);

        // Return the view for editing the tutor
        return view('tutors.edit', compact('tutor'));
    }

    /**
     * Update the specified tutor in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
            'price' => 'required|numeric',
            'bankaccountNumber' => 'required|string|max:255',
        ]);

        // Find the tutor by id
        $tutor = Tutor::findOrFail($id);

        // Update the tutor record
        $tutor->update($request->all());

        // Redirect to the tutor list
        return redirect()->route('tutors.index')->with('success', 'Tutor updated successfully.');
    }

    /**
     * Remove the specified tutor from storage.
     */
    public function destroy($id)
    {
        // Find the tutor by id
        $tutor = Tutor::findOrFail($id);

        // Delete the tutor record
        $tutor->delete();

        // Redirect to the tutor list
        return redirect()->route('tutors.index')->with('success', 'Tutor deleted successfully.');
    }
}
