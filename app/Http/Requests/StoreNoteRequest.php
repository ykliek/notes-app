<?php

namespace App\Http\Requests;

use App\Models\Note;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNoteRequest extends FormRequest
{
    /**
     * Чи може користувач виконувати цей запит.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валідації нотатки.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:5'],
            'status' => ['required', Rule::in(array_keys(Note::STATUSES))],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
        ];
    }

    /**
     * Власні повідомлення про помилки.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Вкажіть заголовок нотатки.',
            'title.min' => 'Заголовок має містити щонайменше :min символи.',
            'title.max' => 'Заголовок не може бути довшим за :max символів.',
            'description.required' => 'Текст нотатки не може бути порожнім.',
            'description.min' => 'Текст нотатки має містити щонайменше :min символів.',
            'status.required' => 'Оберіть статус.',
            'status.in' => 'Обрано недопустимий статус.',
            'due_date.date' => 'Термін виконання має бути коректною датою.',
            'due_date.after_or_equal' => 'Термін виконання не може бути в минулому.',
        ];
    }
}
