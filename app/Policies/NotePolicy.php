<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;

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
     * Переглядати нотатку може лише її власник.
     */
    public function view(User $user, Note $note): bool
    {
        return $note->user->is($user);
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
    public function update(User $user, Note $note): bool
    {
        return $note->user->is($user);
    }

    /**
     * Видалення підпорядковане тому ж правилу, що й редагування.
     */
    public function delete(User $user, Note $note): bool
    {
        return $this->update($user, $note);
    }
}
