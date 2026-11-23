<x-layout title="Компоненти daisyUI">
    <h1 class="text-3xl font-bold mb-2">Тестова сторінка компонентів daisyUI</h1>
    <p class="mb-6 text-base-content/70">Поточна тема: <code class="badge badge-ghost" id="theme-name">{{ $theme }}</code>.
        Змініть тему у перемикачі на панелі навігації або параметром <code>?theme=</code>.</p>

    {{-- Buttons --}}
    <section class="card bg-base-100 shadow-sm mb-6">
        <div class="card-body">
            <h2 class="card-title">Button</h2>
            <div class="flex flex-wrap gap-2">
                <button class="btn">Default</button>
                <button class="btn btn-primary">Primary</button>
                <button class="btn btn-secondary">Secondary</button>
                <button class="btn btn-accent">Accent</button>
                <button class="btn btn-success">Success</button>
                <button class="btn btn-error">Error</button>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <button class="btn btn-primary btn-outline">Outline</button>
                <button class="btn btn-primary btn-soft">Soft</button>
                <button class="btn btn-primary btn-dash">Dash</button>
                <button class="btn btn-ghost">Ghost</button>
                <button class="btn btn-link">Link</button>
                <button class="btn btn-xs">XS</button>
                <button class="btn btn-sm">SM</button>
                <button class="btn btn-lg">LG</button>
            </div>
        </div>
    </section>

    {{-- Navbar --}}
    <section class="card bg-base-100 shadow-sm mb-6">
        <div class="card-body">
            <h2 class="card-title">Navbar</h2>
            <div class="navbar bg-neutral text-neutral-content rounded-box">
                <div class="navbar-start"><a class="btn btn-ghost text-lg">Brand</a></div>
                <div class="navbar-center"><ul class="menu menu-horizontal"><li><a>Головна</a></li><li><a>Звіти</a></li></ul></div>
                <div class="navbar-end"><button class="btn btn-primary btn-sm">Увійти</button></div>
            </div>
        </div>
    </section>

    <div class="grid gap-6 md:grid-cols-2 mb-6">
        {{-- Card --}}
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Card <span class="badge badge-secondary">NEW</span></h2>
                <p>Картка з card-body, card-title та card-actions — основа списку нотаток.</p>
                <div class="card-actions justify-end"><button class="btn btn-primary btn-sm">Відкрити</button></div>
            </div>
        </div>

        {{-- Input --}}
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Input</h2>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Заголовок</legend>
                    <input class="input w-full" placeholder="Звичайне поле">
                </fieldset>
                <input class="input input-primary w-full" placeholder="input-primary">
                <input class="input input-error w-full" placeholder="input-error">
            </div>
        </div>
    </div>

    {{-- Alerts --}}
    <section class="card bg-base-100 shadow-sm mb-6">
        <div class="card-body gap-2">
            <h2 class="card-title">Alert</h2>
            <div role="alert" class="alert alert-info"><span>Інформаційне повідомлення.</span></div>
            <div role="alert" class="alert alert-success"><span>Нотатку збережено.</span></div>
            <div role="alert" class="alert alert-warning"><span>Термін виконання спливає завтра.</span></div>
            <div role="alert" class="alert alert-error"><span>Не вдалося зберегти нотатку.</span></div>
        </div>
    </section>

    {{-- Modal --}}
    <section class="card bg-base-100 shadow-sm">
        <div class="card-body">
            <h2 class="card-title">Modal</h2>
            <button class="btn btn-primary w-fit" onclick="demo_modal.showModal()">Відкрити модальне вікно</button>
            <dialog id="demo_modal" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Модальне вікно</h3>
                    <p class="py-4">Нативний &lt;dialog&gt;, стилізований класами modal / modal-box.</p>
                    <div class="modal-action"><form method="dialog"><button class="btn">Закрити</button></form></div>
                </div>
            </dialog>
        </div>
    </section>

    @if (request('theme'))
        <script>
            document.documentElement.dataset.theme = @json(request('theme'));
            document.querySelector('[data-theme-switcher]').value = @json(request('theme'));
        </script>
    @endif
</x-layout>
