import {BootstrapVue, NavbarPlugin} from "bootstrap-vue";
require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router';

import router from './Router/index'
import store from './Store/index';
import App from './App.vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Navbar from "./Components/Navbar";

Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(NavbarPlugin)

import {authService} from './Services';

authService.checkAuth().then(user => {
    store.commit('LOGIN')
}, () => {
    store.commit('LOGOUT')
})

new Vue({
    el: '#app',
    router,
    store,
    components: {App, Navbar}
});
