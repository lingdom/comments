
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');
window.axios = axios;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('post', require('./components/Post.vue'));
Vue.component('post-list', require('./components/PostList.vue'));
Vue.component('comment', require('./components/Comment.vue'));

import { store } from './store';

const app = new Vue({
    el: '#app',
    store: store,
});