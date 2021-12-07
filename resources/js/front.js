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
    el: '#app',
    render: h =>h(Restaurant)
});

import Chart from 'chart.js/auto';

const ctx = document.getElementById('myChart');

const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'guadagni giornaglieri',
            data: data,
            fill: true,
            backgroundColor: [
                'rgba(0,0, 0 )',
            ],
            borderColor: [
                'blue',
            ],
            borderWidth: 5
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
    },

});