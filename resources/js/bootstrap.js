import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'd32f9b0ea3e5bd4c67d9',
    cluster: 'ap3',
    forceTLS: true
});
