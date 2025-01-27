<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, '__invoke'])->name('home');
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/profile/{users}', [UserController::class, 'show'])->name('users.show');
    Route::resource('users', UserController::class, [
        'except' => ['show'],
    ]);
    Route::get('collections', [CollectionController::class, 'index'])->name('collections.index');
    Route::post('collections', [CollectionController::class, 'store'])->name('collections.store');
    Route::get('collections/create', [CollectionController::class, 'create'])->name('collections.create');
    Route::get('collections/{name}', [CollectionController::class, 'showByName'])->name('collections.showByName');
    Route::get('collections/{collection}', [CollectionController::class, 'show'])->name('collections.show');
    Route::get('collections/{collection}/edit', [CollectionController::class, 'edit'])->name('collections.edit');
    Route::put('collections/{collection}', [CollectionController::class, 'update'])->name('collections.update');
    Route::delete('collections/{collection}', [CollectionController::class, 'destroy'])->name('collections.destroy');
    Route::post('/games/{game}/attach-collection', [GameController::class, 'attachToCollection'])->name('games.attachToCollection');
    Route::delete('/games/{game}/detach-collection', [GameController::class, 'detachFromCollection'])->name('games.detachFromCollection');
    Route::get('/games/{game}/attach', [GameController::class, 'attach'])->name('games.attach');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.register');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::get('home', [HomeController::class, '__invoke'])->name('home');
Route::get('/search', [SearchController::class, 'searchByName'])->name('searchByName');
// Route::get('/search', [SearchController::class, 'searchByCategory'])->name('searchByCategory');

Route::delete('/logout', [SessionController::class, 'destroy'])->name('destroy');


Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');


