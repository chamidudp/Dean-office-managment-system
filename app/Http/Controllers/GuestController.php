<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    // Get all guests
    public function index()
    {
        $guests = Guest::all();
        return response()->json($guests);
    }

    // Store a new guest
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $guest = Guest::create($validatedData);
        return response()->json($guest, 201);
    }

    // Display a specific guest
    public function show($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        return response()->json($guest);
    }

    // Update a guest
    public function update(Request $request, $id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255',
        ]);

        $guest->update($validatedData);
        return response()->json($guest);
    }

    // Delete a guest
    public function destroy($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();
        return response()->json(['message' => 'Guest deleted successfully']);
    }
}
