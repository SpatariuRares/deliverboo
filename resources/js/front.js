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

const ctx = document.getElementById('barChar');

const barData = {
    labels: barLabels,
    datasets: [{
        label: 'guadagni giornaglieri',
        data: barOrderData,
        fill: true,
        backgroundColor: [
            'rgba(0,0, 0 ,0.2)',
        ],
        borderColor: [
            'blue',
        ],
        borderWidth: 1,
        tension:0.4,
    }]
}
let delayed;
const barConfig = {
    type: 'bar',
    data: barData,
    options: {
        radius: 5,
        hoverRadius:9,
        responsive:true,
        animation:{
            onComplete:()=>{
                delayed=true;
            },
            delay: (context)=>{
                let delay = 0;
                if(context.type==="data" && context.mode==="default" && !delayed){
                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value){
                        return "€"+value;
                    }
                }
            }

        }
    }
};

const barCha = new Chart(ctx, barConfig);


const dounuts = document.getElementById('doughnutChar');
const randomRGB =[]
for(let i=0; i<donOrderData.length; i++){
    const r = Math.floor(Math.random()*255); 
    const g = Math.floor(Math.random()*255);
    const b = Math.floor(Math.random()*255);
    randomRGB.push('rgba('+r+','+g+','+b+'0.2)')
}

const donData = {
    labels:donFoodLabels,
    datasets: [{
        data: donOrderData,
        fill: true,
        backgroundColor: randomRGB,
        borderColor: randomRGB,
    }]
}
console.log(donFoodLabels)
const donConfig = {
    type: 'doughnut',
    data: donData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Cibi piu venduti'
            }
        }
    },
};

const donChar = new Chart(dounuts, donConfig)