<x-layout title="Редагування">
    <h1>Редагування нотатки</h1>

    <form method="POST" action="/notes/{{ $note->id }}" novalidate>
        @csrf
        @method('PATCH')
        @include('notes._fields', ['note' => $note])
        <button type="submit">Оновити</button>
        <a href="/notes/{{ $note->id }}">Скасувати</a>
    </form>
</x-layout>
