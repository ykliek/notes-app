<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Демонстраційні дані: адміністратор і звичайний користувач (пароль: Secret123).
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Юрій Клєк',
            'email' => 'yurii@example.com',
            'password' => 'Secret123',
        ]);
        $admin->forceFill(['is_admin' => true])->save();

        $admin->notes()->createMany([
            ['title' => 'Огляд ринку КВЕД 46.90', 'description' => 'Зібрати дані Держстату за 2021–2024 роки.', 'status' => 'in_progress', 'due_date' => now()->addWeeks(2)],
            ['title' => 'Митна статистика', 'description' => 'Оновити вибірку імпорту за кодами УКТЗЕД.', 'status' => 'pending'],
        ]);

        $user = User::factory()->create([
            'name' => 'Олена Петренко',
            'email' => 'olena@example.com',
            'password' => 'Secret123',
        ]);

        $user->notes()->create([
            'title' => 'Особиста нотатка Олени',
            'description' => 'Цю нотатку має бачити лише Олена.',
            'status' => 'pending',
        ]);
    }
}
