'use strict'

import {timeout} from './../config/env'

export default function configRouter() {
	return [
        {
            path: '/dosen', component: function(resolve){
                require(['./../components/dosen/App'], resolve)
            }, 
            children: [
                {
                    name: 'dosen-index', path:'/dosen/index', 
                    component: function(resolve){
                        require(['./../components/dosen/index'], resolve)
                }, meta:{menu: 'dosen', breadcrumb: 'Modul Dosen', page: 'Modul Dosen'}},
                {
                    name: 'dosen-tambah', path:'/dosen/tambah', 
                    component: function(resolve){
                        require(['./../components/dosen/form'], resolve)
                }, meta:{menu: 'dosen', breadcrumb: 'Tambah Dosen', page: 'Modul Dosen'}},
                {
                    name: 'dosen-ubah', path:'/dosen/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/dosen/form'], resolve)
                }, meta:{menu: 'dosen', edit: true, breadcrumb: 'Ubah Dosen', page: 'Modul Dosen'}, props: true},
            ],
        },

        {
            path: '/matakuliah', component: function(resolve){
                require(['./../components/matakuliah/App'], resolve)
            }, 
            children: [
                {
                    name: 'matakuliah-index', path:'/matakuliah/index', 
                    component: function(resolve){
                        require(['./../components/matakuliah/index'], resolve)
                }, meta:{menu: 'matakuliah', breadcrumb: 'Modul Matakuliah', page: 'Modul Matakuliah'}},
                {
                    name: 'matakuliah-tambah', path:'/matakuliah/tambah', 
                    component: function(resolve){
                        require(['./../components/matakuliah/form'], resolve)
                }, meta:{menu: 'matakuliah', breadcrumb: 'Tambah Matakuliah', page: 'Modul Matakuliah'}},
                {
                    name: 'matakuliah-ubah', path:'/matakuliah/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/matakuliah/form'], resolve)
                }, meta:{menu: 'matakuliah', edit: true, breadcrumb: 'Ubah Matakuliah', page: 'Modul Matakuliah'}, props: true},
            ],
        },

        {
            path: '/ruangan', component: function(resolve){
                require(['./../components/ruangan/App'], resolve)
            }, 
            children: [
                {
                    name: 'ruangan-index', path:'/ruangan/index', 
                    component: function(resolve){
                        require(['./../components/ruangan/index'], resolve)
                }, meta:{menu: 'ruangan', breadcrumb: 'Modul Ruangan', page: 'Modul Ruangan'}},
                {
                    name: 'ruangan-tambah', path:'/ruangan/tambah', 
                    component: function(resolve){
                        require(['./../components/ruangan/form'], resolve)
                }, meta:{menu: 'ruangan', breadcrumb: 'Tambah Ruangan', page: 'Modul Ruangan'}},
                {
                    name: 'ruangan-ubah', path:'/ruangan/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/ruangan/form'], resolve)
                }, meta:{menu: 'ruangan', edit: true, breadcrumb: 'Ubah Ruangan', page: 'Modul Ruangan'}, props: true},
            ],
        },

        {
            path: '/jam', component: function(resolve){
                require(['./../components/jam/App'], resolve)
            }, 
            children: [
                {
                    name: 'jam-index', path:'/jam/index', 
                    component: function(resolve){
                        require(['./../components/jam/index'], resolve)
                }, meta:{menu: 'jam', breadcrumb: 'Modul Jam', page: 'Modul Jam'}},
                {
                    name: 'jam-tambah', path:'/jam/tambah', 
                    component: function(resolve){
                        require(['./../components/jam/form'], resolve)
                }, meta:{menu: 'jam', breadcrumb: 'Tambah Jam', page: 'Modul Jam'}},
                {
                    name: 'jam-ubah', path:'/jam/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/jam/form'], resolve)
                }, meta:{menu: 'jam', edit: true, breadcrumb: 'Ubah Jam', page: 'Modul Jam'}, props: true},
            ],
        },

        {
            path: '/hari', component: function(resolve){
                require(['./../components/hari/App'], resolve)
            }, 
            children: [
                {
                    name: 'hari-index', path:'/hari/index', 
                    component: function(resolve){
                        require(['./../components/hari/index'], resolve)
                }, meta:{menu: 'hari', breadcrumb: 'Modul Hari', page: 'Modul Hari'}},
                {
                    name: 'hari-tambah', path:'/hari/tambah', 
                    component: function(resolve){
                        require(['./../components/hari/form'], resolve)
                }, meta:{menu: 'hari', breadcrumb: 'Tambah Hari', page: 'Modul Hari'}},
                {
                    name: 'hari-ubah', path:'/hari/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/hari/form'], resolve)
                }, meta:{menu: 'hari', edit: true, breadcrumb: 'Ubah Hari', page: 'Modul Hari'}, props: true},
            ],
        },

        {
            path: '/tahun-ajaran', component: function(resolve){
                require(['./../components/tahun-ajaran/App'], resolve)
            }, 
            children: [
                {
                    name: 'tahun-ajaran-index', path:'/tahun-ajaran/index', 
                    component: function(resolve){
                        require(['./../components/tahun-ajaran/index'], resolve)
                }, meta:{menu: 'tahun-ajaran', breadcrumb: 'Modul Tahun Ajaran', page: 'Modul Tahun Ajaran'}},
                {
                    name: 'tahun-ajaran-tambah', path:'/tahun-ajaran/tambah', 
                    component: function(resolve){
                        require(['./../components/tahun-ajaran/form'], resolve)
                }, meta:{menu: 'tahun-ajaran', breadcrumb: 'Tambah Tahun Ajaran', page: 'Modul Tahun Ajaran'}},
                {
                    name: 'tahun-ajaran-ubah', path:'/tahun-ajaran/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/tahun-ajaran/form'], resolve)
                }, meta:{menu: 'tahun-ajaran', edit: true, breadcrumb: 'Ubah Tahun Ajaran', page: 'Modul Tahun Ajaran'}, props: true},
            ],
        },

        {
            path: '/kelas', component: function(resolve){
                require(['./../components/kelas/App'], resolve)
            }, 
            children: [
                {
                    name: 'kelas-index', path:'/kelas/index', 
                    component: function(resolve){
                        require(['./../components/kelas/index'], resolve)
                }, meta:{menu: 'kelas', breadcrumb: 'Modul Kelas', page: 'Modul Kelas'}},
                {
                    name: 'kelas-tambah', path:'/kelas/tambah', 
                    component: function(resolve){
                        require(['./../components/kelas/form'], resolve)
                }, meta:{menu: 'kelas', breadcrumb: 'Tambah Kelas', page: 'Modul Kelas'}},
                {
                    name: 'kelas-ubah', path:'/kelas/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/kelas/form'], resolve)
                }, meta:{menu: 'kelas', edit: true, breadcrumb: 'Ubah Kelas', page: 'Modul Kelas'}, props: true},
            ],
        },

        {
            path: '/pengampu', component: function(resolve){
                require(['./../components/pengampu/App'], resolve)
            }, 
            children: [
                {
                    name: 'pengampu-index', path:'/pengampu/index', 
                    component: function(resolve){
                        require(['./../components/pengampu/index'], resolve)
                }, meta:{menu: 'pengampu', breadcrumb: 'Modul Pengampu', page: 'Modul Pengampu'}},
                {
                    name: 'pengampu-tambah', path:'/pengampu/tambah', 
                    component: function(resolve){
                        require(['./../components/pengampu/form'], resolve)
                }, meta:{menu: 'pengampu', breadcrumb: 'Tambah Pengampu', page: 'Modul Pengampu'}},
                {
                    name: 'pengampu-ubah', path:'/pengampu/:id/ubah', 
                    component: function(resolve){
                        require(['./../components/pengampu/form'], resolve)
                }, meta:{menu: 'pengampu', edit: true, breadcrumb: 'Ubah Pengampu', page: 'Modul Pengampu'}, props: true},
            ],
        },

        {
            path: '/ketentuan', component: function(resolve){
                require(['./../components/ketentuan/App'], resolve)
            }, 
            children: [
                {
                    name: 'ketentuan-dosen-index', path:'/ketentua/dosen', 
                    component: function(resolve){
                        require(['./../components/ketentuan/dosen'], resolve)
                    }, 
                    meta:{menu: 'ketentuan-dosen', breadcrumb: 'Modul Ketentuan Dosen', page: 'Modul Ketentuan Dosen'}
                },
                {
                    name: 'ketentuan-ruangan-index', path:'/ketentua/ruangan', 
                    component: function(resolve){
                        require(['./../components/ketentuan/ruangan'], resolve)
                }, meta:{menu: 'ketentuan-ruangan', breadcrumb: 'Modul Ketentuan Ruangan', page: 'Modul Ketentuan Ruangan'}},
                {
                    name: 'ketentuan-matkul-index', path:'/ketentua/matkul', 
                    component: function(resolve){
                        require(['./../components/ketentuan/matkul'], resolve)
                }, meta:{menu: 'ketentuan-matkul', breadcrumb: 'Modul Ketentuan Matkul', page: 'Modul Ketentuan Matkul'}},
            ],
        },

        {
            name: 'penjadwalan', 
            path: '/penjadwalan', 
            component: function (resolve) {
                require(['./../components/jadwal/index'], resolve)
            },
            meta:{menu: 'penjadwalan', breadcrumb: 'Proses Penjadwalan', page: 'Proses Penjadwalan'}

        }
    ]
}