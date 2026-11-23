<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'notes' => session('notes', []),
    ]);
});

Route::post('/notes', function () {
    session()->push('notes', request('note'));

    return redirect('/');
});

Route::get('/about', function () {
    return view('about', [
        'person' => request('person', 'world'),
        'features' => ['Створення нотаток', 'Збереження у сесії', 'Спільний Blade-layout'],
    ]);
});

Route::view('/contact', 'contact');
