'use strict'

import VueRouter from 'vue-router'
import configRouter from './routes.js'

const router = new VueRouter({
	// mode: 'history',
    routes: configRouter()
})

export default router;