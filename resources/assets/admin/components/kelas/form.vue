<template>
	<div class="container-fluid">
		<br/>
		<form class="form-horizontal" v-on:submit.prevent="simpan">
			<div class="form-group">
				<label for="kelas" class="control-label col-md-2">Kelas</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="kelas" v-model="data.kelas">	
				</div>
			</div>
			<div class="form-group" v-if="!$route.meta.edit">
				<label for="banyak" class="control-label col-md-2">Banyak</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="banyak" v-model="data.banyak">	
				</div>
			</div>
			<button class="btn btn-default pull-right">Simpan</button>
		</form>
	</div>
</template>

<script>
	import {base_url} from './../../config/env'
	import {url} from './config'

	export default{
		name: 'Form',
		props: ['id'],
		data(){
			return {
				data: {}
			}
		},
		methods:{
			simpan(){
				let self = this
				if (this.$route.meta.edit) {
					self.$http.put(`${base_url}/${url}/${self.id}`, this.data)
						.then(res => {
							self.$router.push({name: 'kelas-index'})
						})
				}else{
					self.$http.post(`${base_url}/${url}`, this.data)
						.then(res => {
							self.$router.push({name: 'kelas-index'})
						})
				}
			},
			getdata(){
				let self = this
				self.$http.get(`${base_url}/${url}/${self.id}`, this.data)
					.then(res => {
						Vue.set(self.$data, 'data', res.data)
					})	
			}
		},
		created(){
			if (this.$route.meta.edit) {
				this.getdata();
			}
		}
	}
</script>