const SET_UTIL = "SET_UTIL";
const LOADING_SHOW = "LOADING_SHOW";
const LOADING_HIDE = "LOADING_HIDE";

const state = {
	url: '',
}

const mutations = {
	[SET_UTIL] (state, payload) {
		state.url = payload;
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
	setUtil({ commit, state }) {
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

}

export default {
	// namespaced: true,
	state,
	mutations,
	actions,
	getters
}