webpackJsonp([19],{224:function(t,a,e){"use strict";e.d(a,"a",function(){return s});var s="dosen"},236:function(t,a,e){var s=e(237);"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);e(6)("f7968c60",s,!0)},237:function(t,a,e){(t.exports=e(5)(void 0)).push([t.i,".actions[data-v-3b3b26ba]{width:100px}",""])},238:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var s=e(27),n=e(224);a.default={name:"Index",data:function(){return{table:{},url:s.c+"/"+n.a}},methods:{getdata:function(){var t=this;t.$http.get(""+t.url).then(function(a){Vue.set(t.$data,"table",a.data)})},prev:function(){this.url=this.table.prev_page_url,this.getdata()},next:function(){this.url=this.table.next_page_url,this.getdata()},hapus:function(t){var a=this;a.$swal({title:"Apakah anda yakin menghapus Data Ini ?",text:"",type:"warning",showCancelButton:!0}).then(function(e){e.value&&a.$http.delete(s.c+"/"+n.a+"/"+t).then(function(t){a.getdata()})})}},created:function(){this.getdata()}}},239:function(t,a){t.exports={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"container-fluid"},[e("div",{staticClass:"row-fluid"},[e("router-link",{staticClass:"btn btn-sm btn-default pull-right",attrs:{to:{name:"dosen-tambah"}}},[e("i",{staticClass:"fa fa-plus"})]),t._v(" "),e("div",{staticClass:"widget-content"},[e("table",{staticClass:"table table-bordered"},[t._m(0),t._v(" "),e("tbody",t._l(t.table.data,function(a){return e("tr",[e("td",[t._v(t._s(a.nidn))]),t._v(" "),e("td",[t._v(t._s(a.nama))]),t._v(" "),e("td",[t._v(t._s(a.telp))]),t._v(" "),e("td",{staticClass:"actions"},[e("router-link",{staticClass:"btn btn-sm btn-default",attrs:{to:{name:"dosen-ubah",params:{id:a.id}}}},[e("i",{staticClass:"fa fa-pencil"})]),t._v(" "),e("a",{staticClass:"btn btn-sm btn-default",on:{click:function(e){t.hapus(a.id)}}},[e("i",{staticClass:"fa fa-trash"})])],1)])})),t._v(" "),t.table.prev_page_url||t.table.next_page_url?e("tfoot",[e("tr",[e("td",{attrs:{colspan:"4"}},[e("a",{staticClass:"btn btn-sm btn-default",attrs:{disabled:!t.table.prev_page_url},on:{click:t.prev}},[e("i",{staticClass:"fa fa-arrow-left"})]),t._v(" "),e("a",{staticClass:"btn btn-sm btn-default pull-right",attrs:{disabled:!t.table.next_page_url},on:{click:t.next}},[e("i",{staticClass:"fa fa-arrow-right"})])])])]):t._e()])])],1)])},staticRenderFns:[function(){var t=this.$createElement,a=this._self._c||t;return a("thead",[a("tr",[a("th",[this._v("NIDN")]),this._v(" "),a("th",[this._v("Nama")]),this._v(" "),a("th",[this._v("Telp")]),this._v(" "),a("th",[this._v("#")])])])}]}},336:function(t,a,e){var s=e(0)(e(238),e(239),!1,function(t){e(236)},"data-v-3b3b26ba",null);t.exports=s.exports}});