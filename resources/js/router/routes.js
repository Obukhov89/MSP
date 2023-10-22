import Profile from "../components/Profile.vue";
import AdminPanel from "../components/AdminPanel/AdminPanel.vue";
import MainPage from "../components/MainPage.vue";
import Block from "../components/Block.vue";

export default [
    {
        path: '/',
        name: 'MainPage',
        component: MainPage
    },

    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
    },
    {
        path: '/news',
        name: 'News',
        component: Block
    },
    {
        path: '/admin',
        name: 'AdminPanel',
        component: AdminPanel
    }
]
