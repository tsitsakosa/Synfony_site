import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.css'

import Vue from 'vue'

import App from '../../src/Fontend/App'

Vue.config.productionTip = false

new Vue({
    render: h => h(App),
}).$mount('#app')

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
