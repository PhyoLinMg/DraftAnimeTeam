<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'anime_id' => 'required|integer',
        ]);

        Character::create($validated);

        return redirect()->route('characters.index')
            ->with('success', 'Character created successfully.');
    }
}
