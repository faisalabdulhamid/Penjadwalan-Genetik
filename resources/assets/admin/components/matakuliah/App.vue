<template>
	<div class="content">
		<div class="header">
			<h1 class="page-title">{{ $route.meta.page }}</h1>
		</div>

		<Breadcrumb :key="$router.fullPath"/>
		<router-view :key="$router.fullPath"/>

	</div>
</template>

<script>
	import {app_name, base_url, author, timeout} from './../../config/env'

	export default{
		name: 'App',
		components: {
			'Breadcrumb': function (resolve) {
				require(['./../Breadcrumb'], resolve)
			},
		},
		data(){
			return {
				app_name: app_name,
				author: author,
				base_url: base_url,
				url: 'dosen',
			}
		}
	}
</script>