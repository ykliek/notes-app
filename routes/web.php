<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// Сторінки лише для гостей
Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

// Сторінки лише для автентифікованих користувачів
Route::middleware('auth')->group(function () {
    Route::get('/notes', [NoteController::class, 'index']);
    Route::get('/notes/create', [NoteController::class, 'create']);
    Route::post('/notes', [NoteController::class, 'store']);
    Route::get('/notes/{note}', [NoteController::class, 'show']);
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit']);
    Route::patch('/notes/{note}', [NoteController::class, 'update']);
    Route::delete('/notes/{note}', [NoteController::class, 'destroy']);

    Route::delete('/logout', [SessionsController::class, 'destroy']);
});

Route::get('/about', function () {
    return view('about', [
        'person' => request('person', 'world'),
        'features' => ['Створення нотаток', 'Збереження у базі даних SQLite', 'Реєстрація та вхід'],
    ]);
});

Route::view('/contact', 'contact');

Route::get('/ui-demo', fn () => view('ui-demo', ['theme' => request('theme', 'light')]));
