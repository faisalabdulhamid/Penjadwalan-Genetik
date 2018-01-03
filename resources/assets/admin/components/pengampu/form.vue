<template>
	<div class="container-fluid">
		<br/>
		<form class="form-horizontal" v-on:submit.prevent="simpan">
			<div class="form-group">
				<label for="matkul_id" class="control-label col-md-2">Matakuliah</label>
				<div class="col-md-10">
					<select class="form-control" id="matkul_id" v-model="data.matkul_id">
						<option v-for="item in matkul" :value="item.id">{{ item.semester }} - {{ item.kode_mk }} - {{ item.nama }}</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="dosen_id" class="control-label col-md-2">Dosen</label>
				<div class="col-md-10">
					<select class="form-control" id="dosen_id" v-model="data.dosen_id">
						<option v-for="item in dosen" :value="item.id">{{ item.nama }}</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="kelas_id" class="control-label col-md-2">Kelas</label>
				<div class="col-md-10">
					<select class="form-control" id="kelas_id" v-model="data.kelas_id">
						<option v-for="item in kelas" :value="item.id">{{ item.kelas }}</option>
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
				data: {},
				matkul: [],
				dosen: [],
				kelas: [],
			}
		},
		methods:{
			simpan(){
				let self = this
				if (this.$route.meta.edit) {
					self.$http.put(`${base_url}/${url}/${self.id}`, this.data)
						.then(res => {
							self.$router.push({name: 'pengampu-index'})
						})
				}else{
					self.$http.post(`${base_url}/${url}`, this.data)
						.then(res => {
							self.$router.push({name: 'pengampu-index'})
						})
				}
			},
			getdata(){
				let self = this
				self.$http.get(`${base_url}/${url}/${self.id}`, this.data)
					.then(res => {
						Vue.set(self.$data, 'data', res.data)
					})	
			},
			getMatkul(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${base_url}/matakuliah?params=all`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			},
			getKelas(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${base_url}/kelas?params=all`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			},
			getDosen(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${base_url}/dosen?params=all`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			}
		},
		created(){
			if (this.$route.meta.edit) {
				this.getdata();
			}
			let self = this
			axios.all([this.getMatkul(), this.getDosen(), this.getKelas()])
				.then(axios.spread((matkul, dosen, kelas) => {
					Vue.set(self.$data, 'matkul', matkul)
					Vue.set(self.$data, 'dosen', dosen)
					Vue.set(self.$data, 'kelas', kelas)
				}))
				.catch(e => {
					console.log(e)
				})
		}
	}
</script>