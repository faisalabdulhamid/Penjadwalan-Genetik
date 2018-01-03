webpackJsonp([35],{

/***/ 266:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return url; });


var url = 'pengampu';

/***/ }),

/***/ 331:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(266);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
	name: 'Form',
	props: ['id'],
	data: function data() {
		return {
			data: {},
			matkul: [],
			dosen: [],
			kelas: []
		};
	},

	methods: {
		simpan: function simpan() {
			var self = this;
			if (this.$route.meta.edit) {
				self.$http.put(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */] + '/' + self.id, this.data).then(function (res) {
					self.$router.push({ name: 'pengampu-index' });
				});
			} else {
				self.$http.post(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */], this.data).then(function (res) {
					self.$router.push({ name: 'pengampu-index' });
				});
			}
		},
		getdata: function getdata() {
			var self = this;
			self.$http.get(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */] + '/' + self.id, this.data).then(function (res) {
				Vue.set(self.$data, 'data', res.data);
			});
		},
		getMatkul: function getMatkul() {
			var self = this;
			return new Promise(function (resolve, reject) {
				self.$http.get(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/matakuliah?params=all').then(function (res) {
					resolve(res.data);
				}).catch(function (e) {
					reject(e);
				});
			});
		},
		getKelas: function getKelas() {
			var self = this;
			return new Promise(function (resolve, reject) {
				self.$http.get(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/kelas?params=all').then(function (res) {
					resolve(res.data);
				}).catch(function (e) {
					reject(e);
				});
			});
		},
		getDosen: function getDosen() {
			var self = this;
			return new Promise(function (resolve, reject) {
				self.$http.get(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/dosen?params=all').then(function (res) {
					resolve(res.data);
				}).catch(function (e) {
					reject(e);
				});
			});
		}
	},
	created: function created() {
		if (this.$route.meta.edit) {
			this.getdata();
		}
		var self = this;
		axios.all([this.getMatkul(), this.getDosen(), this.getKelas()]).then(axios.spread(function (matkul, dosen, kelas) {
			Vue.set(self.$data, 'matkul', matkul);
			Vue.set(self.$data, 'dosen', dosen);
			Vue.set(self.$data, 'kelas', kelas);
		})).catch(function (e) {
			console.log(e);
		});
	}
});

/***/ }),

/***/ 332:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container-fluid" }, [
    _c("br"),
    _vm._v(" "),
    _c(
      "form",
      {
        staticClass: "form-horizontal",
        on: {
          submit: function($event) {
            $event.preventDefault()
            _vm.simpan($event)
          }
        }
      },
      [
        _c("div", { staticClass: "form-group" }, [
          _c(
            "label",
            {
              staticClass: "control-label col-md-2",
              attrs: { for: "matkul_id" }
            },
            [_vm._v("Matakuliah")]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-10" }, [
            _c(
              "select",
              {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.data.matkul_id,
                    expression: "data.matkul_id"
                  }
                ],
                staticClass: "form-control",
                attrs: { id: "matkul_id" },
                on: {
                  change: function($event) {
                    var $$selectedVal = Array.prototype.filter
                      .call($event.target.options, function(o) {
                        return o.selected
                      })
                      .map(function(o) {
                        var val = "_value" in o ? o._value : o.value
                        return val
                      })
                    _vm.$set(
                      _vm.data,
                      "matkul_id",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              _vm._l(_vm.matkul, function(item) {
                return _c("option", { domProps: { value: item.id } }, [
                  _vm._v(
                    _vm._s(item.semester) +
                      " - " +
                      _vm._s(item.kode_mk) +
                      " - " +
                      _vm._s(item.nama)
                  )
                ])
              })
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group" }, [
          _c(
            "label",
            {
              staticClass: "control-label col-md-2",
              attrs: { for: "dosen_id" }
            },
            [_vm._v("Dosen")]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-10" }, [
            _c(
              "select",
              {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.data.dosen_id,
                    expression: "data.dosen_id"
                  }
                ],
                staticClass: "form-control",
                attrs: { id: "dosen_id" },
                on: {
                  change: function($event) {
                    var $$selectedVal = Array.prototype.filter
                      .call($event.target.options, function(o) {
                        return o.selected
                      })
                      .map(function(o) {
                        var val = "_value" in o ? o._value : o.value
                        return val
                      })
                    _vm.$set(
                      _vm.data,
                      "dosen_id",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              _vm._l(_vm.dosen, function(item) {
                return _c("option", { domProps: { value: item.id } }, [
                  _vm._v(_vm._s(item.nama))
                ])
              })
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group" }, [
          _c(
            "label",
            {
              staticClass: "control-label col-md-2",
              attrs: { for: "kelas_id" }
            },
            [_vm._v("Kelas")]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-10" }, [
            _c(
              "select",
              {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.data.kelas_id,
                    expression: "data.kelas_id"
                  }
                ],
                staticClass: "form-control",
                attrs: { id: "kelas_id" },
                on: {
                  change: function($event) {
                    var $$selectedVal = Array.prototype.filter
                      .call($event.target.options, function(o) {
                        return o.selected
                      })
                      .map(function(o) {
                        var val = "_value" in o ? o._value : o.value
                        return val
                      })
                    _vm.$set(
                      _vm.data,
                      "kelas_id",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              _vm._l(_vm.kelas, function(item) {
                return _c("option", { domProps: { value: item.id } }, [
                  _vm._v(_vm._s(item.kelas))
                ])
              })
            )
          ])
        ]),
        _vm._v(" "),
        _c("button", { staticClass: "btn btn-default pull-right" }, [
          _vm._v("Simpan")
        ])
      ]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1897ea6c", module.exports)
  }
}

/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(331)
/* template */
var __vue_template__ = __webpack_require__(332)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\admin\\components\\pengampu\\form.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1897ea6c", Component.options)
  } else {
    hotAPI.reload("data-v-1897ea6c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});