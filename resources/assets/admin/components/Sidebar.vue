<template>
	<div class="sidebar-nav" style="padding-top: 5px">

		<a href="" class="nav-header"><i class="fa fa-th-list"></i> Beranda</a>
		<a class="nav-header" ><i class="fa fa-database"></i> Data </a>
		<ul id="content-menu" class="nav nav-list collapse in">                        
			<li v-bind:class="{'active': $route.meta.menu == 'dosen'}">
				<router-link :to="{ name:'dosen-index' }"><i class="fa fa-user"></i> Dosen</router-link>
			</li>
			<li v-bind:class="{'active': $route.meta.menu == 'matakuliah'}">
				<router-link :to="{ name:'matakuliah-index' }"><i class="fa fa-book"></i> Matakuliah</router-link>
			</li>
			<li v-bind:class="{'active': $route.meta.menu == 'kelas'}">
				<router-link :to="{ name:'kelas-index' }"><i class="fa fa-bank"></i> Kelas</router-link>
			</li>
			<li v-bind:class="{'active': $route.meta.menu == 'ruangan'}">
				<router-link :to="{ name:'ruangan-index' }"><i class="fa fa-home"></i> Ruangan</router-link>
			</li>
			<li v-bind:class="{'active': $route.meta.menu == 'jam'}">
				<router-link :to="{ name:'jam-index' }"><i class="fa fa-clock-o"></i> Jam</router-link>
			</li>
			<li v-bind:class="{'active': $route.meta.menu == 'hari'}">
				<router-link :to="{ name:'hari-index' }"><i class="fa fa-calendar"></i> Hari</router-link>
			</li>

			<li v-bind:class="{'active': $route.meta.menu == 'tahun-ajaran'}">
				<router-link :to="{ name:'tahun-ajaran-index' }"><i class="fa fa-list-alt"></i> Tahun Ajaran</router-link>
			</li>

			<li v-bind:class="{'active': $route.meta.menu == 'pengampu'}">
				<router-link :to="{ name:'pengampu-index' }"><i class="fa fa-file-text"></i> Pengampu</router-link>
			</li>
		</ul>



		<a class="nav-header" ><i class="fa fa-paperclip"></i> Ketentuan </a>
		<ul id="content-menu" class="nav nav-list collapse in">
			<li v-bind:class="{'active': $route.meta.menu == 'ketentuan-dosen'}">
				<router-link :to="{ name:'ketentuan-dosen-index' }"><i class="fa fa-user-times"></i> Ketersediaan Dosen</router-link>
			</li>
			<li v-bind:class="{'active': $route.meta.menu == 'ketentuan-ruangan'}">
				<router-link :to="{ name:'ketentuan-ruangan-index' }"><i class="fa fa-calendar-times-o"></i> Ketersediaan Ruangan</router-link>
			</li>
			<li v-bind:class="{'active': $route.meta.menu == 'ketentuan-matkul'}">
				<router-link :to="{ name:'ketentuan-matkul-index' }"><i class="fa fa-calendar-times-o"></i> Matakuliah</router-link>
			</li>
		</ul>

		<a class="nav-header" ><i class="fa fa-cogs"></i> Proses </a>
		<ul id="content-menu" class="nav nav-list collapse in">                        
			<li>
				<li v-bind:class="{'active': $route.meta.menu == 'penjadwalan'}">
					<router-link :to="{ name:'penjadwalan' }"><i class="fa fa-cogs"></i> Penjadwalan</router-link>
				</li>
			</li>
		</ul>	
	</div>
</template>

<script>
	export default{
		name: 'Sidebar'
	}
</script>