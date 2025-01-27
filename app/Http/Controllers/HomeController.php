<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Game;

class HomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $games = Game::all();

        return view('home', compact('categories', 'games'));
    }
}
