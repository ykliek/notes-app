<x-layout title="Про застосунок">
    <div class="hero bg-base-100 rounded-box shadow-sm">
        <div class="hero-content text-center py-12">
            <div class="max-w-xl">
                <h1 class="text-4xl font-bold">Про застосунок</h1>
                <p class="py-4 text-lg">Привіт, {{ $person }}!</p>
                <p class="text-base-content/70">Notes App — навчальний застосунок для ведення нотаток,
                    який розробляється протягом курсу «Програмування на базі Laravel».</p>
                @if (count($features) > 0)
                    <ul class="mt-6 flex flex-wrap justify-center gap-2">
                        @foreach ($features as $feature)
                            <li class="badge badge-outline badge-lg">{{ $loop->iteration }}. {{ $feature }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-layout>
