
require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import swal from 'sweetalert2'

window.swal = swal;

let Myheader = require('./components/Myheader.vue');
let Myfooter = require('./components/Myfooter.vue');

let routes = [
    { path: '/Home', component: require('./components/Home.vue') },
    { path: '/About', component: require('./components/About.vue') },
  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

// let Home = require('./components/Home.vue');
// let About = require('./components/About.vue');

const app = new Vue({
    el: '#app',
    router,
    components:{Myheader,Myfooter}
});
