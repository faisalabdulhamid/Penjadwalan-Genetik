<template>
	<div class="content">
		<div class="header">
			<h1 class="page-title">{{ $route.meta.page }}</h1>
		</div>

		<Breadcrumb />

		<div class="container-fluid">
			<form class="form-horizontal" v-on:submit.prevent="resultPenjadwalan" v-on:change="resetForm">
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Tingkat</label>
						<select class="form-control input-sm" v-model="data.tingkat">
							<option value="[1]">1</option>
							<option value="[1, 2]">1 dan 2</option>
							<option value="[1, 2, 3]">1, 2 dan 3</option>
							<option value="[1, 2, 3, 4]">semua tingkat</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Semester</label>
						<select class="form-control input-sm" v-model="data.semester">
							<option value="1">Ganjil</option>
							<option value="0">Genap</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Jumlah Polulasi</label>
						<input type="text" class="form-control input-sm" v-model="data.populasi">
					</div>
					<button class="btn btn-default btn-sm">Proses</button>

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

					<div class="btn-group btn-group-sm">
						<a class="btn btn-default" v-on:click="proses">Individu</a>
					</div>
				</div>
			</form>
		</div>
		
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="widget-content">
					<div class="col-md-6" v-if="nilai_max_fitness_iterasi">
						<h3>Nilai Max Fitness</h3>
						<code>
							<tree-view :data="nilai_max_fitness_iterasi" :options="{maxDepth: 3}"></tree-view>
						</code>
					</div>
					<div class="col-md-6" v-if="fitness">
						<h3>Nilai Fitness</h3>
						<code>
							<tree-view :data="fitness" :options="{maxDepth: 3}"></tree-view>
						</code>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	// import VueJsonContent from 'vue-json-content';
	// Vue.use(VueJsonContent);
	import TreeView from "vue-json-tree-view"
	Vue.use(TreeView)

	import {mapActions} from 'vuex'
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
				state: false,
				data: {
					tingkat: '',
					semester: '',
					populasi: 10,
					crossover: 0.65,
					mutasi: 0.2,
					generasi: 100,
				},
				tahun: [],
				individu: null,

				nilai_max_fitness_iterasi: null,
				fitness: null,
			}
		},
		methods:{
			...mapActions({
				showLoading: 'showLoading',
				hideLoading: 'hideLoading'
			}),
			getTahun(){
				let self = this
				self.$http.get(`${base_url}/tahun-ajaran?tahun=all`)
					.then(res => {
						Vue.set(self.$data, 'tahun', res.data)
					})
			},
			resetForm(){
				this.nilai_max_fitness_iterasi = null
				this.fitness = null
			},
			proses(){
				let self = this
				return new Promise((resolve, reject) => {
						self.showLoading();
						setTimeout(function() {
							self.$http.post(`${base_url}/penjadwalan/genetika`, self.data)
								.then(res => {
									self.hideLoading();
									resolve(res.data)
									// Vue.set(self.$data, 'result', res.data)
								}).catch(e => {
									self.hideLoading();
									reject(e)
								})
						}, 2000);
					})
			},
			resultPenjadwalan(){
				let self = this
				this.proses()
					.then(res => {
						self.state = true

						self.fitness = res.penalty
						self.nilai_max_fitness_iterasi = res.max
					})
			},
		},
		beforeMount(){
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