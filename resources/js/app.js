/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue/dist/vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Tooltip, Toast, Popover } from 'bootstrap';
import Alert from 'bootstrap/js/dist/alert';
window.Vue = require('vue');

import VueRouter from 'vue-router';
import HelloWorld from './components/HelloWorld';
import { data } from 'jquery';


Vue.use(VueRouter);

const routes = [
    { path: '/hello-world', component: HelloWorld },
    { path: '/', component: require('./components/Blog.vue').default },
    { path: '/post/create', component: require('./components/posts/add.vue').default },
    { path: '/post/:id', component: require('./components/BlogPost.vue').default },
    { path: '/register', component: require('./components/RegisterForm.vue').default },
    { path: '/login', component: require('./components/LoginForm.vue').default }
];

const router = new VueRouter({
    mode: "history",
    routes
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('hello-world', require('./components/HelloWorld.vue').default);
Vue.component('navbar-menu', require('./components/Navbar.vue').default);
Vue.component('blog', require('./components/Blog.vue').default);
Vue.component('blog-post', require('./components/BlogPost.vue').default);
Vue.component('add-post', require('./components/posts/add.vue').default);
Vue.component('register-form', require('./components/RegisterForm.vue').default);
Vue.component('login-form', require('./components/LoginForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data: {
        title: 'Hello World!',
        content: 'Welcome to Laravel + Vue.js Blog',
        isLoggedIn: false,
    },
    methods: {
        url: (link) => '/' + link.trim('/'),
        checkAuth: async () => {
            await axios.get(window.location.origin + '/api/user', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Content-Type': 'application/json'
            }})
            .then((response) => { 
                data.isLoggedIn = true;
                localStorage.setItem('isLoggedIn', true);
            })
            .catch(function (error) {
                console.log(error);
                localStorage.setItem('intendTo', router.currentRoute.path),
                router.currentRoute.path != '/login' && router.replace('/login');
            });
        }
    },
    async beforeMount() {
        await this.checkAuth();
    },
});