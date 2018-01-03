<template>
	<div>
		<footer>
			<!-- <hr /> -->
			<p class="pull-right">Design by {{author}}</p>
			<p>&copy; 2017 {{ app_name }}</p>
		</footer>
	</div>
</template>

<script>
	export default{
		name: 'Footer-Vue',
		props: ['app_name', 'author']
	}
</script>