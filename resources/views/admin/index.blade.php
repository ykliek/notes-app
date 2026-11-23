<x-layout title="Адмін-панель">
    <h1 class="text-3xl font-bold mb-6">Адмін-панель</h1>

    <div class="stats shadow mb-6 bg-base-100">
        <div class="stat">
            <div class="stat-title">Користувачів</div>
            <div class="stat-value">{{ $users->count() }}</div>
        </div>
        <div class="stat">
            <div class="stat-title">Нотаток</div>
            <div class="stat-value">{{ $notesCount }}</div>
        </div>
    </div>

    <div class="overflow-x-auto bg-base-100 rounded-box shadow-sm">
        <table class="table">
            <thead>
                <tr><th>#</th><th>Ім'я</th><th>Email</th><th>Роль</th><th>Нотаток</th></tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->is_admin)
                                <span class="badge badge-primary">admin</span>
                            @else
                                <span class="badge badge-ghost">user</span>
                            @endif
                        </td>
                        <td>{{ $user->notes_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
