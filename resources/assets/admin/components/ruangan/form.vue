<template>
	<div class="container-fluid">
		<br/>
		<form class="form-horizontal" v-on:submit.prevent="simpan">
			<div class="form-group">
				<label for="nama" class="control-label col-md-2">Nama</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="nama" v-model="data.nama">	
				</div>
			</div>
			<div class="form-group">
				<label for="kapasitas" class="control-label col-md-2">Kapasitas</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="kapasitas" v-model="data.kapasitas">	
				</div>
			</div>
			<div class="form-group">
				<label for="jenis" class="control-label col-md-2">Jenis</label>
				<div class="col-md-10">
					<select type="text" class="form-control" id="jenis" v-model="data.jenis">
						<option value="TEORI">Teori</option>
						<option value="LABORATORIUM">LABORATORIUM</option>
					</select>
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
							self.$router.push({name: 'ruangan-index'})
						})
				}else{
					self.$http.post(`${base_url}/${url}`, this.data)
						.then(res => {
							self.$router.push({name: 'ruangan-index'})
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