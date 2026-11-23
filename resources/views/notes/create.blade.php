<x-layout title="Нова нотатка">
    <div class="card bg-base-100 shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-2xl">Нова нотатка</h1>

            <form method="POST" action="/notes" novalidate class="space-y-2">
                @csrf
                @include('notes._fields')
                <div class="card-actions justify-end pt-4">
                    <a href="/notes" class="btn btn-ghost">Скасувати</a>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
