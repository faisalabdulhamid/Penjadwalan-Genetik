<template>
	<div class="container-fluid">
		<div class="row-fluid">
			<router-link :to="{name: 'tahun-ajaran-tambah'}" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i></router-link>
			
			<div class="widget-content">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Tahun Ajaran</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in table.data" :class="{'success': item.aktif == 1}">
							<td>{{ item.tahun_ajaran }}</td>
							<td class="actions">
								<router-link :to="{name: 'tahun-ajaran-ubah', params:{id:item.id}}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></router-link>
								<a v-on:click="check(item.id)" class="btn btn-sm btn-default"><i class="fa fa-check"></i></a>
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
				url: `${base_url}/${url}`
			}
		},
		methods:{
			getdata(){
				let self = this
				self.$http.get(`${self.url}`)
					.then(res => {
						Vue.set(self.$data, 'table', res.data)
					})
			},
			prev(){
				this.url = this.table.prev_page_url
				this.getdata()
			},
			next(){
				this.url = this.table.next_page_url
				this.getdata()
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
								self.getdata()
							})
					}
				})
			},
			check(id){
				let self = this
				self.$http.get(`${self.url}/${id}/edit`)
					.then(res => {
						self.getdata()
					})
			}
		},
		created(){
			this.getdata()
		}
	}
</script>

<style lang="scss" scoped>
	.actions{
		width: 150px;
	}
	.active{
		td{
			background-color: #000;	
		}
		
	}
</style>