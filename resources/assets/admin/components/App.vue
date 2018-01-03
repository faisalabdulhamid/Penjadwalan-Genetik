<template>
	<div>
		<Navbar 
			v-bind:app_name='app_name'
			></Navbar>

		<Sidebar/>
		
		<router-view/>
	</div>
</template>

<script>
	import {app_name, base_url, author, timeout} from './../config/env.js'

	export default {
		name: 'App-Main',
		components: {
			'Navbar': function (resolve) {
				require(['./Navbar'], resolve)
				
			},
			'Sidebar': function (resolve) {
				require(['./Sidebar'], resolve)
			},
		},
		data(){
			return {
				app_name: app_name,
				author: author,
			}
		}
	}
</script>