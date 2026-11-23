<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/create', [NoteController::class, 'create']);
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{note}', [NoteController::class, 'show']);
Route::get('/notes/{note}/edit', [NoteController::class, 'edit']);
Route::patch('/notes/{note}', [NoteController::class, 'update']);
Route::delete('/notes/{note}', [NoteController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/about', function () {
    return view('about', [
        'person' => request('person', 'world'),
        'features' => ['Створення нотаток', 'Збереження у базі даних SQLite', 'Спільний Blade-layout'],
    ]);
});

Route::view('/contact', 'contact');

Route::get('/ui-demo', fn () => view('ui-demo', ['theme' => request('theme', 'light')]));
