<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index', [
            'notes' => Note::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store()
    {
        Note::create([
            'title' => request('title'),
            'description' => request('description'),
        ]);

        return redirect('/notes');
    }

    public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }

    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    public function update(Note $note)
    {
        $note->update([
            'title' => request('title'),
            'description' => request('description'),
        ]);

        return redirect("/notes/{$note->id}");
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('/notes');
    }
}
