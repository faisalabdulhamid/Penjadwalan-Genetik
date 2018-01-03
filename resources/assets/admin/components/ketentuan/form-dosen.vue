<template>
	<tr>
		<td>
			<select class="form-control" v-model="data[index].hari_id" :disabled="!saved">
				<option v-for="h in hari" :value="h.id">{{ h.nama }}</option>
			</select>
		</td>
		<td>
			<select class="form-control"  v-model="data[index].jam_id" :disabled="!saved">
				<option v-for="j in jam" :value="j.id">{{ j.range_jam }}</option>
			</select>
		</td>
		<td class="actions">
			<a class="btn btn-sm btn-danger" v-if="!saved" v-on:click="handleHapus(data[index].id)"><i class="fa fa-times"></i></a>
			<a class="btn btn-sm btn-danger" v-if="!saved" v-on:click="handleEdit"><i class="fa fa-edit"></i></a>

			<a class="btn btn-sm btn-success" v-if="saved" v-on:click="handleSimpan(data[index].id)"><i class="fa fa-save"></i></a>
		</td>
	</tr>
</template>

<script>
	export default{
		name: 'form-dosen',
		props: ['data', 'index', 'hari', 'jam'],
		data(){
			return {
				saved: false,
			}
		},
		methods:{
			handleEdit(){
				this.saved = true
			},
			handleHapus(id){
				this.$emit('handleHapus', this.index, id)
			},
			handleSimpan(id){
				this.saved = false
				this.$emit('handleSimpan', this.index, id)
			}
		}
	}
</script>



<style scoped>
	.actions{
		width: 100px;
	}
</style>