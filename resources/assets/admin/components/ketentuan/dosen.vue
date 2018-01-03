<template>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="form-group">
				<select id="" class="form-control" v-on:change="handleChange($event)" v-model="params.dosen">
					<option v-for="item in dosen" :value="item.id">{{ item.nama }}</option>
				</select>
			</div>
			
			<div class="widget-content">
				<a class="btn btn-default" v-if="params.dosen" v-on:click="add">Tambah</a>
				<br>
				<br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Hari</th>
							<th>Jam</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<form-dosen v-for="(item, idx) in data" 
							:key="idx"
							:hari="hari"
							:jam="jam"
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
		components: {'form-dosen': require('./form-dosen')},
		name: 'Index',
		data(){
			return {
				url: `${base_url}/ketentuan-dosen`,
				dosen: [],
				hari: [],
				jam: [],
				params: {
					dosen: null
				},
				data: {}
			}
		},
		methods:{
			getdata(){
				let self = this
				return new Promise((resolve, reject) => {
					let params = (self.params.dosen)? `?dosen=${self.params.dosen}`: ''
					self.$http.get(`${self.url}${params}`)
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
			},
			getHari(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${base_url}/hari?params=all`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			},
			getJam(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${base_url}/jam?params=all`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			},
			getAll(){
				let self = this
				axios.all([self.getHari(), self.getJam(), self.getDosen(), self.getdata()])
					.then(axios.spread((hari, jam, dosen, data) => {
						Vue.set(self.$data, 'dosen', dosen)
						Vue.set(self.$data, 'hari', hari)
						Vue.set(self.$data, 'jam', jam)

						Vue.set(self.$data, 'data', data)
					}))
			},
			handleChange(event){
				this.params.dosen = event.target.value
				let self = this
				let params = (self.params.dosen)? `?dosen=${self.params.dosen}`: ''
				self.$http.get(`${self.url}${params}`)
					.then(res => {
						Vue.set(self.$data, 'data', res.data)
					})
			},
			hapus(idx, id){
				if (id == null) {
					this.data.splice(idx, 1)
				}else{
					let self = this
					self.$http.delete(`${self.url}/${id}`)
						.then(res => {
							let param = (self.params.dosen)? `?dosen=${self.params.dosen}`: ''
							self.$http.get(`${self.url}${param}`)
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
							let param = (self.params.dosen)? `?dosen=${self.params.dosen}`: ''
							self.$http.get(`${self.url}${param}`)
								.then(res => {
									Vue.set(self.$data, 'data', res.data)
								})
						})
				}else{//update
					self.$http.put(`${self.url}/${id}`, data[idx])
						.then(res => {
							let param = (self.params.dosen)? `?dosen=${self.params.dosen}`: ''
							self.$http.get(`${self.url}${param}`)
								.then(res => {
									Vue.set(self.$data, 'data', res.data)
								})
						})
				
				}
				
				
			},
			add(){
				this.data.push({
					dosen_id: this.params.dosen,
					hari_id: '',
					jam_id: '',
				})
			}
		},
		created(){
			this.getAll()
		}
	}
</script>