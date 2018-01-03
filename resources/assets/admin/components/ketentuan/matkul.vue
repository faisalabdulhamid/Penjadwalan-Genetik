<template>
	<div class="container-fluid">
		<div class="row-fluid">
			
			<div class="widget-content">
				<a class="btn btn-default" v-on:click="add">Tambah</a>
				<br>
				<br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Matakuliah </th>
							<th>Ruangan/Lab</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						<form-matkul v-for="(item, idx) in data" 
							:key="idx"
							:matkul="matkul"
							:ruangan="ruangan"
							:index="idx"
							:data="data"
							v-on:handleHapus="hapus"
							v-on:handleSimpan="simpan"
							/>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
	import {base_url} from './../../config/env'

	export default{
		components: {'form-matkul': require('./form-matkul')},
		name: 'Index',
		data(){
			return {
				url: `${base_url}/ketentuan-matkul`,
				matkul: [],
				ruangan: [],
				data: {}
			}
		},
		methods:{
			getdata(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${self.url}`)
					.then(res => {
						resolve(res.data)
					}).catch(e => {
						reject(e)
					})	
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
			getRuangan(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${base_url}/ruangan?params=all`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			},
			getAll(){
				let self = this
				axios.all([self.getMatkul(), self.getRuangan(), self.getdata()])
					.then(axios.spread((matkul, ruangan, data) => {
						Vue.set(self.$data, 'matkul', matkul)
						Vue.set(self.$data, 'ruangan', ruangan)
						Vue.set(self.$data, 'data', data)
					}))
			},
			hapus(idx, id){
				if (id == null) {
					this.data.splice(idx, 1)
				}else{
					let self = this
					self.$http.delete(`${self.url}/${id}`)
						.then(res => {
							self.$http.get(`${self.url}`)
								.then(res => {
									Vue.set(self.$data, 'data', res.data)
								})
						})	
				}

			},
			simpan(idx, id){
				let self = this
				let data = this.data

				if (id == null) {//create
					self.$http.post(`${self.url}`, data[idx])
						.then(res => {
							self.$http.get(`${self.url}`)
								.then(res => {
									Vue.set(self.$data, 'data', res.data)
								})
						})
				}else{//update
					self.$http.put(`${self.url}/${id}`, data[idx])
						.then(res => {
							self.$http.get(`${self.url}`)
								.then(res => {
									Vue.set(self.$data, 'data', res.data)
								})
						})
				
				}
				
				
			},
			add(){
				this.data.push({
					ruangan_id: '',
					matkul_id: '',
				})
			}
		},
		created(){
			this.getAll()
		}
	}
</script>