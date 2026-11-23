<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Показати форму реєстрації.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Обробити реєстрацію: валідація -> створення користувача -> вхід.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ], [
            'name.required' => "Вкажіть ім'я.",
            'email.required' => 'Вкажіть email.',
            'email.email' => 'Email має бути коректною адресою.',
            'email.unique' => 'Користувач з таким email вже існує.',
            'password.required' => 'Вкажіть пароль.',
            'password.confirmed' => 'Паролі не збігаються.',
            'password.min' => 'Пароль має містити щонайменше :min символів.',
            'password.letters' => 'Пароль має містити хоча б одну літеру.',
            'password.numbers' => 'Пароль має містити хоча б одну цифру.',
        ]);

        $user = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
        ]);

        Auth::login($user);

        return redirect('/notes')->with('status', 'Реєстрація успішна. Ласкаво просимо, '.$user->name.'!');
    }
}
