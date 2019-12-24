/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require('vue');
require('./bootstrap');

import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue';

// import components
import RareViewer from './components/RareViewer';
import BadgeViewer from "./components/BadgeViewer";
import PageNotFound from './components/PageNotFound';

Vue.use(BootstrapVue);
Vue.use(VueRouter);

// routing
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: RareViewer,
            props: { title: 'All Rares' }
        },
        {
            path: '/rare/:slug',
            name: 'rare',
            component: RareViewer,
            props: { title: 'All Rares' }
        },
        {
            path: '/rares/released',
            name: 'released',
            component: RareViewer,
            props: { released: true, title: 'Released Rares' }
        },
        {
            path: '/badges',
            name: 'badges',
            component: BadgeViewer,
        },
        {
            path: '/badge/:slug',
            name: 'badge',
            component: BadgeViewer
        },
        // 404
        {
            path: "*",
            component: PageNotFound
        }
    ],
});

const app = new Vue({
    el: '#app',
    router
});
