import { createApp, h } from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import Layout from "./Pages/Shared/Layout.vue";
import 'boxicons';

Vue.config.productionTip = false;

const app = createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

        let page = pages[`./Pages/${name}.vue`].default

        page.layout??=Layout;

        return pages[`./Pages/${name}.vue`]
    },
    title: title => `Bichig chat`,
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})


