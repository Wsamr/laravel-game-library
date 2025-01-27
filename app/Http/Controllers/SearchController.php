<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Game;

class SearchController extends Controller
{
    public function searchByName(Request $request)
    {
        $name = $request->input('name');
        $games = Game::where('title', 'LIKE', '%' . $name . '%')->get();
        return view('results', ['games' => $games]);
    }

    public function searchByCategory(Category $category)
    {
        // $categoryId = $request->input('name');
//        @dd($category);

@dd($category);
        $games = Game::where('category_id', $category->id)->get();
        return view('results', ['games' => $games]);
    }
}
