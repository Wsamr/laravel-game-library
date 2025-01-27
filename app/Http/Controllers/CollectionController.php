<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Auth::User()->collections;
//        dd($collections);
        return view('collections.index', ['collections' => $collections]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('collections.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $collection = new Collection();
        $collection->name = $request->input('name');
        $collection->user_id = Auth::id();
        $collection->description = $request->input('description');
        if ($request->hasFile('image')) {
            $iconPath = $request->image->store('collection_images', 'public');
            $collection->image = $iconPath;
        }
        $collection->save();

        return redirect()->route('collections.index')->with('success', 'Collection created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        @dd($collection);
        return view('collections', ['collection' => $collection]);
    }

    public function showByName($name)
    {
        $collection = Auth::User()->collections()->where('name', $name)->first();
        return view('collections.show', ['collection' => $collection]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        return view('collections.edit', ['collection' => $collection]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        // @dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $collection->name = $request->input('name');
        $collection->description = $request->input('description');
        if ($request->hasFile('image')) {
            $iconPath = $request->image->store('collection_images', 'public');
            $collection->image = $iconPath;
        }
        $collection->save();

        return redirect()->route('collections.index')->with('success', 'Collection updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('collections.index')->with('success', 'Collection deleted successfully.');
    }
}
