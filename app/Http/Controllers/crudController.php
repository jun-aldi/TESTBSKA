<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Validate the request
                $validatedData = $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|max:255',
                    'password' => 'required|max:255',
                    // Add other validation rules as necessary
                ]);

                // Create a new resource
                $user = User::create($validatedData);

                // Redirect to a specific route, e.g., the index page
                return redirect()->route('users.index')->with('success', 'User created successfully.');
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6',
        ]);

        // Update the user
        $user->update($validatedData);

        // Redirect to a specific route, e.g., the index page
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        // Redirect to a specific route, e.g., the index page
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
