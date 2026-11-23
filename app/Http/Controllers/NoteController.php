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
        $validated = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:5'],
            'status' => ['required', 'in:pending,in_progress,done'],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        Note::create($validated);

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
        $validated = request()->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:5'],
            'status' => ['required', 'in:pending,in_progress,done'],
            'due_date' => ['nullable', 'date'],
        ]);

        $note->update($validated);

        return redirect("/notes/{$note->id}");
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('/notes');
    }
}
