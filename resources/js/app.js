import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import ToastComponent from '../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts'
import aos from 'aos';

Alpine.data('ToastComponent', ToastComponent)
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

// init AOS
aos.init({
    once: true
});