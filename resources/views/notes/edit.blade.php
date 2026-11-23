<x-layout title="Редагування">
    <h1>Редагування нотатки</h1>

    <form method="POST" action="/notes/{{ $note->id }}">
        @csrf
        @method('PATCH')
        <p>
            <label for="title">Заголовок</label><br>
            <input id="title" name="title" value="{{ old('title', $note->title) }}" style="width:100%;padding:8px">
        </p>
        <p>
            <label for="description">Текст</label><br>
            <textarea id="description" name="description">{{ old('description', $note->description) }}</textarea>
        </p>
        <button type="submit">Оновити</button>
        <a href="/notes/{{ $note->id }}">Скасувати</a>
    </form>
</x-layout>
