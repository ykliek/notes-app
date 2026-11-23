<x-layout :title="$note->title">
    <p><a href="/notes">&larr; До списку</a></p>
    <h1>{{ $note->title }}</h1>
    <p>Статус: <strong>{{ $note->statusLabel() }}</strong>
        @if ($note->due_date) · Термін: {{ $note->due_date->format('d.m.Y') }} @endif
    </p>
    <div class="card">{!! nl2br(e($note->description)) !!}</div>
    <p style="color:#888">Створено: {{ $note->created_at->format('d.m.Y H:i') }}</p>

    <a href="/notes/{{ $note->id }}/edit">Редагувати</a>
    <form method="POST" action="/notes/{{ $note->id }}" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>
</x-layout>
