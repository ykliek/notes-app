// Перемикач тем daisyUI: зберігаємо вибір у localStorage
const saved = localStorage.getItem('theme');
if (saved) document.documentElement.dataset.theme = saved;

document.addEventListener('change', (e) => {
    if (e.target.matches('[data-theme-switcher]')) {
        document.documentElement.dataset.theme = e.target.value;
        localStorage.setItem('theme', e.target.value);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const sw = document.querySelector('[data-theme-switcher]');
    if (sw && saved) sw.value = saved;
});
