import Profile from "../components/Profile.vue";
import AdminPanel from "../components/AdminPanel/AdminPanel.vue";
import MainPage from "../components/MainPage.vue";
import Block from "../components/Block.vue";
import Composition from "../components/Articles/Composition.vue";

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
    },
    {
        path: '/composition/:authorId?/:textId?',
        name: 'composition',
        component: Composition,
        props: {
            authorId: 1
        }
    }
]
