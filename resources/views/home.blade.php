<x-layout title="Нотатки">
    <h1>Мої нотатки</h1>

    <form method="POST" action="/notes">
        @csrf
        <label for="note">Нова нотатка</label>
        <textarea id="note" name="note" placeholder="Що потрібно запам'ятати?"></textarea>
        <button type="submit">Зберегти</button>
    </form>

    <h2>Збережені ({{ count($notes) }})</h2>
    @forelse ($notes as $note)
        <div class="card">{{ $note }}</div>
    @empty
        <p>Нотаток поки немає — додайте першу.</p>
    @endforelse
</x-layout>
