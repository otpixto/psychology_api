import '../css/app.css'
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import SiteLayout from "@/Site/Layouts/SiteLayout.vue";
import Layout from "@/Shared/Layout.vue";

createInertiaApp({
    resolve: name => {
        const modules = {
            Admin: import.meta.glob('./Admin/Pages/**/*.vue', { eager: true }),
            Site: import.meta.glob('./Site/Pages/**/*.vue', { eager: true })
        }

        return Object.values(modules).reduce((acc, pages) => {
            let page = null;
            let key = `./Admin/Pages/${name}.vue`;
            let isSiteModule = false;

            if (!acc && pages[key]) {
                page = pages[key]
            }

            key = `./Site/Pages/${name}.vue`;
            if (!acc && pages[key]) {
                page = pages[key]
                isSiteModule = true
            }

            if (page) {
                page.default.layout = isSiteModule ? SiteLayout : (name === 'Auth/Login' ? undefined : Layout);

                return page;
            }

            return acc
        }, null)
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
