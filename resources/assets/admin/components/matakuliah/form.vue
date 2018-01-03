<template>
	<div class="container-fluid">
		<br/>
		<!-- '', 'nama', 'sks', 'semester', 'jenis' -->
		<form class="form-horizontal" v-on:submit.prevent="simpan">
			<div class="form-group">
				<label for="kode_mk" class="control-label col-md-2">Kode Matakuliah</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="kode_mk" v-model="data.kode_mk">	
				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="control-label col-md-2">Nama</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="nama" v-model="data.nama">	
				</div>
			</div>
			<div class="form-group">
				<label for="sks" class="control-label col-md-2">Sks</label>
				<div class="col-md-10">
					<select type="text" class="form-control" id="sks" v-model="data.sks">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="semester" class="control-label col-md-2">Semester</label>
				<div class="col-md-10">
					<select type="text" class="form-control" id="semester" v-model="data.semester">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="jenis" class="control-label col-md-2">Jenis</label>
				<div class="col-md-10">
					<select type="text" class="form-control" id="jenis" v-model="data.jenis">
						<option value="TEORI">Teori</option>
						<option value="PRAKTIKUM">Praktikum</option>
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
							self.$router.push({name: 'matakuliah-index'})
						})
				}else{
					self.$http.post(`${base_url}/${url}`, this.data)
						.then(res => {
							self.$router.push({name: 'matakuliah-index'})
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