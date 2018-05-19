require('./bootstrap');

window.Vue = require('vue');



Vue.component('books', require('./components/Books.vue'));
Vue.component('navbar', require('./components/Navbar.vue'));

const app = new Vue({
    el: '#app'
});
