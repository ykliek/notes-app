<x-layout title="Реєстрація">
    <div class="card bg-base-100 shadow-sm max-w-md mx-auto">
        <div class="card-body">
            <h1 class="card-title text-2xl">Реєстрація</h1>

            <form method="POST" action="/register" novalidate>
                @csrf

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Ім'я</legend>
                    <input id="name" name="name" value="{{ old('name') }}" class="input w-full @error('name') input-error @enderror">
                    <x-error name="name" />
                </fieldset>

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

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Підтвердження пароля</legend>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="input w-full">
                </fieldset>

                <button type="submit" class="btn btn-primary w-full mt-4">Зареєструватися</button>
            </form>
        </div>
    </div>
</x-layout>
