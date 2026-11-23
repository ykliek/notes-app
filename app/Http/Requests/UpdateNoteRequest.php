<?php

namespace App\Http\Requests;

class UpdateNoteRequest extends StoreNoteRequest
{
    /**
     * Під час редагування дозволяємо зберегти вже прострочену дату.
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'due_date' => ['nullable', 'date'],
        ]);
    }
}
