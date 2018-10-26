/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('my-component', require('./components/MyComponent.vue'));
Vue.component('conditional-rendering', require('./components/conditionalRendering.vue'));
Vue.component('user-dashboard', require('./components/UserDashboard.vue'));
Vue.component('life-cycle', require('./components/LifeCycle.vue'));
Vue.component('re-render', require('./components/Re-renderDom.vue'));
Vue.component('binding-html', require('./components/BindingHTML.vue'));
Vue.component('input-binding', require('./components/InputBinding.vue'));
const app = new Vue({
    el: '#app',
    data: {
        message: 'passed data.message old to app.js'
    }
});
var app2 = new Vue({
    el: '#app-2',
    data: {
        message: 'You have opened this page at ' + new Date().toLocaleString()
    }
});