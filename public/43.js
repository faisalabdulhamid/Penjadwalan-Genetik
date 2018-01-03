webpackJsonp([43],{

/***/ 254:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(335)
/* template */
var __vue_template__ = __webpack_require__(341)
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
Component.options.__file = "resources\\assets\\admin\\components\\ketentuan\\dosen.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2bfec111", Component.options)
  } else {
    hotAPI.reload("data-v-2bfec111", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 335:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env__ = __webpack_require__(27);
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
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
	components: { 'form-dosen': __webpack_require__(336) },
	name: 'Index',
	data: function data() {
		return {
			url: __WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/ketentuan-dosen',
			dosen: [],
			hari: [],
			jam: [],
			params: {
				dosen: null
			},
			data: {}
		};
	},

	methods: {
		getdata: function getdata() {
			var self = this;
			return new Promise(function (resolve, reject) {
				var params = self.params.dosen ? '?dosen=' + self.params.dosen : '';
				self.$http.get('' + self.url + params).then(function (res) {
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
		},
		getHari: function getHari() {
			var self = this;
			return new Promise(function (resolve, reject) {
				self.$http.get(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/hari?params=all').then(function (res) {
					resolve(res.data);
				}).catch(function (e) {
					reject(e);
				});
			});
		},
		getJam: function getJam() {
			var self = this;
			return new Promise(function (resolve, reject) {
				self.$http.get(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/jam?params=all').then(function (res) {
					resolve(res.data);
				}).catch(function (e) {
					reject(e);
				});
			});
		},
		getAll: function getAll() {
			var self = this;
			axios.all([self.getHari(), self.getJam(), self.getDosen(), self.getdata()]).then(axios.spread(function (hari, jam, dosen, data) {
				Vue.set(self.$data, 'dosen', dosen);
				Vue.set(self.$data, 'hari', hari);
				Vue.set(self.$data, 'jam', jam);

				Vue.set(self.$data, 'data', data);
			}));
		},
		handleChange: function handleChange(event) {
			this.params.dosen = event.target.value;
			var self = this;
			var params = self.params.dosen ? '?dosen=' + self.params.dosen : '';
			self.$http.get('' + self.url + params).then(function (res) {
				Vue.set(self.$data, 'data', res.data);
			});
		},
		hapus: function hapus(idx, id) {
			if (id == null) {
				this.data.splice(idx, 1);
			} else {
				var self = this;
				self.$http.delete(self.url + '/' + id).then(function (res) {
					var param = self.params.dosen ? '?dosen=' + self.params.dosen : '';
					self.$http.get('' + self.url + param).then(function (res) {
						Vue.set(self.$data, 'data', res.data);
					});
				});
			}
		},
		simpan: function simpan(idx, id) {
			var self = this;
			var data = this.data;

			if (id == null) {
				//create
				self.$http.post('' + self.url, data[idx]).then(function (res) {
					var param = self.params.dosen ? '?dosen=' + self.params.dosen : '';
					self.$http.get('' + self.url + param).then(function (res) {
						Vue.set(self.$data, 'data', res.data);
					});
				});
			} else {
				//update
				self.$http.put(self.url + '/' + id, data[idx]).then(function (res) {
					var param = self.params.dosen ? '?dosen=' + self.params.dosen : '';
					self.$http.get('' + self.url + param).then(function (res) {
						Vue.set(self.$data, 'data', res.data);
					});
				});
			}
		},
		add: function add() {
			this.data.push({
				dosen_id: this.params.dosen,
				hari_id: '',
				jam_id: ''
			});
		}
	},
	created: function created() {
		this.getAll();
	}
});

/***/ }),

/***/ 336:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(337)
}
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(339)
/* template */
var __vue_template__ = __webpack_require__(340)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-7f3d9238"
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
Component.options.__file = "resources\\assets\\admin\\components\\ketentuan\\form-dosen.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7f3d9238", Component.options)
  } else {
    hotAPI.reload("data-v-7f3d9238", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 337:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(338);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("f7711840", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-7f3d9238\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./form-dosen.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-7f3d9238\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./form-dosen.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 338:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(5)(undefined);
// imports


// module
exports.push([module.i, "\n.actions[data-v-7f3d9238]{\n\twidth: 100px;\n}\n", ""]);

// exports


/***/ }),

/***/ 339:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
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
	name: 'form-dosen',
	props: ['data', 'index', 'hari', 'jam'],
	data: function data() {
		return {
			saved: false
		};
	},

	methods: {
		handleEdit: function handleEdit() {
			this.saved = true;
		},
		handleHapus: function handleHapus(id) {
			this.$emit('handleHapus', this.index, id);
		},
		handleSimpan: function handleSimpan(id) {
			this.saved = false;
			this.$emit('handleSimpan', this.index, id);
		}
	}
});

/***/ }),

/***/ 340:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("tr", [
    _c("td", [
      _c(
        "select",
        {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.data[_vm.index].hari_id,
              expression: "data[index].hari_id"
            }
          ],
          staticClass: "form-control",
          attrs: { disabled: !_vm.saved },
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
                _vm.data[_vm.index],
                "hari_id",
                $event.target.multiple ? $$selectedVal : $$selectedVal[0]
              )
            }
          }
        },
        _vm._l(_vm.hari, function(h) {
          return _c("option", { domProps: { value: h.id } }, [
            _vm._v(_vm._s(h.nama))
          ])
        })
      )
    ]),
    _vm._v(" "),
    _c("td", [
      _c(
        "select",
        {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.data[_vm.index].jam_id,
              expression: "data[index].jam_id"
            }
          ],
          staticClass: "form-control",
          attrs: { disabled: !_vm.saved },
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
                _vm.data[_vm.index],
                "jam_id",
                $event.target.multiple ? $$selectedVal : $$selectedVal[0]
              )
            }
          }
        },
        _vm._l(_vm.jam, function(j) {
          return _c("option", { domProps: { value: j.id } }, [
            _vm._v(_vm._s(j.range_jam))
          ])
        })
      )
    ]),
    _vm._v(" "),
    _c("td", { staticClass: "actions" }, [
      !_vm.saved
        ? _c(
            "a",
            {
              staticClass: "btn btn-sm btn-danger",
              on: {
                click: function($event) {
                  _vm.handleHapus(_vm.data[_vm.index].id)
                }
              }
            },
            [_c("i", { staticClass: "fa fa-times" })]
          )
        : _vm._e(),
      _vm._v(" "),
      !_vm.saved
        ? _c(
            "a",
            {
              staticClass: "btn btn-sm btn-danger",
              on: { click: _vm.handleEdit }
            },
            [_c("i", { staticClass: "fa fa-edit" })]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.saved
        ? _c(
            "a",
            {
              staticClass: "btn btn-sm btn-success",
              on: {
                click: function($event) {
                  _vm.handleSimpan(_vm.data[_vm.index].id)
                }
              }
            },
            [_c("i", { staticClass: "fa fa-save" })]
          )
        : _vm._e()
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-7f3d9238", module.exports)
  }
}

/***/ }),

/***/ 341:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container-fluid" }, [
    _c("div", { staticClass: "row-fluid" }, [
      _c("div", { staticClass: "form-group" }, [
        _c(
          "select",
          {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.params.dosen,
                expression: "params.dosen"
              }
            ],
            staticClass: "form-control",
            attrs: { id: "" },
            on: {
              change: [
                function($event) {
                  var $$selectedVal = Array.prototype.filter
                    .call($event.target.options, function(o) {
                      return o.selected
                    })
                    .map(function(o) {
                      var val = "_value" in o ? o._value : o.value
                      return val
                    })
                  _vm.$set(
                    _vm.params,
                    "dosen",
                    $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                  )
                },
                function($event) {
                  _vm.handleChange($event)
                }
              ]
            }
          },
          _vm._l(_vm.dosen, function(item) {
            return _c("option", { domProps: { value: item.id } }, [
              _vm._v(_vm._s(item.nama))
            ])
          })
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "widget-content" }, [
        _vm.params.dosen
          ? _c(
              "a",
              { staticClass: "btn btn-default", on: { click: _vm.add } },
              [_vm._v("Tambah")]
            )
          : _vm._e(),
        _vm._v(" "),
        _c("br"),
        _vm._v(" "),
        _c("br"),
        _vm._v(" "),
        _c("table", { staticClass: "table table-bordered" }, [
          _vm._m(0),
          _vm._v(" "),
          _c(
            "tbody",
            _vm._l(_vm.data, function(item, idx) {
              return _c("form-dosen", {
                key: idx,
                attrs: {
                  hari: _vm.hari,
                  jam: _vm.jam,
                  index: idx,
                  data: _vm.data
                },
                on: { handleHapus: _vm.hapus, handleSimpan: _vm.simpan }
              })
            })
          )
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Hari")]),
        _vm._v(" "),
        _c("th", [_vm._v("Jam")]),
        _vm._v(" "),
        _c("th", [_vm._v("Status")])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-2bfec111", module.exports)
  }
}

/***/ })

});