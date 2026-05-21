import Alpine from 'alpinejs';
import './dll-offline';

window.Alpine = Alpine;

if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').catch(() => null);
    });
}

Alpine.start();
