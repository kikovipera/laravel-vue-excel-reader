
import Vue from 'vue'
import store from './store'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false

import '../sass/app.scss'
import "@fortawesome/fontawesome-free/css/all.min.css";
new Vue({
    router,
    store,
  render: h => h(App)
}).$mount('#app')
