
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Snotify from 'vue-snotify'
import router from './routes/routers'
import store from './vuex/store'


Vue.use(Snotify, {toast: {showProgressBar:false}})


// components globais
Vue.component('admin-component', require('./components/admin/AdminComponent'))
Vue.component('preloader-component', require('./components/layouts/PreloaderComponent'))

const app = new Vue({
    router,
    store,
    el: '#app'
});
