<?php

use App\Models\Note;
use App\Models\User;
use App\Notifications\NotePublished;
use Illuminate\Support\Facades\Notification;

test('гість перенаправляється на сторінку входу', function () {
    $this->get('/notes')->assertRedirect('/login');
});

test('реєстрація створює користувача з хешованим паролем і виконує вхід', function () {
    $this->post('/register', [
        'name' => 'Тест',
        'email' => 'test@example.com',
        'password' => 'Secret123',
        'password_confirmation' => 'Secret123',
    ])->assertRedirect('/notes');

    $user = User::where('email', 'test@example.com')->first();
    expect($user)->not->toBeNull()
        ->and($user->password)->not->toBe('Secret123');
    $this->assertAuthenticatedAs($user);
});

test('користувач бачить лише власні нотатки', function () {
    $me = User::factory()->create();
    $other = User::factory()->create();
    $me->notes()->create(['title' => 'Моя нотатка', 'description' => 'Текст моєї нотатки']);
    $other->notes()->create(['title' => 'Чужа нотатка', 'description' => 'Текст чужої нотатки']);

    $this->actingAs($me)->get('/notes')
        ->assertOk()
        ->assertSee('Моя нотатка')
        ->assertDontSee('Чужа нотатка');
});

test('чужа нотатка повертає 404 для перегляду, редагування та видалення', function () {
    $other = User::factory()->create();
    $note = $other->notes()->create(['title' => 'Чужа', 'description' => 'Не для вас']);
    $me = User::factory()->create();

    $this->actingAs($me)->get("/notes/{$note->id}")->assertNotFound();
    $this->actingAs($me)->get("/notes/{$note->id}/edit")->assertNotFound();
    $this->actingAs($me)->delete("/notes/{$note->id}")->assertNotFound();
    expect(Note::find($note->id))->not->toBeNull();
});

test('збереження нотатки валідує дані та надсилає NotePublished власнику', function () {
    Notification::fake();
    $user = User::factory()->create();

    $this->actingAs($user)->post('/notes', ['title' => 'Ок'])
        ->assertSessionHasErrors(['title', 'description']);

    $this->actingAs($user)->post('/notes', [
        'title' => 'Нова нотатка',
        'description' => 'Опис нової нотатки',
        'status' => 'pending',
    ])->assertRedirect('/notes');

    expect($user->notes()->count())->toBe(1);
    Notification::assertSentTo($user, NotePublished::class);
});

test('адмін-панель доступна лише адміністратору', function () {
    $user = User::factory()->create();
    $admin = User::factory()->create();
    $admin->forceFill(['is_admin' => true])->save();

    $this->actingAs($user)->get('/admin')->assertNotFound();
    $this->actingAs($admin)->get('/admin')->assertOk();
});

test('API повертає 201 при створенні та 401 без токена', function () {
    $this->postJson('/api/notes', [])->assertUnauthorized();

    $user = User::factory()->create();
    $this->actingAs($user, 'sanctum')
        ->postJson('/api/notes', ['title' => 'API', 'description' => 'Через API', 'status' => 'done'])
        ->assertCreated()
        ->assertJsonPath('user_id', $user->id);
});
