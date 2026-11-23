<x-layout title="Редагування">
    <div class="card bg-base-100 shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-2xl">Редагування нотатки</h1>

            <form method="POST" action="/notes/{{ $note->id }}" novalidate class="space-y-2">
                @csrf
                @method('PATCH')
                @include('notes._fields', ['note' => $note])
                <div class="card-actions justify-end pt-4">
                    <a href="/notes/{{ $note->id }}" class="btn btn-ghost">Скасувати</a>
                    <button type="submit" class="btn btn-primary">Оновити</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
