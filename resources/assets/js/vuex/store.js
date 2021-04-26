import Vue from 'vue'
import Vuex from 'vuex'

import Customers from './modules/customers/customers'
import preloader from './modules/preloader/preloader'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules:{
        customers: Customers,
        preloader
    }
})
export default store