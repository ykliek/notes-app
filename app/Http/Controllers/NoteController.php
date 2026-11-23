<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
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

    public function store(StoreNoteRequest $request)
    {
        Note::create($request->validated());

        return redirect('/notes')->with('status', 'Нотатку створено.');
    }

    public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }

    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update($request->validated());

        return redirect("/notes/{$note->id}")->with('status', 'Нотатку оновлено.');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('/notes')->with('status', 'Нотатку видалено.');
    }
}
