import Profile from "../components/Profile.vue";
import AdminPanel from "../components/AdminPanel/AdminPanel.vue";
import MainPage from "../components/MainPage.vue";
import Block from "../components/Block.vue";
import Article from "../components/Articles/Article.vue";

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
        path: '/article/:authorId?/:textId?',
        name: 'article',
        component: Article,
        props: {
            authorId: 1
        }
    }
]
