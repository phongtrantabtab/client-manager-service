import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue';
import {createInertiaApp, usePage} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import i18n from './i18n';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} ${title ? '-' : ''} ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        // Get Locale from props
        const inertiaData = props.initialPage.props;
        i18n.global.locale = inertiaData.locale;

        app.use(plugin);
        app.use(ZiggyVue);
        app.use(i18n);
        app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
