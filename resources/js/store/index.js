import Vuex from 'vuex'
import Vue from 'vue'

import stores from './modules/stores'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
       stores
    }
})
