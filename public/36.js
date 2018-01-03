webpackJsonp([36],{

/***/ 260:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return url; });


var url = 'matakuliah';

/***/ }),

/***/ 283:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(260);
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
			data: {}
		};
	},

	methods: {
		simpan: function simpan() {
			var self = this;
			if (this.$route.meta.edit) {
				self.$http.put(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */] + '/' + self.id, this.data).then(function (res) {
					self.$router.push({ name: 'matakuliah-index' });
				});
			} else {
				self.$http.post(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */], this.data).then(function (res) {
					self.$router.push({ name: 'matakuliah-index' });
				});
			}
		},
		getdata: function getdata() {
			var self = this;
			self.$http.get(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */] + '/' + self.id, this.data).then(function (res) {
				Vue.set(self.$data, 'data', res.data);
			});
		}
	},
	created: function created() {
		if (this.$route.meta.edit) {
			this.getdata();
		}
	}
});

/***/ }),

/***/ 284:
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
              attrs: { for: "kode_mk" }
            },
            [_vm._v("Kode Matakuliah")]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-10" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.data.kode_mk,
                  expression: "data.kode_mk"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", id: "kode_mk" },
              domProps: { value: _vm.data.kode_mk },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.data, "kode_mk", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group" }, [
          _c(
            "label",
            { staticClass: "control-label col-md-2", attrs: { for: "nama" } },
            [_vm._v("Nama")]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-10" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.data.nama,
                  expression: "data.nama"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", id: "nama" },
              domProps: { value: _vm.data.nama },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.data, "nama", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group" }, [
          _c(
            "label",
            { staticClass: "control-label col-md-2", attrs: { for: "sks" } },
            [_vm._v("Sks")]
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
                    value: _vm.data.sks,
                    expression: "data.sks"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", id: "sks" },
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
                      "sks",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              [
                _c("option", { attrs: { value: "1" } }, [_vm._v("1")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "2" } }, [_vm._v("2")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "3" } }, [_vm._v("3")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "4" } }, [_vm._v("4")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "5" } }, [_vm._v("5")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "6" } }, [_vm._v("6")])
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group" }, [
          _c(
            "label",
            {
              staticClass: "control-label col-md-2",
              attrs: { for: "semester" }
            },
            [_vm._v("Semester")]
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
                    value: _vm.data.semester,
                    expression: "data.semester"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", id: "semester" },
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
                      "semester",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              [
                _c("option", { attrs: { value: "1" } }, [_vm._v("1")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "2" } }, [_vm._v("2")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "3" } }, [_vm._v("3")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "4" } }, [_vm._v("4")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "5" } }, [_vm._v("5")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "6" } }, [_vm._v("6")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "7" } }, [_vm._v("7")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "8" } }, [_vm._v("8")])
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group" }, [
          _c(
            "label",
            { staticClass: "control-label col-md-2", attrs: { for: "jenis" } },
            [_vm._v("Jenis")]
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
                    value: _vm.data.jenis,
                    expression: "data.jenis"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", id: "jenis" },
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
                      "jenis",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              [
                _c("option", { attrs: { value: "TEORI" } }, [_vm._v("Teori")]),
                _vm._v(" "),
                _c("option", { attrs: { value: "PRAKTIKUM" } }, [
                  _vm._v("Praktikum")
                ])
              ]
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
    require("vue-hot-reload-api")      .rerender("data-v-895fad88", module.exports)
  }
}

/***/ }),

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(283)
/* template */
var __vue_template__ = __webpack_require__(284)
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
Component.options.__file = "resources\\assets\\admin\\components\\matakuliah\\form.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-895fad88", Component.options)
  } else {
    hotAPI.reload("data-v-895fad88", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});