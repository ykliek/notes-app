<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    /**
     * GET /api/notes — список нотаток (200 OK).
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($request->user()->notes()->latest()->get());
    }

    /**
     * POST /api/notes — створення нотатки (201 Created).
     */
    public function store(StoreNoteRequest $request): JsonResponse
    {
        $note = $request->user()->notes()->create($request->validated());

        return response()->json($note, 201);
    }

    /**
     * GET /api/notes/{note} — одна нотатка (200 OK або 404).
     */
    public function show(Note $note): JsonResponse
    {
        Gate::authorize('view', $note);

        return response()->json($note);
    }

    /**
     * PATCH /api/notes/{note} — оновлення (200 OK).
     */
    public function update(UpdateNoteRequest $request, Note $note): JsonResponse
    {
        Gate::authorize('update', $note);

        $note->update($request->validated());

        return response()->json($note->fresh(), 200);
    }

    /**
     * DELETE /api/notes/{note} — видалення (204 No Content).
     */
    public function destroy(Note $note): JsonResponse
    {
        Gate::authorize('delete', $note);

        $note->delete();

        return response()->json(null, 204);
    }
}
