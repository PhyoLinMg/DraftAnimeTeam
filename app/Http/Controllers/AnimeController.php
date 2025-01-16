<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('animes.index', compact('animes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        Anime::create($validated);

        return redirect()->route('animes.index')
            ->with('success', 'Anime created successfully.');
    }
}
