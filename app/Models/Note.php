<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    public const STATUSES = [
        'pending' => 'Очікує',
        'in_progress' => 'В роботі',
        'done' => 'Виконано',
    ];

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'due_date' => 'date',
        ];
    }

    /**
     * Власник нотатки (notes.user_id -> users.id).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }
}
