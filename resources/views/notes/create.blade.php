<x-layout title="Нова нотатка">
    <h1>Нова нотатка</h1>

    <form method="POST" action="/notes" novalidate>
        @csrf
        @include('notes._fields')
        <button type="submit">Зберегти</button>
    </form>
</x-layout>
