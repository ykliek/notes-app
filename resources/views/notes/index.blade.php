<x-layout title="Нотатки">
    <h1>Мої нотатки</h1>
    <p><a href="/notes/create">+ Створити нотатку</a></p>

    @forelse ($notes as $note)
        <div class="card">
            <a href="/notes/{{ $note->id }}"><strong>{{ $note->title }}</strong></a>
            <small style="color:#666"> — {{ $note->statusLabel() }}@if ($note->due_date), до {{ $note->due_date->format('d.m.Y') }}@endif</small>
            <p>{{ Str::limit($note->description, 120) }}</p>
        </div>
    @empty
        <p>Нотаток поки немає.</p>
    @endforelse
</x-layout>
