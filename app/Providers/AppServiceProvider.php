<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Адмін-панель доступна лише адміністраторам; іншим — 404, щоб не розкривати її існування
        Gate::define('view-admin', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::denyAsNotFound();
        });
    }
}
