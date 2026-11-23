<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    /**
     * Форма входу.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Вхід: створення сесії користувача.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Вкажіть email.',
            'email.email' => 'Email має бути коректною адресою.',
            'password.required' => 'Вкажіть пароль.',
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            // Не повідомляємо, яке саме поле неправильне
            throw ValidationException::withMessages([
                'email' => 'Невірний email або пароль.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/notes');
    }

    /**
     * Вихід: знищення сесії.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
