@props(['title' => 'Notes App'])
<!DOCTYPE html>
<html lang="uk" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Notes App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200 text-base-content flex flex-col">
    <div class="navbar bg-base-100 shadow-sm px-4">
        <div class="navbar-start">
            <a href="/notes" class="btn btn-ghost text-xl">📝 Notes App</a>
        </div>
        <div class="navbar-center hidden md:flex">
            <ul class="menu menu-horizontal px-1 gap-1">
                <li><x-nav-link href="/notes" :active="request()->is('notes')">Нотатки</x-nav-link></li>
                <li><x-nav-link href="/notes/create" :active="request()->is('notes/create')">Нова нотатка</x-nav-link></li>
                <li><x-nav-link href="/about" :active="request()->is('about')">Про застосунок</x-nav-link></li>
                <li><x-nav-link href="/contact" :active="request()->is('contact')">Контакти</x-nav-link></li>
            </ul>
        </div>
        <div class="navbar-end gap-2">
            <select class="select select-sm w-32" data-theme-switcher aria-label="Тема">
                @foreach (['light', 'dark', 'cupcake', 'corporate', 'synthwave', 'nord'] as $theme)
                    <option value="{{ $theme }}">{{ ucfirst($theme) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <main {{ $attributes->merge(['class' => 'container mx-auto max-w-4xl px-4 py-8 flex-1']) }}>
        @if (session('status'))
            <div role="alert" class="alert alert-success mb-6">
                <span>{{ session('status') }}</span>
            </div>
        @endif

        {{ $slot }}
    </main>

    <footer class="footer footer-center p-4 bg-base-100 text-base-content/60 text-sm">
        <p>Notes App &copy; {{ date('Y') }} — Клєк Юрій, КН-23-1</p>
    </footer>
</body>
</html>
