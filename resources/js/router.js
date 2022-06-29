import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import AboutComponent from './pages/AboutComponent';
import ArticlesComponent from './pages/ArticlesComponent';
import ContactComponent from './pages/ContactComponent';
import SingleArticleComponent from './pages/SingleArticleComponent';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            meta: {nome: 'Agostino'},
            component: HomeComponent
        },
        {
            path: '/about',
            name: 'about',
            component: AboutComponent
        },
        {
            path: '/articles',
            name: 'articles',
            component: ArticlesComponent
        },
        {
            path: '/contact',
            name: 'contact',
            component: ContactComponent
        },
        {
            path: '/articles/:slug',
            name: 'single-article',
            component: SingleArticleComponent
        }
    ]
});

export default router;