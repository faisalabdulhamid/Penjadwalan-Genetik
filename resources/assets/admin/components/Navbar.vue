<template>
	<div class="navbar">
		<div class="navbar-inner">
			<a class="brand" href="#"><span class="first"></span> <span class="second">{{app_name}}</span></a>
		</div>
	</div>
</template>

<script>
	export default{
		name: 'Navbar',
		props: ['app_name']
	}
</script>