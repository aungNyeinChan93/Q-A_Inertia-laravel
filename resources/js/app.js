import "./bootstrap";
import 'primeicons/primeicons.css'

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import Master from "./Pages/Layout/Master.vue";
import {ZiggyVue} from '../../vendor/tightenco/ziggy';


createInertiaApp({
    title: (title) => `${title} - My App `,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];
        if (page) {
            page.default.layout = page.default.layout || Master;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Head",Head)
            .component('Link',Link)
            .use(ZiggyVue)
            .mount(el);
    },
});
