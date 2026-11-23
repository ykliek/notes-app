@props(['title' => 'Notes App'])
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Notes App</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 760px; margin: 0 auto; padding: 0 16px; color: #222; background: #fafafa; }
        nav { display: flex; gap: 16px; padding: 16px 0; border-bottom: 1px solid #ddd; margin-bottom: 24px; }
        nav a { color: #555; text-decoration: none; }
        nav a.active { color: #000; font-weight: 700; }
        .card { background: #fff; border: 1px solid #e3e3e3; border-radius: 8px; padding: 12px 16px; margin: 8px 0; }
        textarea { width: 100%; min-height: 80px; padding: 8px; box-sizing: border-box; }
        button { padding: 8px 16px; margin-top: 8px; cursor: pointer; }
        footer { margin-top: 40px; padding: 16px 0; border-top: 1px solid #ddd; color: #888; font-size: 14px; }
    </style>
</head>
<body>
    <nav>
        <x-nav-link href="/notes" :active="request()->is('notes')">Нотатки</x-nav-link>
        <x-nav-link href="/notes/create" :active="request()->is('notes/create')">Нова нотатка</x-nav-link>
        <x-nav-link href="/about" :active="request()->is('about')">Про застосунок</x-nav-link>
        <x-nav-link href="/contact" :active="request()->is('contact')">Контакти</x-nav-link>
    </nav>

    <main {{ $attributes->merge(['class' => 'content']) }}>
        {{ $slot }}
    </main>

    <footer>Notes App &copy; {{ date('Y') }} — Клєк Юрій, КН-23-1</footer>
</body>
</html>
