require('./bootstrap');

window.Vue = require('vue');



Vue.component('books', require('./components/Books.vue'));
Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('book', require('./components/Book.vue'));

const app = new Vue({
    el: '#app'
});
