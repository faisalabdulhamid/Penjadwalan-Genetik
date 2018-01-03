'use strict'

const LOADING = "LOADING";
const LOADING_SHOW = "LOADING_SHOW";
const LOADING_HIDE = "LOADING_HIDE";

const state = {
	loading: {
		title: 'Full Loading Spinner',
	    subTitle: 'Vue Component',
	    teamUrl: 'https://github.com/PygmySlowLoris',
	    repoUrl: 'https://github.com/PygmySlowLoris/vue-full-loading',
	    dependencies: [
	        {
	            name: 'bulma',
	            url: 'http://bulma.io'
	        }
	    ],
	    show: false,
	    label: 'Loading...',
	    timeout: 2000,
	    overlay: true
	}
}

const mutations = {
	[LOADING] (state) {
		state.loading.pending = true;
    },
    [LOADING_SHOW] (state) {
    	state.loading.show = true
    },
    [LOADING_HIDE](state) {
		state.loading.show = false;
		state.loading.pending = false
	}
}

const actions = {
	showLoading({ commit, state }) {
		// commit(LOADING)
		commit(LOADING_SHOW)
		// return new Promise((resolve) => {
		// 	setTimeout(() => {
		// 		commit(LOADING_HIDE)
		// 		resolve()
		// 	}, state.loading.timeout)
		// })
	},
	hideLoading({ commit }) {
		commit(LOADING_HIDE)	
	}
}

const getters = {
	title: state => {
		return state.loading.title
	},
	subTitle: state => {
		return state.loading.subTitle
	},
	teamUrl: state => {
		return state.loading.teamUrl
	},
	repoUrl: state => {
		return state.loading.repoUrl
	},
	dependencies: state => {
		return state.loading.dependencies
	},
	show: state => {
		return state.loading.show
	},
	label: state => {
		return state.label
	},
	timeOut: state => {
		return state.loading.timeOut
	},
	overlay: state => {
		return state.loading.overlay
	}
}

export default {
	// namespaced: true,
	state,
	mutations,
	actions,
	getters
}