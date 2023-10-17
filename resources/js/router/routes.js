import HomePage from "../components/HomePage.vue";
import AdminPanel from "../components/AdminPanel/AdminPanel.vue";

export default [
    {
        path: '/home-page',
        name: 'HomePage',
        component: HomePage,
    },
    {
        path: '/news',
    },
    {
        path: '/admin',
        name: 'AdminPanel',
        component: AdminPanel
    }
]
