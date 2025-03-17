import {createRouter, createWebHistory} from "vue-router";

import HomePage from "@/components/HomePage.vue";
import AboutPage from "@/components/AboutPage.vue";
import NotFound from "@/components/NotFound.vue";

const routes = [
    {path: '/', component: HomePage},
    {path: '/about', component: AboutPage},
    {path: '/:pathMatch(.*)*', component: NotFound},
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
