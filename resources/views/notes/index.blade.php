<x-layout title="Нотатки">
    <h1>Мої нотатки</h1>
    <p><a href="/notes/create">+ Створити нотатку</a></p>

    @forelse ($notes as $note)
        <div class="card">
            <a href="/notes/{{ $note->id }}"><strong>{{ $note->title }}</strong></a>
            <p>{{ Str::limit($note->description, 120) }}</p>
        </div>
    @empty
        <p>Нотаток поки немає.</p>
    @endforelse
</x-layout>
