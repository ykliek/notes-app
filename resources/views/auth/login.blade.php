<x-layout title="Вхід">
    <div class="card bg-base-100 shadow-sm max-w-md mx-auto">
        <div class="card-body">
            <h1 class="card-title text-2xl">Вхід</h1>

            <form method="POST" action="/login" novalidate>
                @csrf

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Email</legend>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="input w-full @error('email') input-error @enderror">
                    <x-error name="email" />
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Пароль</legend>
                    <input id="password" type="password" name="password" class="input w-full @error('password') input-error @enderror">
                    <x-error name="password" />
                </fieldset>

                <label class="label mt-2">
                    <input type="checkbox" name="remember" class="checkbox checkbox-sm"> Запам'ятати мене
                </label>

                <button type="submit" class="btn btn-primary w-full mt-4">Увійти</button>
            </form>
            <p class="text-sm text-center mt-2">Немає акаунта? <a href="/register" class="link link-primary">Зареєструватися</a></p>
        </div>
    </div>
</x-layout>
