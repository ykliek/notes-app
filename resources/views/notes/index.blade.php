<x-layout title="Нотатки">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Мої нотатки</h1>
        @can('create', App\Models\Note::class)
            <a href="/notes/create" class="btn btn-primary">+ Нова нотатка</a>
        @endcan
    </div>

    <div class="grid gap-4 md:grid-cols-2">
        @forelse ($notes as $note)
            <div class="card bg-base-100 shadow-sm hover:shadow-md transition">
                <div class="card-body">
                    <h2 class="card-title">
                        <a href="/notes/{{ $note->id }}" class="link link-hover">{{ $note->title }}</a>
                    </h2>
                    <p class="text-base-content/70">{{ Str::limit($note->description, 120) }}</p>
                    <div class="card-actions items-center justify-between mt-2">
                        <div class="flex items-center gap-2">
                            <x-status-badge :status="$note->status" />
                            @if ($note->due_date)
                                <span class="text-sm text-base-content/60">до {{ $note->due_date->format('d.m.Y') }}</span>
                            @endif
                        </div>
                        @can('update', $note)
                            <a href="/notes/{{ $note->id }}/edit" class="btn btn-ghost btn-xs">Редагувати</a>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <div role="alert" class="alert md:col-span-2">
                <span>Нотаток поки немає — створіть першу.</span>
            </div>
        @endforelse
    </div>
</x-layout>
