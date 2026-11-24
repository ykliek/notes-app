# Notes App

Навчальний застосунок «Нотатки» на Laravel 13, виконаний у межах дисципліни
«Програмування на базі Laravel» (Клєк Юрій, група КН-23-1, КНУБА).

Можливості: Blade-компоненти та layout, CRUD нотаток (Eloquent, resource-контролер,
Form Request), REST API (Sanctum), Tailwind CSS 4 + daisyUI 5, реєстрація/вхід,
middleware `auth`/`guest`, зв'язки `User hasMany Note`, gate `view-admin`, `NotePolicy`
з `denyAsNotFound`, Sass reset через Vite, сповіщення `NotePublished` (mail + database)
у черзі, тести Pest.

## Вимоги

- PHP 8.3+ (розширення pdo_sqlite), Composer 2
- Node.js 20+ і npm
- (необов'язково) Mailpit — локальна «тестова поштова скринька»

## Запуск

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed       # демо-користувачі: yurii@example.com (адмін), olena@example.com; пароль Secret123
npm run build
php artisan serve                # http://127.0.0.1:8000/notes
```

Для розробки можна запустити все разом: `composer run dev` (сервер, черга, Vite).

### Пошта та черга

За замовчуванням (`.env.example`) пошта пишеться в `storage/logs/laravel.log` (`MAIL_MAILER=log`).
Щоб бачити листи в тестовій скриньці:

```bash
brew install mailpit && mailpit          # веб-інтерфейс: http://127.0.0.1:8025
```

і в `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
```

Сповіщення `NotePublished` реалізує `ShouldQueue`, тому листи надсилає worker:

```bash
php artisan queue:work
```

### Тести

```bash
php artisan test
```

### API

```bash
php artisan tinker --execute='echo App\Models\User::first()->createToken("cli")->plainTextToken;'
curl -H "Accept: application/json" -H "Authorization: Bearer <token>" http://127.0.0.1:8000/api/notes
```

## Публікація на GitHub

Репозиторій ініціалізовано локально, віддаленого (remote) ще немає. Щоб опублікувати:

1. Створіть порожній репозиторій на GitHub (без README/.gitignore), наприклад `notes-app`.
2. Виконайте в цій папці:

```bash
git remote add origin https://github.com/<ваш-логін>/notes-app.git
git branch -M main
git push -u origin main
```

Або, якщо встановлено GitHub CLI: `gh repo create notes-app --private --source=. --push`.

## Історія комітів

Кожна лекція/вправа оформлена окремим комітом (`git log --oneline`).
