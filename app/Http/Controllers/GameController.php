<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Htt\Controllers\CollectionController;
use App\Models\Collection;


class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', ['games' => $games]);
    }

    public function create()
    {
        return view('games.create');
    }

    public function edit(Game $game)
    {
        return view('games.edit', ['game' => $game]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'poster_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Update the game instance
        $game = new Game();
        $game->title = $validatedData['title'];
        $game->description = $request->input('description');
        $game->price = $request->input('price');
        $game->release_date = $request->input('release_date');
        // $game->rating = 3;
        $game->color = $request->input('color', '#6B3FA0');

        
        // @dd($validatedData);
        // Handle file uploads for images
        if ($request->hasFile('poster_image')) {
            $posterPath = $request->poster_image->store('posters', 'public');
            $game->poster_image = $posterPath;
        }
        
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
            $game->cover_image = $coverPath;
        }
        
        try {
            // @dd($game);
            $game->save();
            return redirect()->route('games.index')->with('success', 'Game created successfully!');
        } catch (\Exception $e) {
            @dd($e);
            // Log the error or display the message if something goes wrong
            \Log::error('Error creating game: ' . $e->getMessage());
            return back()->with('error', 'Failed to create the game.');
        }
    }

    public function show(Game $game)
    {
        return view('games.show', ['game' => $game]);
    }

    public function attach(Game $game)
    {
        $collections = Collection::all();
        return view('games.attach', ['game' => $game, 'collections' => $collections]);
    }


    public function attachToCollection(Request $request, Game $game)
    {
        $validated = $request->validate([
            'collection_id' => 'required|exists:collections,id',
        ]);
    
        try {
            $game->collections()->attach($validated['collection_id']);
            return back()->with('success', 'Game added to collection successfully!');
        } catch (\Exception $e) {
            \Log::error('Error attaching game to collection: ' . $e->getMessage());
            return back()->with('error', 'Failed to add the game to the collection.');
        }
    }

    public function detachFromCollection(Request $request, Game $game)
{
    $validated = $request->validate([
        'collection_id' => 'required|exists:collections,id',
    ]);

    try {
        $game->collections()->detach($validated['collection_id']);
        return back()->with('success', 'Game removed from collection successfully!');
    } catch (\Exception $e) {
        \Log::error('Error detaching game from collection: ' . $e->getMessage());
        return back()->with('error', 'Failed to remove the game from the collection.');
    }
}

    public function update(Request $request, Game $game)
    {
        // Validate the request
        // @dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'poster_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Update the game instance
        $game->title = $validatedData['title'];
        $game->description = $request->input('description');
        $game->price = $request->input('price');
        $game->release_date = $request->input('release_date');
        // $game->rating = 3;
        $game->color = $request->input('color', '#6B3FA0');


        // @dd($validatedData);
        // Handle file uploads for images
        if ($request->hasFile('poster_image')) {
            $posterPath = $request->poster_image->store('posters', 'public');
            $game->poster_image = $posterPath;
        }
        
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
            $game->cover_image = $coverPath;
        }
        // @dd($game);
        
        try {
            $game->save();
            return redirect()->route('games.index')->with('success', 'Game updated successfully!');
        } catch (\Exception $e) {
            // @dd($e);
            // Log the error or display the message if something goes wrong
            \Log::error('Error updating game: ' . $e->getMessage());
            return back()->with('error', 'Failed to update the game.');
        }
    }

    public function destroy(Game $game)
    {
        try {
            $game->delete();
            return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting game: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete the game.');
        }
    }
}
