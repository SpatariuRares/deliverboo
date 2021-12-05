window.Vue = require('vue');
window.axios = require('axios');

import vueBraintree from 'vue-braintree'
import BootstrapVue from 'bootstrap-vue' //Importing

import Restaurant from './views/Restaurant';
Vue.use(vueBraintree)
Vue.use(BootstrapVue)



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const restaurant = new Vue({
    el: '#restaurant',
    render: h =>h(Restaurant)
});