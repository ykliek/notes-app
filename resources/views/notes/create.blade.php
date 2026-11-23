<x-layout title="Нова нотатка">
    <h1>Нова нотатка</h1>

    <form method="POST" action="/notes">
        @csrf
        <p>
            <label for="title">Заголовок</label><br>
            <input id="title" name="title" value="{{ old('title') }}" style="width:100%;padding:8px">
        </p>
        <p>
            <label for="description">Текст</label><br>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </p>
        <button type="submit">Зберегти</button>
    </form>
</x-layout>
