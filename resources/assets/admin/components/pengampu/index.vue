<template>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="form-group">
				<select class="form-control" v-model="param.tahun_ajaran" v-on:change="handleChange($event)">
					<option v-for="item in tahun" :value="item.id">{{ item.tahun_ajaran }}</option>
				</select>
			</div>
			<router-link :to="{name: 'pengampu-tambah'}" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i></router-link>
			
			<div class="widget-content">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Matakuliah</th>
							<th>Dosen</th>
							<th>Kelas</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in table.data">
							<td>{{ item.matkul.nama}}</td>
							<td>{{ item.dosen.nama }}</td>
							<td>{{ item.kelas.kelas }}</td>
							<td class="actions">
								<router-link :to="{name: 'pengampu-ubah', params:{id:item.id}}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></router-link>
								<a v-on:click="hapus(item.id)" class="btn btn-sm btn-default"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					</tbody>
					<tfoot v-if="table.prev_page_url || table.next_page_url">
						<tr>
							<td colspan="4">
								<a 
									v-bind:disabled="!table.prev_page_url" 
									v-on:click="prev" 
									class="btn btn-sm btn-default">
									<i class="fa fa-arrow-left"></i>
								</a>
								<a 
									v-bind:disabled="!table.next_page_url" 
									v-on:click="next" 
									class="btn btn-sm btn-default pull-right">
									<i class="fa fa-arrow-right"></i>
								</a>
								<div class="text-center">Banyak Data - <span class=" badge">{{ table.total }}</span></div>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
	import {base_url} from './../../config/env'
	import {url} from './config'

	export default{
		name: 'Index',
		data(){
			return {
				table: {},
				url: `${base_url}/${url}`,
				tahun: [],
				param: {
					tahun_ajaran: null
				}
			}
		},
		methods:{
			getdata(){
				let self = this
				return new Promise((resolve, reject) => {
					let params = (self.param.tahun_ajaran)? `?tahun_ajaran=${self.param.tahun_ajaran}`: ''
					self.$http.get(`${self.url}${params}`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			},
			prev(){
				this.url = this.table.prev_page_url
				let self = this
				let params = (self.param.tahun_ajaran)? `?tahun_ajaran=${self.param.tahun_ajaran}`: ''
				self.$http.get(`${self.url}${params}`)
					.then(res => {
						Vue.set(self.$data, 'table', res.data)
					})
			},
			next(){
				this.url = this.table.next_page_url
				let self = this
				let params = (self.param.tahun_ajaran)? `?tahun_ajaran=${self.param.tahun_ajaran}`: ''
				self.$http.get(`${self.url}${params}`)
					.then(res => {
						Vue.set(self.$data, 'table', res.data)
					})
			},
			hapus(id){
				let self = this
				self.$swal({
					title: "Apakah anda yakin menghapus Data Ini ?",
					text: "",
					type: "warning",
					showCancelButton: true,
				}).then(result => {
					if (result.value) {
						self.$http.delete(`${self.url}/${id}`)
							.then(res => {
								let params = (self.param.tahun_ajaran)? `?tahun_ajaran=${self.param.tahun_ajaran}`: ''
								self.$http.get(`${self.url}${params}`)
									.then(res => {
										Vue.set(self.$data, 'table', res.data)
									})
							})
					}
				})
			},
			getTahun(){
				let self = this
				return new Promise((resolve, reject) => {
					self.$http.get(`${base_url}/tahun-ajaran?tahun=all`)
						.then(res => {
							resolve(res.data)
						}).catch(e => {
							reject(e)
						})
				})
			},
			getAll(){
				let self = this
				axios.all([this.getdata(), this.getTahun()])
					.then(axios.spread((data, tahun) => {
						Vue.set(self.$data, 'table', data)
						Vue.set(self.$data, 'tahun', tahun)
					}))
					.catch(e => {
						console.log(e)
					})
			},
			handleChange(event){
				this.param.tahun_ajaran = event.target.value
				this.getAll()
			}
		},
		created(){
			this.getAll()
		}
	}
</script>

<style scoped>
	.actions{
		width: 100px;
	}
</style>