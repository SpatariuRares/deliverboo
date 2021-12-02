window.Vue = require('vue');
window.axios = require('axios');

import vueBraintree from 'vue-braintree'

import Menu from './views/Menu';
Vue.use(vueBraintree)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#menu',
    render: h =>h(Menu)
});