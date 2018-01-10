<template>
	<div>
		<Navbar 
			v-bind:app_name='app_name'
			></Navbar>

		<Sidebar/>
		
		<router-view/>
		<loading
			:show="show"
			:label="label"
			:overlay="overlay"
			>
		</loading>
	</div>
</template>

<script>
	import {app_name, base_url, author, timeout} from './../config/env.js'
	import {mapGetters} from 'vuex'
	import loading from 'vue-full-loading'
	export default {
		name: 'App-Main',
		components: {
			'Navbar': function (resolve) {
				require(['./Navbar'], resolve)
				
			},
			'Sidebar': function (resolve) {
				require(['./Sidebar'], resolve)
			},
			loading
		},
		computed:{
			...mapGetters(['isLoggedIn', 
				'title', 'subTitle', 'teamUrl', 'repoUrl', 'show', 'dependencies', 'label', 'timeOut', 'overlay'])
		},
		data(){
			return {
				app_name: app_name,
				author: author,
			}
		}
	}
</script>