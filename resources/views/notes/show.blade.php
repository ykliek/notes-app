<x-layout :title="$note->title">
    <a href="/notes" class="btn btn-ghost btn-sm mb-4">&larr; До списку</a>

    <div class="card bg-base-100 shadow-sm">
        <div class="card-body">
            <div class="flex flex-wrap items-center gap-3">
                <h1 class="card-title text-2xl">{{ $note->title }}</h1>
                <x-status-badge :status="$note->status" />
            </div>
            @if ($note->due_date)
                <p class="text-sm text-base-content/60">Термін: {{ $note->due_date->format('d.m.Y') }}</p>
            @endif
            <div class="divider my-1"></div>
            <p class="whitespace-pre-line">{{ $note->description }}</p>
            <p class="text-xs text-base-content/50 mt-4">Створено: {{ $note->created_at->format('d.m.Y H:i') }}</p>

            <div class="card-actions justify-end mt-4">
                <a href="/notes/{{ $note->id }}/edit" class="btn btn-outline">Редагувати</a>
                <button type="button" class="btn btn-error" onclick="delete_modal.showModal()">Видалити</button>
            </div>
        </div>
    </div>

    <dialog id="delete_modal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Видалити нотатку?</h3>
            <p class="py-4">Нотатку «{{ $note->title }}» буде видалено без можливості відновлення.</p>
            <div class="modal-action">
                <form method="dialog"><button class="btn">Скасувати</button></form>
                <form method="POST" action="/notes/{{ $note->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error">Так, видалити</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>
</x-layout>
