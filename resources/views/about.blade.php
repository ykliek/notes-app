<x-layout title="Про застосунок">
    <h1>Про застосунок</h1>
    <p>Привіт, {{ $person }}!</p>
    <p>Notes App — навчальний застосунок для ведення нотаток, який розробляється
       протягом курсу «Програмування на базі Laravel».</p>

    @if (count($features) > 0)
        <h2>Можливості</h2>
        <ul>
            @foreach ($features as $feature)
                <li>{{ $loop->iteration }}. {{ $feature }}</li>
            @endforeach
        </ul>
    @endif
</x-layout>
