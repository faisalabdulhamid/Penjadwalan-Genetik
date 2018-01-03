webpackJsonp([45],{

/***/ 242:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(287)
}
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(289)
/* template */
var __vue_template__ = __webpack_require__(290)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-10c91825"
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
Component.options.__file = "resources\\assets\\admin\\components\\ruangan\\index.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-10c91825", Component.options)
  } else {
    hotAPI.reload("data-v-10c91825", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 261:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return url; });


var url = 'ruangan';

/***/ }),

/***/ 287:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(288);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("7a21f54a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-10c91825\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./index.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-10c91825\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./index.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 288:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(5)(undefined);
// imports


// module
exports.push([module.i, "\n.actions[data-v-10c91825]{\n\twidth: 100px;\n}\n", ""]);

// exports


/***/ }),

/***/ 289:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(261);
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
	name: 'Index',
	data: function data() {
		return {
			table: {},
			url: __WEBPACK_IMPORTED_MODULE_0__config_env__["c" /* base_url */] + '/' + __WEBPACK_IMPORTED_MODULE_1__config__["a" /* url */]
		};
	},

	methods: {
		getdata: function getdata() {
			var self = this;
			self.$http.get('' + self.url).then(function (res) {
				Vue.set(self.$data, 'table', res.data);
			});
		},
		prev: function prev() {
			this.url = this.table.prev_page_url;
			this.getdata();
		},
		next: function next() {
			this.url = this.table.next_page_url;
			this.getdata();
		},
		hapus: function hapus(id) {
			var self = this;
			self.$swal({
				title: "Apakah anda yakin menghapus Data Ini ?",
				text: "",
				type: "warning",
				showCancelButton: true
			}).then(function (result) {
				if (result.value) {
					self.$http.delete(self.url + '/' + id).then(function (res) {
						self.getdata();
					});
				}
			});
		}
	},
	created: function created() {
		this.getdata();
	}
});

/***/ }),

/***/ 290:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container-fluid" }, [
    _c(
      "div",
      { staticClass: "row-fluid" },
      [
        _c(
          "router-link",
          {
            staticClass: "btn btn-sm btn-default pull-right",
            attrs: { to: { name: "ruangan-tambah" } }
          },
          [_c("i", { staticClass: "fa fa-plus" })]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "widget-content" }, [
          _c("table", { staticClass: "table table-bordered" }, [
            _vm._m(0),
            _vm._v(" "),
            _c(
              "tbody",
              _vm._l(_vm.table.data, function(item) {
                return _c("tr", [
                  _c("td", [_vm._v(_vm._s(item.nama))]),
                  _vm._v(" "),
                  _c("td", [_vm._v(_vm._s(item.kapasitas))]),
                  _vm._v(" "),
                  _c("td", [_vm._v(_vm._s(item.jenis))]),
                  _vm._v(" "),
                  _c(
                    "td",
                    { staticClass: "actions" },
                    [
                      _c(
                        "router-link",
                        {
                          staticClass: "btn btn-sm btn-default",
                          attrs: {
                            to: {
                              name: "ruangan-ubah",
                              params: { id: item.id }
                            }
                          }
                        },
                        [_c("i", { staticClass: "fa fa-pencil" })]
                      ),
                      _vm._v(" "),
                      _c(
                        "a",
                        {
                          staticClass: "btn btn-sm btn-default",
                          on: {
                            click: function($event) {
                              _vm.hapus(item.id)
                            }
                          }
                        },
                        [_c("i", { staticClass: "fa fa-trash" })]
                      )
                    ],
                    1
                  )
                ])
              })
            ),
            _vm._v(" "),
            _vm.table.prev_page_url || _vm.table.next_page_url
              ? _c("tfoot", [
                  _c("tr", [
                    _c("td", { attrs: { colspan: "4" } }, [
                      _c(
                        "a",
                        {
                          staticClass: "btn btn-sm btn-default",
                          attrs: { disabled: !_vm.table.prev_page_url },
                          on: { click: _vm.prev }
                        },
                        [_c("i", { staticClass: "fa fa-arrow-left" })]
                      ),
                      _vm._v(" "),
                      _c(
                        "a",
                        {
                          staticClass: "btn btn-sm btn-default pull-right",
                          attrs: { disabled: !_vm.table.next_page_url },
                          on: { click: _vm.next }
                        },
                        [_c("i", { staticClass: "fa fa-arrow-right" })]
                      )
                    ])
                  ])
                ])
              : _vm._e()
          ])
        ])
      ],
      1
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Nama")]),
        _vm._v(" "),
        _c("th", [_vm._v("Kapasitas")]),
        _vm._v(" "),
        _c("th", [_vm._v("Jenis")]),
        _vm._v(" "),
        _c("th", [_vm._v("#")])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-10c91825", module.exports)
  }
}

/***/ })

});