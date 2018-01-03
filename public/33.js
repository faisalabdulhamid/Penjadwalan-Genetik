webpackJsonp([33],{

/***/ 264:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return url; });


var url = 'tahun-ajaran';

/***/ }),

/***/ 315:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(264);
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
					self.$router.push({ name: 'tahun-ajaran-index' });
				});
			} else {
				self.$http.post(__WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */], this.data).then(function (res) {
					self.$router.push({ name: 'tahun-ajaran-index' });
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

/***/ 316:
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
              attrs: { for: "tahun_ajaran" }
            },
            [_vm._v("Tahun Ajaran")]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-10" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.data.tahun_ajaran,
                  expression: "data.tahun_ajaran"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", id: "tahun_ajaran" },
              domProps: { value: _vm.data.tahun_ajaran },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.data, "tahun_ajaran", $event.target.value)
                }
              }
            })
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
    require("vue-hot-reload-api")      .rerender("data-v-d99b472a", module.exports)
  }
}

/***/ }),

/***/ 60:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(315)
/* template */
var __vue_template__ = __webpack_require__(316)
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
Component.options.__file = "resources\\assets\\admin\\components\\tahun-ajaran\\form.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-d99b472a", Component.options)
  } else {
    hotAPI.reload("data-v-d99b472a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});