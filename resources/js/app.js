/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const axios = require('axios').default;
window.Vue = require('vue').default;
import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)
import money from 'v-money'
import Vue from 'vue';
Vue.use(money, { precision: 4 })

Vue.prototype.$formatMoney = function(value) {
    value = value / 100;
    value = value.toFixed(2);
    return (value.toString().replace(".", ","))
}

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import Toaster from 'v-toaster'
 
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'
import ToggleButton from 'vue-js-toggle-button'
import VJsoneditor from 'v-jsoneditor/src/index'

// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 5000});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(ToggleButton);
Vue.use(VJsoneditor);
const app = new Vue({
    el: '#app',
});