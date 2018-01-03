'use strict'

require('./bootstrap')

window.Vue = require('vue')
import {base_url} from './config/env'

import VueRouter from 'vue-router'
import router from './router/router.js'
// import store from './store/index.js'
Vue.use(VueRouter)

import Datatable from 'vue2-datatable-component'
Vue.use(Datatable)


const swal = require('sweetalert2')
const swalPlugin = {}
swalPlugin.install = function(Vue){
	Vue.prototype.$swal = swal
}
Vue.use(swalPlugin)
var _http = axios.create({
    baseURL: `${base_url}`
});
_http.interceptors.response.use((response) => {
    if (response.status == 201) {
        swal(response.data.title, response.data.message, 'success')    
    }
    return response;
}, function (error) {
    if (error.response.status === 422) {
    	var contentHtml = '';
        Object.keys(error.response.data.errors).forEach((key) => {
          contentHtml +=  '<p class="text-danger">'+error.response.data.errors[key][0]+'</p>'
        })
        
        swal({
          title: error.response.data.message,
          html: contentHtml,
          type: 'error',
          timer: 5000,
        })	
    }else{
    	swal(error.response.statusText, error.response.data.message, "error")
    }
    return Promise.reject(error.response);
})
Vue.prototype.$http = _http
Vue.config.productionTip = false


const app = new Vue({
    el: '#root',
    template: '<App/>',
    components: {
    	'App': function (resolve) {
    		require(['./components/App'], resolve)
    	}
    },
    // store,
    router
});
