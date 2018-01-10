'use strict'

import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import loading from './plugins/loading'
import util from './plugins/util'

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules:{
        loading: loading,
        // util: util,
    },
    strict: debug,
});