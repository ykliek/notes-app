<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NotePolicy
{
    /**
     * Список нотаток може відкрити будь-який автентифікований користувач
     * (запит у контролері все одно повертає лише його нотатки).
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Переглядати нотатку може лише її власник; чужа нотатка виглядає як неіснуюча (404).
     */
    public function view(User $user, Note $note): Response
    {
        return $note->user->is($user)
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Створювати нотатки може кожен автентифікований користувач.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Редагувати нотатку може лише її власник.
     */
    public function update(User $user, Note $note): Response
    {
        return $note->user->is($user)
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Видалення підпорядковане тому ж правилу, що й редагування.
     */
    public function delete(User $user, Note $note): Response
    {
        return $this->update($user, $note);
    }
}
