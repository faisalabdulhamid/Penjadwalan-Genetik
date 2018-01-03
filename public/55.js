webpackJsonp([55],{

/***/ 239:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(277)
/* template */
var __vue_template__ = __webpack_require__(278)
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
Component.options.__file = "resources\\assets\\admin\\components\\matakuliah\\App.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-333b378e", Component.options)
  } else {
    hotAPI.reload("data-v-333b378e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 277:
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



/* harmony default export */ __webpack_exports__["default"] = ({
	name: 'App',
	components: {
		'Breadcrumb': function Breadcrumb(resolve) {
			__webpack_require__.e/* require */(29/* duplicate */).then(function() { var __WEBPACK_AMD_REQUIRE_ARRAY__ = [__webpack_require__(258)]; ((resolve).apply(null, __WEBPACK_AMD_REQUIRE_ARRAY__));}.bind(this)).catch(__webpack_require__.oe);
		}
	},
	data: function data() {
		return {
			app_name: __WEBPACK_IMPORTED_MODULE_0__config_env__["a" /* app_name */],
			author: __WEBPACK_IMPORTED_MODULE_0__config_env__["b" /* author */],
			base_url: __WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */],
			url: 'dosen'
		};
	}
});

/***/ }),

/***/ 278:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "content" },
    [
      _c("div", { staticClass: "header" }, [
        _c("h1", { staticClass: "page-title" }, [
          _vm._v(_vm._s(_vm.$route.meta.page))
        ])
      ]),
      _vm._v(" "),
      _c("Breadcrumb", { key: _vm.$router.fullPath }),
      _vm._v(" "),
      _c("router-view", { key: _vm.$router.fullPath })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-333b378e", module.exports)
  }
}

/***/ })

});