require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'composters.index',
            component: () => import('./components/Composter/index.vue')
        },
        {
            path: '/composteur/:slug',
            name: 'composters.show',
            component: () => import('./components/Composter/show.vue')
        }
    ]
});

const app = new Vue({
    router,
    el: '#app'
});
