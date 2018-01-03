webpackJsonp([37],{

/***/ 265:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return url; });


var url = 'kelas';

/***/ }),

/***/ 323:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(265);
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
					self.$router.push({ name: 'kelas-index' });
				});
			} else {
				self.$http.post(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */], this.data).then(function (res) {
					self.$router.push({ name: 'kelas-index' });
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

/***/ 324:
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
            { staticClass: "control-label col-md-2", attrs: { for: "kelas" } },
            [_vm._v("Kelas")]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-10" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.data.kelas,
                  expression: "data.kelas"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", id: "kelas" },
              domProps: { value: _vm.data.kelas },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.data, "kelas", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        !_vm.$route.meta.edit
          ? _c("div", { staticClass: "form-group" }, [
              _c(
                "label",
                {
                  staticClass: "control-label col-md-2",
                  attrs: { for: "banyak" }
                },
                [_vm._v("Banyak")]
              ),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-10" }, [
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.data.banyak,
                      expression: "data.banyak"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { type: "text", id: "banyak" },
                  domProps: { value: _vm.data.banyak },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.data, "banyak", $event.target.value)
                    }
                  }
                })
              ])
            ])
          : _vm._e(),
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
    require("vue-hot-reload-api")      .rerender("data-v-c7da76be", module.exports)
  }
}

/***/ }),

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(323)
/* template */
var __vue_template__ = __webpack_require__(324)
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
Component.options.__file = "resources\\assets\\admin\\components\\kelas\\form.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-c7da76be", Component.options)
  } else {
    hotAPI.reload("data-v-c7da76be", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});