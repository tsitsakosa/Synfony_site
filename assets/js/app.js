import Vue from 'vue'
import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.css';
import {CardPlugin} from 'bootstrap-vue'
import FeedApp from '../../src/Fontend/App'
import SocketApp from '../../src/Fontend/AppSockect'

Vue.use(CardPlugin)
Vue.config.productionTip = false

let bodyId = document.getElementsByTagName("body")[0].id;
let myApp = FeedApp;

if (bodyId === "WebSocket") {
    myApp = SocketApp;
}
new Vue({
    render: h => h(myApp),
}).$mount('#app');