<template>
	<ul class="breadcrumb">
		<li><router-link :to="{path:'/'}">Branda</router-link></li>
		<li class="active">{{ $route.meta.breadcrumb }}</li>
	</ul>
</template>

<script>
	export default{
		name: 'Breadcrumb'
	}
</script>