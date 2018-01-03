<template>
	<div class="container-fluid">
		<br/>
		<form class="form-horizontal" v-on:submit.prevent="simpan">
			<div class="form-group">
				<label for="tahun_ajaran" class="control-label col-md-2">Tahun Ajaran</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="tahun_ajaran" v-model="data.tahun_ajaran">	
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
							self.$router.push({name: 'tahun-ajaran-index'})
						})
				}else{
					self.$http.post(`${base_url}/${url}`, this.data)
						.then(res => {
							self.$router.push({name: 'tahun-ajaran-index'})
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