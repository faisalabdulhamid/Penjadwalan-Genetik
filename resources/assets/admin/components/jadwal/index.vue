<template>
	<div class="content">
		<div class="header">
			<h1 class="page-title">{{ $route.meta.page }}</h1>
		</div>

		<Breadcrumb />

		<div class="container-fluid">
			<form class="form-horizontal" v-on:submit.prevent="proses">
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Semester</label>
						<select class="form-control input-sm" v-model="data.semester">
							<option value="1">Ganjil</option>
							<option value="0">Genap</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Tahun Akademik</label>
						<select class="form-control input-sm" v-model="data.tahun_akademik">
							<option v-for="item in tahun" :value="item.id">{{ item.tahun_ajaran }}</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Jumlah Polulasi</label>
						<input type="text" class="form-control input-sm" v-model="data.populasi">
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Probabilitas CrossOver</label>
						<input type="text" class="form-control input-sm" v-model="data.crossover">
					</div>
					<div class="form-group">
						<label for="">Probabilitas Mutasi</label>
						<input type="text" class="form-control input-sm" v-model="data.mutasi">
					</div>
					<div class="form-group">
						<label for="">Jumlah generasi</label>
						<input type="text" class="form-control input-sm" v-model="data.generasi">
					</div>
					<button class="btn btn-default pull-right">Proses</button>
				</div>
			</form>
		</div>
		
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="widget-content">
					<code>
						<div v-json-content="result"></div>
					</code>
					
					<!-- <table class="table table-bordered">
						<thead>
							<tr>
								<th>Range jam</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td class="actions">
								</td>
							</tr>
						</tbody>
					</table> -->
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import VueJsonContent from 'vue-json-content';
	Vue.use(VueJsonContent);

	import {app_name, base_url, author, timeout} from './../../config/env'

	export default{
		name: 'Penjadwalan',
		components: {
			'Breadcrumb': function (resolve) {
				require(['./../Breadcrumb'], resolve)
			},
		},
		data(){
			return {
				data: {
					semester: '',
					tahun_akademik: '',
					tahun_akademik: '',
					populasi: 10,
					crossover: 0.65,
					mutasi: 0.2,
					generasi: 100,
				},
				tahun: [],
				result: {}
			}
		},
		methods:{
			getTahun(){
				let self = this
				self.$http.get(`${base_url}/tahun-ajaran?tahun=all`)
					.then(res => {
						Vue.set(self.$data, 'tahun', res.data)
					})
			},
			proses(){
				let self = this
				setTimeout(function() {
					self.$http.post(`${base_url}/penjadwalan/genetika`, self.data)
						.then(res => {
							Vue.set(self.$data, 'result', res.data)
						})	
				}, 5000);
				
			}
		},
		created(){
			this.getTahun()
		}
	}
</script>


<style lang="scss">
	.form-horizontal{
		.col-md-5{
			margin: 10px 15px;
		}
	}
</style>