import {createWebHistory, createRouter} from 'vue-router';
import routes from './routes'
// import App from "../App.vue";
import MainPage from "../components/MainPage.vue";

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.addRoute("/", { path: "/", component: MainPage });

export default router;
