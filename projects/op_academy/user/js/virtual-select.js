/*!
 * Virtual Select v1.0.39
 * https://sa-si-dev.github.io/virtual-select
 * Licensed under MIT (https://github.com/sa-si-dev/virtual-select/blob/master/LICENSE)
 */ !(function () {
    "use strict";
    function e(e) {
      return (
        (function (e) {
          if (Array.isArray(e)) return t(e);
        })(e) ||
        (function (e) {
          if (
            ("undefined" != typeof Symbol && null != e[Symbol.iterator]) ||
            null != e["@@iterator"]
          )
            return Array.from(e);
        })(e) ||
        (function (e, i) {
          if (e) {
            if ("string" == typeof e) return t(e, i);
            var o = Object.prototype.toString.call(e).slice(8, -1);
            return (
              "Object" === o && e.constructor && (o = e.constructor.name),
              "Map" === o || "Set" === o
                ? Array.from(e)
                : "Arguments" === o ||
                  /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(o)
                ? t(e, i)
                : void 0
            );
          }
        })(e) ||
        (function () {
          throw new TypeError(
            "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
          );
        })()
      );
    }
    function t(e, t) {
      (null == t || t > e.length) && (t = e.length);
      for (var i = 0, o = new Array(t); i < t; i++) o[i] = e[i];
      return o;
    }
    function i(e) {
      return (i =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
          ? function (e) {
              return typeof e;
            }
          : function (e) {
              return e &&
                "function" == typeof Symbol &&
                e.constructor === Symbol &&
                e !== Symbol.prototype
                ? "symbol"
                : typeof e;
            })(e);
    }
    function o(e, t) {
      for (var o = 0; o < t.length; o++) {
        var s = t[o];
        (s.enumerable = s.enumerable || !1),
          (s.configurable = !0),
          "value" in s && (s.writable = !0),
          Object.defineProperty(
            e,
            ((n = s.key),
            (r = void 0),
            (r = (function (e, t) {
              if ("object" !== i(e) || null === e) return e;
              var o = e[Symbol.toPrimitive];
              if (void 0 !== o) {
                var s = o.call(e, t || "default");
                if ("object" !== i(s)) return s;
                throw new TypeError(
                  "@@toPrimitive must return a primitive value."
                );
              }
              return ("string" === t ? String : Number)(e);
            })(n, "string")),
            "symbol" === i(r) ? r : String(r)),
            s
          );
      }
      var n, r;
    }
    var s = (function () {
      function t() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, t);
      }
      var s, n, r;
      return (
        (s = t),
        (r = [
          {
            key: "getString",
            value: function (e) {
              return e || 0 === e ? e.toString() : "";
            },
          },
          {
            key: "convertToBoolean",
            value: function (e) {
              var t =
                arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
              return !0 === e || "true" === e || (!1 !== e && "false" !== e && t);
            },
          },
          {
            key: "isEmpty",
            value: function (e) {
              var t = !1;
              return (
                e
                  ? Array.isArray(e)
                    ? 0 === e.length && (t = !0)
                    : "object" === i(e) && 0 === Object.keys(e).length && (t = !0)
                  : (t = !0),
                t
              );
            },
          },
          {
            key: "isNotEmpty",
            value: function (e) {
              return !this.isEmpty(e);
            },
          },
          {
            key: "removeItemFromArray",
            value: function (t, i) {
              var o =
                arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
              if (!Array.isArray(t) || !t.length) return t;
              var s = o ? e(t) : t,
                n = s.indexOf(i);
              return -1 !== n && s.splice(n, 1), s;
            },
          },
          {
            key: "removeArrayEmpty",
            value: function (e) {
              return Array.isArray(e) && e.length
                ? e.filter(function (e) {
                    return !!e;
                  })
                : [];
            },
          },
          {
            key: "getRandomInt",
            value: function (e) {
              var t =
                  arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : 0,
                i = Math.ceil(t),
                o = Math.floor(e);
              return Math.floor(Math.random() * (o - i - 1)) + i;
            },
          },
          {
            key: "regexEscape",
            value: function (e) {
              return e.replace(/[-/\\^$*+?.()|[\]{}]/g, "\\$&");
            },
          },
          {
            key: "normalizeString",
            value: function (e) {
              return e.normalize("NFD").replace(/[^\w]/g, "");
            },
          },
        ]),
        (n = null) && o(s.prototype, n),
        r && o(s, r),
        Object.defineProperty(s, "prototype", { writable: !1 }),
        t
      );
    })();
    function n(e) {
      return (n =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
          ? function (e) {
              return typeof e;
            }
          : function (e) {
              return e &&
                "function" == typeof Symbol &&
                e.constructor === Symbol &&
                e !== Symbol.prototype
                ? "symbol"
                : typeof e;
            })(e);
    }
    function r(e, t) {
      return (
        (function (e) {
          if (Array.isArray(e)) return e;
        })(e) ||
        (function (e, t) {
          var i =
            null == e
              ? null
              : ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
                e["@@iterator"];
          if (null != i) {
            var o,
              s,
              n,
              r,
              a = [],
              l = !0,
              u = !1;
            try {
              if (((n = (i = i.call(e)).next), 0 === t)) {
                if (Object(i) !== i) return;
                l = !1;
              } else
                for (
                  ;
                  !(l = (o = n.call(i)).done) &&
                  (a.push(o.value), a.length !== t);
                  l = !0
                );
            } catch (e) {
              (u = !0), (s = e);
            } finally {
              try {
                if (!l && null != i.return && ((r = i.return()), Object(r) !== r))
                  return;
              } finally {
                if (u) throw s;
              }
            }
            return a;
          }
        })(e, t) ||
        l(e, t) ||
        (function () {
          throw new TypeError(
            "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
          );
        })()
      );
    }
    function a(e) {
      return (
        (function (e) {
          if (Array.isArray(e)) return u(e);
        })(e) ||
        (function (e) {
          if (
            ("undefined" != typeof Symbol && null != e[Symbol.iterator]) ||
            null != e["@@iterator"]
          )
            return Array.from(e);
        })(e) ||
        l(e) ||
        (function () {
          throw new TypeError(
            "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
          );
        })()
      );
    }
    function l(e, t) {
      if (e) {
        if ("string" == typeof e) return u(e, t);
        var i = Object.prototype.toString.call(e).slice(8, -1);
        return (
          "Object" === i && e.constructor && (i = e.constructor.name),
          "Map" === i || "Set" === i
            ? Array.from(e)
            : "Arguments" === i ||
              /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i)
            ? u(e, t)
            : void 0
        );
      }
    }
    function u(e, t) {
      (null == t || t > e.length) && (t = e.length);
      for (var i = 0, o = new Array(t); i < t; i++) o[i] = e[i];
      return o;
    }
    function p(e, t) {
      for (var i = 0; i < t.length; i++) {
        var o = t[i];
        (o.enumerable = o.enumerable || !1),
          (o.configurable = !0),
          "value" in o && (o.writable = !0),
          Object.defineProperty(
            e,
            ((s = o.key),
            (r = void 0),
            (r = (function (e, t) {
              if ("object" !== n(e) || null === e) return e;
              var i = e[Symbol.toPrimitive];
              if (void 0 !== i) {
                var o = i.call(e, t || "default");
                if ("object" !== n(o)) return o;
                throw new TypeError(
                  "@@toPrimitive must return a primitive value."
                );
              }
              return ("string" === t ? String : Number)(e);
            })(s, "string")),
            "symbol" === n(r) ? r : String(r)),
            o
          );
      }
      var s, r;
    }
    var c = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, i, o;
      return (
        (t = e),
        (o = [
          {
            key: "addClass",
            value: function (t, i) {
              if (t) {
                var o = i.split(" ");
                e.getElements(t).forEach(function (e) {
                  var t;
                  (t = e.classList).add.apply(t, a(o));
                });
              }
            },
          },
          {
            key: "removeClass",
            value: function (t, i) {
              if (t) {
                var o = i.split(" ");
                e.getElements(t).forEach(function (e) {
                  var t;
                  (t = e.classList).remove.apply(t, a(o));
                });
              }
            },
          },
          {
            key: "toggleClass",
            value: function (t, i, o) {
              var s;
              t &&
                (void 0 !== o && (s = Boolean(o)),
                e.getElements(t).forEach(function (e) {
                  e.classList.toggle(i, s);
                }));
            },
          },
          {
            key: "hasClass",
            value: function (e, t) {
              return !!e && e.classList.contains(t);
            },
          },
          {
            key: "hasEllipsis",
            value: function (e) {
              return !!e && e.scrollWidth > e.offsetWidth;
            },
          },
          {
            key: "getData",
            value: function (e, t, i) {
              if (e) {
                var o = e ? e.dataset[t] : "";
                return (
                  "number" === i
                    ? (o = parseFloat(o) || 0)
                    : "true" === o
                    ? (o = !0)
                    : "false" === o && (o = !1),
                  o
                );
              }
            },
          },
          {
            key: "setData",
            value: function (e, t, i) {
              e && (e.dataset[t] = i);
            },
          },
          {
            key: "setAttr",
            value: function (e, t, i) {
              e && e.setAttribute(t, i);
            },
          },
          {
            key: "setAttrFromEle",
            value: function (e, t, i, o) {
              var s = {};
              i.forEach(function (t) {
                s[t] = e.getAttribute(t);
              }),
                i.forEach(function (e) {
                  var i = s[e];
                  (i || (-1 !== o.indexOf(e) && "" === i)) &&
                    t.setAttribute(e, i);
                });
            },
          },
          {
            key: "setStyle",
            value: function (e, t, i) {
              e && (e.style[t] = i);
            },
          },
          {
            key: "setStyles",
            value: function (e, t) {
              e &&
                t &&
                Object.keys(t).forEach(function (i) {
                  e.style[i] = t[i];
                });
            },
          },
          {
            key: "setAria",
            value: function (e, t, i) {
              var o = t;
              "role" !== o && (o = "aria-".concat(o)), e.setAttribute(o, i);
            },
          },
          {
            key: "getElements",
            value: function (e) {
              return e ? (void 0 === e.forEach ? [e] : e) : [];
            },
          },
          {
            key: "addEvent",
            value: function (t, i, o) {
              t &&
                s.removeArrayEmpty(i.split(" ")).forEach(function (i) {
                  e.getElements(t).forEach(function (e) {
                    e.addEventListener(i, o);
                  });
                });
            },
          },
          {
            key: "dispatchEvent",
            value: function (t, i) {
              var o =
                arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
              if (t) {
                var s = e.getElements(t);
                setTimeout(function () {
                  s.forEach(function (e) {
                    e.dispatchEvent(new CustomEvent(i, { bubbles: o }));
                  });
                }, 0);
              }
            },
          },
          {
            key: "getAttributesText",
            value: function (e) {
              var t = "";
              return e
                ? (Object.entries(e).forEach(function (e) {
                    var i = r(e, 2),
                      o = i[0],
                      s = i[1];
                    void 0 !== s && (t += " ".concat(o, '="').concat(s, '" '));
                  }),
                  t)
                : t;
            },
          },
          {
            key: "convertPropToDataAttr",
            value: function (e) {
              return e
                ? "data-"
                    .concat(e)
                    .replace(/([A-Z])/g, "-$1")
                    .toLowerCase()
                : "";
            },
          },
          {
            key: "changeTabIndex",
            value: function (t, i) {
              t
                ? e.getElements(t).forEach(function (e) {
                    e.tabIndex = i;
                  })
                : console.log(t, "Invalid element provided.");
            },
          },
        ]),
        (i = null) && p(t.prototype, i),
        o && p(t, o),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function h(e, t) {
      var i = Object.keys(e);
      if (Object.getOwnPropertySymbols) {
        var o = Object.getOwnPropertySymbols(e);
        t &&
          (o = o.filter(function (t) {
            return Object.getOwnPropertyDescriptor(e, t).enumerable;
          })),
          i.push.apply(i, o);
      }
      return i;
    }
    function d(e) {
      for (var t = 1; t < arguments.length; t++) {
        var i = null != arguments[t] ? arguments[t] : {};
        t % 2
          ? h(Object(i), !0).forEach(function (t) {
              v(e, t, i[t]);
            })
          : Object.getOwnPropertyDescriptors
          ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(i))
          : h(Object(i)).forEach(function (t) {
              Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(i, t));
            });
      }
      return e;
    }
    function v(e, t, i) {
      return (
        (t = S(t)) in e
          ? Object.defineProperty(e, t, {
              value: i,
              enumerable: !0,
              configurable: !0,
              writable: !0,
            })
          : (e[t] = i),
        e
      );
    }
    function f(e) {
      return (f =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
          ? function (e) {
              return typeof e;
            }
          : function (e) {
              return e &&
                "function" == typeof Symbol &&
                e.constructor === Symbol &&
                e !== Symbol.prototype
                ? "symbol"
                : typeof e;
            })(e);
    }
    function y(e, t) {
      return (
        (function (e) {
          if (Array.isArray(e)) return e;
        })(e) ||
        (function (e, t) {
          var i =
            null == e
              ? null
              : ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
                e["@@iterator"];
          if (null != i) {
            var o,
              s,
              n,
              r,
              a = [],
              l = !0,
              u = !1;
            try {
              if (((n = (i = i.call(e)).next), 0 === t)) {
                if (Object(i) !== i) return;
                l = !1;
              } else
                for (
                  ;
                  !(l = (o = n.call(i)).done) &&
                  (a.push(o.value), a.length !== t);
                  l = !0
                );
            } catch (e) {
              (u = !0), (s = e);
            } finally {
              try {
                if (!l && null != i.return && ((r = i.return()), Object(r) !== r))
                  return;
              } finally {
                if (u) throw s;
              }
            }
            return a;
          }
        })(e, t) ||
        m(e, t) ||
        (function () {
          throw new TypeError(
            "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
          );
        })()
      );
    }
    function b(e) {
      return (
        (function (e) {
          if (Array.isArray(e)) return g(e);
        })(e) ||
        (function (e) {
          if (
            ("undefined" != typeof Symbol && null != e[Symbol.iterator]) ||
            null != e["@@iterator"]
          )
            return Array.from(e);
        })(e) ||
        m(e) ||
        (function () {
          throw new TypeError(
            "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
          );
        })()
      );
    }
    function m(e, t) {
      if (e) {
        if ("string" == typeof e) return g(e, t);
        var i = Object.prototype.toString.call(e).slice(8, -1);
        return (
          "Object" === i && e.constructor && (i = e.constructor.name),
          "Map" === i || "Set" === i
            ? Array.from(e)
            : "Arguments" === i ||
              /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i)
            ? g(e, t)
            : void 0
        );
      }
    }
    function g(e, t) {
      (null == t || t > e.length) && (t = e.length);
      for (var i = 0, o = new Array(t); i < t; i++) o[i] = e[i];
      return o;
    }
    function O(e, t) {
      for (var i = 0; i < t.length; i++) {
        var o = t[i];
        (o.enumerable = o.enumerable || !1),
          (o.configurable = !0),
          "value" in o && (o.writable = !0),
          Object.defineProperty(e, S(o.key), o);
      }
    }
    function S(e) {
      var t = (function (e, t) {
        if ("object" !== f(e) || null === e) return e;
        var i = e[Symbol.toPrimitive];
        if (void 0 !== i) {
          var o = i.call(e, t || "default");
          if ("object" !== f(o)) return o;
          throw new TypeError("@@toPrimitive must return a primitive value.");
        }
        return ("string" === t ? String : Number)(e);
      })(e, "string");
      return "symbol" === f(t) ? t : String(t);
    }
    var x,
      w = { 13: "onEnterPress", 38: "onUpArrowPress", 40: "onDownArrowPress" },
      k = ["autofocus", "disabled", "multiple", "required"],
      E = [
        "autofocus",
        "class",
        "disabled",
        "id",
        "multiple",
        "name",
        "placeholder",
        "required",
      ],
      C = [
        "additionalClasses",
        "aliasKey",
        "allOptionsSelectedText",
        "allowNewOption",
        "alwaysShowSelectedOptionsCount",
        "alwaysShowSelectedOptionsLabel",
        "ariaLabelledby",
        "ariaLabelText",
        "autoSelectFirstOption",
        "clearButtonText",
        "descriptionKey",
        "disableAllOptionsSelectedText",
        "disableOptionGroupCheckbox",
        "disableSelectAll",
        "disableValidation",
        "dropboxWidth",
        "dropboxWrapper",
        "emptyValue",
        "enableSecureText",
        "focusSelectedOptionOnOpen",
        "hasOptionDescription",
        "hideClearButton",
        "hideValueTooltipOnSelectAll",
        "keepAlwaysOpen",
        "labelKey",
        "markSearchResults",
        "maxValues",
        "maxWidth",
        "minValues",
        "moreText",
        "noOfDisplayValues",
        "noOptionsText",
        "noSearchResultsText",
        "optionHeight",
        "optionSelectedText",
        "optionsCount",
        "optionsSelectedText",
        "popupDropboxBreakpoint",
        "popupPosition",
        "position",
        "search",
        "searchByStartsWith",
        "searchDelay",
        "searchFormLabel",
        "searchGroup",
        "searchNormalize",
        "searchPlaceholderText",
        "selectAllOnlyVisible",
        "selectAllText",
        "setValueAsArray",
        "showDropboxAsPopup",
        "showOptionsOnlyOnSearch",
        "showSelectedOptionsFirst",
        "showValueAsTags",
        "silentInitialValueSet",
        "textDirection",
        "tooltipAlignment",
        "tooltipFontSize",
        "tooltipMaxWidth",
        "updatePositionThrottle",
        "useGroupValue",
        "valueKey",
        "zIndex",
      ],
      A = (function () {
        function e(t) {
          !(function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, e);
          try {
            this.createSecureTextElements(),
              this.setProps(t),
              this.setDisabledOptions(t.disabledOptions),
              this.setOptions(t.options),
              this.render();
          } catch (e) {
            console.warn("Couldn't initiate Virtual Select"), console.error(e);
          }
        }
        var t, i, o;
        return (
          (t = e),
          (o = [
            {
              key: "init",
              value: function (t) {
                var i = t.ele;
                if (i) {
                  var o = !1;
                  if ("string" == typeof i) {
                    var s = (i = document.querySelectorAll(i)).length;
                    if (0 === s) return;
                    1 === s && (o = !0);
                  }
                  (void 0 !== i.length && void 0 !== i.forEach) ||
                    ((i = [i]), (o = !0));
                  var n = [];
                  return (
                    i.forEach(function (i) {
                      i.virtualSelect
                        ? n.push(i.virtualSelect)
                        : ((t.ele = i),
                          "SELECT" === i.tagName && e.setPropsFromSelect(t),
                          n.push(new e(t)));
                    }),
                    o ? n[0] : n
                  );
                }
              },
            },
            {
              key: "getAttrProps",
              value: function () {
                var e = c.convertPropToDataAttr,
                  t = {};
                return (
                  E.forEach(function (e) {
                    t[e] = e;
                  }),
                  C.forEach(function (i) {
                    t[e(i)] = i;
                  }),
                  t
                );
              },
            },
            {
              key: "setPropsFromSelect",
              value: function (e) {
                var t = e.ele,
                  i = [],
                  o = [],
                  s = (function e(t) {
                    var s = [];
                    return (
                      Array.from(t.children).forEach(function (t) {
                        var n = t.value,
                          r = { value: n };
                        "OPTGROUP" === t.tagName
                          ? ((r.label = t.getAttribute("label")),
                            (r.options = e(t)))
                          : (r.label = t.innerHTML),
                          s.push(r),
                          t.disabled && i.push(n),
                          t.selected && o.push(n);
                      }),
                      s
                    );
                  })(t),
                  n = document.createElement("div");
                c.setAttrFromEle(t, n, Object.keys(x), k),
                  t.parentNode.insertBefore(n, t),
                  t.remove(),
                  (e.ele = n),
                  (e.options = s),
                  (e.disabledOptions = i),
                  (e.selectedValue = o);
              },
            },
            {
              key: "onFormReset",
              value: function (e) {
                var t = e.target.closest("form");
                t &&
                  t.querySelectorAll(".vscomp-ele-wrapper").forEach(function (e) {
                    e.parentElement.virtualSelect.reset(!0);
                  });
              },
            },
            {
              key: "onFormSubmit",
              value: function (t) {
                e.validate(t.target.closest("form")) || t.preventDefault();
              },
            },
            {
              key: "validate",
              value: function (e) {
                if (!e) return !0;
                var t = !1;
                return (
                  e.querySelectorAll(".vscomp-ele-wrapper").forEach(function (e) {
                    var i = e.parentElement.virtualSelect.validate();
                    t || i || (t = !0);
                  }),
                  !t
                );
              },
            },
            {
              key: "reset",
              value: function () {
                this.virtualSelect.reset();
              },
            },
            {
              key: "setValueMethod",
              value: function () {
                var e;
                (e = this.virtualSelect).setValueMethod.apply(e, arguments);
              },
            },
            {
              key: "setOptionsMethod",
              value: function () {
                var e;
                (e = this.virtualSelect).setOptionsMethod.apply(e, arguments);
              },
            },
            {
              key: "setDisabledOptionsMethod",
              value: function () {
                var e;
                (e = this.virtualSelect).setDisabledOptionsMethod.apply(
                  e,
                  arguments
                );
              },
            },
            {
              key: "setEnabledOptionsMethod",
              value: function () {
                var e;
                (e = this.virtualSelect).setEnabledOptionsMethod.apply(
                  e,
                  arguments
                );
              },
            },
            {
              key: "toggleSelectAll",
              value: function (e) {
                this.virtualSelect.toggleAllOptions(e);
              },
            },
            {
              key: "isAllSelected",
              value: function () {
                return this.virtualSelect.isAllSelected;
              },
            },
            {
              key: "addOptionMethod",
              value: function (e) {
                this.virtualSelect.addOption(e, !0);
              },
            },
            {
              key: "getNewValueMethod",
              value: function () {
                return this.virtualSelect.getNewValue();
              },
            },
            {
              key: "getDisplayValueMethod",
              value: function () {
                return this.virtualSelect.getDisplayValue();
              },
            },
            {
              key: "getSelectedOptionsMethod",
              value: function (e) {
                return this.virtualSelect.getSelectedOptions(e);
              },
            },
            {
              key: "getDisabledOptionsMethod",
              value: function () {
                return this.virtualSelect.getDisabledOptions();
              },
            },
            {
              key: "openMethod",
              value: function () {
                return this.virtualSelect.openDropbox();
              },
            },
            {
              key: "closeMethod",
              value: function () {
                return this.virtualSelect.closeDropbox();
              },
            },
            {
              key: "focusMethod",
              value: function () {
                return this.virtualSelect.focus();
              },
            },
            {
              key: "enableMethod",
              value: function () {
                return this.virtualSelect.enable();
              },
            },
            {
              key: "disableMethod",
              value: function () {
                return this.virtualSelect.disable();
              },
            },
            {
              key: "destroyMethod",
              value: function () {
                return this.virtualSelect.destroy();
              },
            },
            {
              key: "validateMethod",
              value: function () {
                return this.virtualSelect.validate();
              },
            },
            {
              key: "toggleRequiredMethod",
              value: function (e) {
                return this.virtualSelect.toggleRequired(e);
              },
            },
            {
              key: "onResizeMethod",
              value: function () {
                document
                  .querySelectorAll(".vscomp-ele-wrapper")
                  .forEach(function (e) {
                    e.parentElement.virtualSelect.onResize();
                  });
              },
            },
          ]),
          (i = [
            {
              key: "render",
              value: function () {
                if (this.$ele) {
                  var e = this.uniqueId,
                    t = "vscomp-wrapper",
                    i = this.getTooltipAttrText(this.placeholder, !0, !0),
                    o = this.getTooltipAttrText(this.clearButtonText),
                    s = this.ariaLabelledby
                      ? 'aria-labelledby="'.concat(this.ariaLabelledby, '"')
                      : "",
                    n = this.ariaLabelText
                      ? 'aria-label="'.concat(this.ariaLabelText, '"')
                      : "",
                    r = !1;
                  this.additionalClasses &&
                    (t += " ".concat(this.additionalClasses)),
                    this.multiple &&
                      ((t += " multiple"),
                      this.disableSelectAll || (t += " has-select-all")),
                    this.hideClearButton || (t += " has-clear-button"),
                    this.keepAlwaysOpen
                      ? ((t += " keep-always-open"), (r = !0))
                      : (t += " closed"),
                    this.showAsPopup && (t += " show-as-popup"),
                    this.hasSearch && (t += " has-search-input"),
                    this.showValueAsTags && (t += " show-value-as-tags"),
                    this.textDirection &&
                      (t += " text-direction-".concat(this.textDirection)),
                    this.popupPosition &&
                      (t += " popup-position-".concat(
                        this.popupPosition.toLowerCase()
                      ));
                  var a = '<div id="vscomp-ele-wrapper-'
                    .concat(e, '" class="vscomp-ele-wrapper ')
                    .concat(
                      t,
                      '" tabindex="0"\n        role="combobox" aria-haspopup="listbox" aria-controls="vscomp-dropbox-container-'
                    )
                    .concat(e, '"\n        aria-expanded="')
                    .concat(r, '" ')
                    .concat(s, " ")
                    .concat(n, '\n      >\n        <input type="hidden" name="')
                    .concat(
                      this.name,
                      '" class="vscomp-hidden-input">\n\n        <div class="vscomp-toggle-button">\n          <div class="vscomp-value" '
                    )
                    .concat(i, ">\n            ")
                    .concat(
                      this.placeholder,
                      '\n          </div>\n\n          <div class="vscomp-arrow"></div>\n\n          <div class="vscomp-clear-button toggle-button-child" '
                    )
                    .concat(
                      o,
                      '>\n            <i class="vscomp-clear-icon"></i>\n          </div>\n        </div>\n\n        <section role="region" class="vscomp-live-region" aria-live="polite">\n          <p class="vscomp-live-region-title"></p>\n        </section>\n\n        '
                    )
                    .concat(
                      this.renderDropbox({ wrapperClasses: t }),
                      "\n      </div>"
                    );
                  (this.$ele.innerHTML = a),
                    (this.$body = document.querySelector("body")),
                    (this.$wrapper = this.$ele.querySelector(".vscomp-wrapper")),
                    (this.$ariaLiveElem = this.$ele.querySelector(
                      ".vscomp-live-region-title"
                    )),
                    this.hasDropboxWrapper
                      ? ((this.$allWrappers = [
                          this.$wrapper,
                          this.$dropboxWrapper,
                        ]),
                        (this.$dropboxContainer =
                          this.$dropboxWrapper.querySelector(
                            ".vscomp-dropbox-container"
                          )),
                        c.addClass(this.$dropboxContainer, "pop-comp-wrapper"))
                      : ((this.$allWrappers = [this.$wrapper]),
                        (this.$dropboxContainer = this.$wrapper.querySelector(
                          ".vscomp-dropbox-container"
                        ))),
                    (this.$toggleButton = this.$ele.querySelector(
                      ".vscomp-toggle-button"
                    )),
                    (this.$clearButton = this.$ele.querySelector(
                      ".vscomp-clear-button"
                    )),
                    (this.$valueText = this.$ele.querySelector(".vscomp-value")),
                    (this.$hiddenInput = this.$ele.querySelector(
                      ".vscomp-hidden-input"
                    )),
                    (this.$dropbox =
                      this.$dropboxContainer.querySelector(".vscomp-dropbox")),
                    (this.$dropboxCloseButton =
                      this.$dropboxContainer.querySelector(
                        ".vscomp-dropbox-close-button"
                      )),
                    (this.$search = this.$dropboxContainer.querySelector(
                      ".vscomp-search-wrapper"
                    )),
                    (this.$optionsContainer =
                      this.$dropboxContainer.querySelector(
                        ".vscomp-options-container"
                      )),
                    (this.$optionsList = this.$dropboxContainer.querySelector(
                      ".vscomp-options-list"
                    )),
                    (this.$options =
                      this.$dropboxContainer.querySelector(".vscomp-options")),
                    (this.$noOptions =
                      this.$dropboxContainer.querySelector(".vscomp-no-options")),
                    (this.$noSearchResults = this.$dropboxContainer.querySelector(
                      ".vscomp-no-search-results"
                    )),
                    this.afterRenderWrapper();
                }
              },
            },
            {
              key: "renderDropbox",
              value: function (e) {
                var t = e.wrapperClasses,
                  i =
                    "self" !== this.dropboxWrapper
                      ? document.querySelector(this.dropboxWrapper)
                      : null,
                  o = '<div id="vscomp-dropbox-container-'
                    .concat(
                      this.uniqueId,
                      '" role="listbox" class="vscomp-dropbox-container">\n        <div class="vscomp-dropbox">\n          <div class="vscomp-search-wrapper"></div>\n\n          <div class="vscomp-options-container">\n            <div class="vscomp-options-loader"></div>\n\n            <div class="vscomp-options-list">\n              <div class="vscomp-options"></div>\n            </div>\n          </div>\n\n          <div class="vscomp-options-bottom-freezer"></div>\n          <div class="vscomp-no-options">'
                    )
                    .concat(
                      this.noOptionsText,
                      '</div>\n          <div class="vscomp-no-search-results">'
                    )
                    .concat(
                      this.noSearchResultsText,
                      '</div>\n\n          <span class="vscomp-dropbox-close-button"><i class="vscomp-clear-icon"></i></span>\n        </div>\n      </div>\n'
                    );
                if (i) {
                  var s = document.createElement("div");
                  return (
                    (this.$dropboxWrapper = s),
                    (this.hasDropboxWrapper = !0),
                    (s.innerHTML = o),
                    i.appendChild(s),
                    c.addClass(s, "vscomp-dropbox-wrapper ".concat(t)),
                    ""
                  );
                }
                return (this.hasDropboxWrapper = !1), o;
              },
            },
            {
              key: "renderOptions",
              value: function () {
                var e,
                  t = this,
                  i = "",
                  o = this.getVisibleOptions(),
                  n = "",
                  r = "",
                  a = !(!this.markSearchResults || !this.searchValue),
                  l = this.labelRenderer,
                  u = this.disableOptionGroupCheckbox,
                  p = this.uniqueId,
                  c = this.searchGroup,
                  h = "function" == typeof l,
                  d = s.convertToBoolean;
                if (
                  (a &&
                    (e = new RegExp(
                      "(".concat(
                        s.regexEscape(this.searchValue),
                        ")(?!([^<]+)?>)"
                      ),
                      "gi"
                    )),
                  this.multiple && (n = '<span class="checkbox-icon"></span>'),
                  this.allowNewOption)
                ) {
                  var v = this.getTooltipAttrText("New Option");
                  r = '<span class="vscomp-new-option-icon" '.concat(
                    v,
                    "></span>"
                  );
                }
                o.forEach(function (o) {
                  var s,
                    v = o.index,
                    f = "vscomp-option",
                    y = t.getTooltipAttrText("", !0, !0),
                    b = n,
                    m = "",
                    g = "",
                    O = "",
                    S = d(o.isSelected),
                    x = "";
                  o.classNames && (f += " ".concat(o.classNames)),
                    o.isFocused && (f += " focused"),
                    o.isDisabled &&
                      ((f += " disabled"), (x = 'aria-disabled="true"')),
                    o.isGroupTitle && ((f += " group-title"), u && (b = "")),
                    S && (f += " selected"),
                    o.isGroupOption &&
                      ((f += " group-option"),
                      (O = 'data-group-index="'.concat(o.groupIndex, '"'))),
                    (s = h ? l(o) : o.label),
                    o.description &&
                      (g = '<div class="vscomp-option-description" '
                        .concat(y, ">")
                        .concat(o.description, "</div>")),
                    o.isCurrentNew
                      ? ((f += " current-new"), (m += r))
                      : !a ||
                        (o.isGroupTitle && !c) ||
                        (s = s.replace(e, "<mark>$1</mark>")),
                    (i += '<div role="option" aria-selected="'
                      .concat(S, '" id="vscomp-option-')
                      .concat(p, "-")
                      .concat(v, '"\n          class="')
                      .concat(f, '" data-value="')
                      .concat(o.value, '" data-index="')
                      .concat(v, '" data-visible-index="')
                      .concat(o.visibleIndex, '" tabindex="0" ')
                      .concat(O, " ")
                      .concat(x, "\n        >\n          ")
                      .concat(b, '\n          <span class="vscomp-option-text" ')
                      .concat(y, ">\n            ")
                      .concat(s, "\n          </span>\n          ")
                      .concat(g, "\n          ")
                      .concat(m, "\n        </div>"));
                }),
                  (this.$options.innerHTML = i),
                  (this.$visibleOptions =
                    this.$options.querySelectorAll(".vscomp-option")),
                  this.afterRenderOptions();
              },
            },
            {
              key: "renderSearch",
              value: function () {
                if (this.hasSearchContainer) {
                  var e = "",
                    t = "";
                  this.multiple &&
                    !this.disableSelectAll &&
                    (e =
                      '<span class="vscomp-toggle-all-button">\n          <span class="checkbox-icon vscomp-toggle-all-checkbox"></span>\n          <span class="vscomp-toggle-all-label">'.concat(
                        this.selectAllText,
                        "</span>\n        </span>"
                      )),
                    this.hasSearch &&
                      (t = '<label for="vscomp-search-input-'
                        .concat(
                          this.uniqueId,
                          '" class="vscomp-search-label" id="vscomp-search-label-'
                        )
                        .concat(this.uniqueId, '">')
                        .concat(
                          this.searchFormLabel,
                          '</label>\n      <input type="text" class="vscomp-search-input" placeholder="'
                        )
                        .concat(
                          this.searchPlaceholderText,
                          '" id="vscomp-search-input-'
                        )
                        .concat(
                          this.uniqueId,
                          '">\n      <span class="vscomp-search-clear">&times;</span>'
                        ));
                  var i = '<div class="vscomp-search-container">\n        '
                    .concat(e, "\n        ")
                    .concat(t, "\n      </div>");
                  (this.$search.innerHTML = i),
                    (this.$searchInput = this.$dropboxContainer.querySelector(
                      ".vscomp-search-input"
                    )),
                    (this.$searchClear = this.$dropboxContainer.querySelector(
                      ".vscomp-search-clear"
                    )),
                    (this.$toggleAllButton = this.$dropboxContainer.querySelector(
                      ".vscomp-toggle-all-button"
                    )),
                    (this.$toggleAllCheckbox =
                      this.$dropboxContainer.querySelector(
                        ".vscomp-toggle-all-checkbox"
                      )),
                    this.addEvent(this.$searchInput, "input", "onSearch"),
                    this.addEvent(this.$searchClear, "click", "onSearchClear"),
                    this.addEvent(
                      this.$toggleAllButton,
                      "click",
                      "onToggleAllOptions"
                    );
                }
              },
            },
            {
              key: "addEvents",
              value: function () {
                this.addEvent(document, "click", "onDocumentClick"),
                  this.addEvent(this.$allWrappers, "keydown", "onKeyDown"),
                  this.addEvent(
                    this.$toggleButton,
                    "click",
                    "onToggleButtonClick"
                  ),
                  this.addEvent(this.$clearButton, "click", "onClearButtonClick"),
                  this.addEvent(
                    this.$dropboxContainer,
                    "click",
                    "onDropboxContainerClick"
                  ),
                  this.addEvent(
                    this.$dropboxCloseButton,
                    "click",
                    "onDropboxCloseButtonClick"
                  ),
                  this.addEvent(
                    this.$optionsContainer,
                    "scroll",
                    "onOptionsScroll"
                  ),
                  this.addEvent(this.$options, "click", "onOptionsClick"),
                  this.addEvent(this.$options, "mouseover", "onOptionsMouseOver"),
                  this.addEvent(this.$options, "touchmove", "onOptionsTouchMove"),
                  this.addMutationObserver();
              },
            },
            {
              key: "addEvent",
              value: function (e, t, i) {
                var o = this;
                e &&
                  s.removeArrayEmpty(t.split(" ")).forEach(function (t) {
                    var s = "".concat(i, "-").concat(t),
                      n = o.events[s];
                    n || ((n = o[i].bind(o)), (o.events[s] = n)),
                      c.addEvent(e, t, n);
                  });
              },
            },
            {
              key: "onDocumentClick",
              value: function (e) {
                var t = e.target.closest(".vscomp-wrapper");
                t !== this.$wrapper &&
                  t !== this.$dropboxWrapper &&
                  this.isOpened() &&
                  this.closeDropbox();
              },
            },
            {
              key: "onKeyDown",
              value: function (e) {
                var t = e.which || e.keyCode,
                  i = w[t];
                document.activeElement === this.$searchInput &&
                (9 === t || (e.shiftKey && 9 === t))
                  ? this.closeDropbox()
                  : document.activeElement !== this.$wrapper ||
                    (27 !== t && "Escape" !== e.key) ||
                    !this.showAsPopup
                  ? i && this[i](e)
                  : this.closeDropbox();
              },
            },
            {
              key: "onEnterPress",
              value: function (e) {
                e.preventDefault(),
                  this.isOpened()
                    ? this.selectFocusedOption()
                    : this.openDropbox();
              },
            },
            {
              key: "onDownArrowPress",
              value: function (e) {
                e.preventDefault(),
                  this.isOpened()
                    ? this.focusOption({ direction: "next" })
                    : this.openDropbox();
              },
            },
            {
              key: "onUpArrowPress",
              value: function (e) {
                e.preventDefault(),
                  this.isOpened()
                    ? this.focusOption({ direction: "previous" })
                    : this.openDropbox();
              },
            },
            {
              key: "onToggleButtonClick",
              value: function (e) {
                var t = e.target;
                t.closest(".vscomp-value-tag-clear-button")
                  ? this.removeValue(t.closest(".vscomp-value-tag"))
                  : t.closest(".toggle-button-child") || this.toggleDropbox();
              },
            },
            {
              key: "onClearButtonClick",
              value: function () {
                this.reset();
              },
            },
            {
              key: "onOptionsScroll",
              value: function () {
                this.setVisibleOptions();
              },
            },
            {
              key: "onOptionsClick",
              value: function (e) {
                var t = e.target.closest(".vscomp-option");
                t &&
                  !c.hasClass(t, "disabled") &&
                  (c.hasClass(t, "group-title")
                    ? this.onGroupTitleClick(t)
                    : this.selectOption(t, { event: e }));
              },
            },
            {
              key: "onGroupTitleClick",
              value: function (e) {
                if (e && this.multiple && !this.disableOptionGroupCheckbox) {
                  var t = !c.hasClass(e, "selected");
                  this.toggleGroupTitleCheckbox(e, t),
                    this.toggleGroupOptions(e, t);
                }
              },
            },
            {
              key: "onDropboxContainerClick",
              value: function (e) {
                e.target.closest(".vscomp-dropbox") || this.closeDropbox();
              },
            },
            {
              key: "onDropboxCloseButtonClick",
              value: function () {
                this.closeDropbox();
              },
            },
            {
              key: "onOptionsMouseOver",
              value: function (e) {
                var t = e.target.closest(".vscomp-option");
                t &&
                  this.isOpened() &&
                  (c.hasClass(t, "disabled") || c.hasClass(t, "group-title")
                    ? this.removeOptionFocus()
                    : this.focusOption({ $option: t }));
              },
            },
            {
              key: "onOptionsTouchMove",
              value: function () {
                this.removeOptionFocus();
              },
            },
            {
              key: "onSearch",
              value: function (e) {
                e.stopPropagation(), this.setSearchValue(e.target.value, !0);
              },
            },
            {
              key: "onSearchClear",
              value: function () {
                this.setSearchValue(""), this.focusSearchInput();
              },
            },
            {
              key: "onToggleAllOptions",
              value: function () {
                this.toggleAllOptions();
              },
            },
            {
              key: "onResize",
              value: function () {
                this.setOptionsContainerHeight(!0);
              },
            },
            {
              key: "addMutationObserver",
              value: function () {
                var e = this;
                if (this.hasDropboxWrapper) {
                  var t = this.$ele;
                  (this.mutationObserver = new MutationObserver(function (i) {
                    var o = !1,
                      s = !1;
                    i.forEach(function (e) {
                      o ||
                        (o = b(e.addedNodes).some(function (e) {
                          return !(e !== t && !e.contains(t));
                        })),
                        s ||
                          (s = b(e.removedNodes).some(function (e) {
                            return !(e !== t && !e.contains(t));
                          }));
                    }),
                      s && !o && e.destroy();
                  })),
                    this.mutationObserver.observe(
                      document.querySelector("body"),
                      { childList: !0, subtree: !0 }
                    );
                }
              },
            },
            {
              key: "beforeValueSet",
              value: function (e) {
                this.toggleAllOptionsClass(!e && void 0);
              },
            },
            {
              key: "beforeSelectNewValue",
              value: function () {
                var e = this,
                  t = this.getNewOption(),
                  i = t.index;
                this.newValues.push(t.value),
                  this.setOptionProp(i, "isCurrentNew", !1),
                  this.setOptionProp(i, "isNew", !0),
                  setTimeout(function () {
                    e.setSearchValue(""), e.focusSearchInput();
                  }, 0);
              },
            },
            {
              key: "afterRenderWrapper",
              value: function () {
                c.addClass(this.$ele, "vscomp-ele"),
                  this.renderSearch(),
                  this.setEleStyles(),
                  this.setDropboxStyles(),
                  this.setOptionsHeight(),
                  this.setVisibleOptions(),
                  this.setOptionsContainerHeight(),
                  this.addEvents(),
                  this.setEleProps(),
                  this.keepAlwaysOpen ||
                    this.showAsPopup ||
                    this.initDropboxPopover(),
                  this.initialSelectedValue
                    ? this.setValueMethod(
                        this.initialSelectedValue,
                        this.silentInitialValueSet
                      )
                    : this.autoSelectFirstOption &&
                      this.visibleOptions.length &&
                      this.setValueMethod(
                        this.visibleOptions[0].value,
                        this.silentInitialValueSet
                      ),
                  this.showOptionsOnlyOnSearch && this.setSearchValue("", !1, !0),
                  this.initialDisabled && this.disable(),
                  this.autofocus && this.focus();
              },
            },
            {
              key: "afterRenderOptions",
              value: function () {
                var e = this.getVisibleOptions(),
                  t = !this.options.length && !this.hasServerSearch,
                  i = !t && !e.length;
                (!this.allowNewOption ||
                  this.hasServerSearch ||
                  this.showOptionsOnlyOnSearch) &&
                  c.toggleClass(this.$allWrappers, "has-no-search-results", i),
                  c.toggleClass(this.$allWrappers, "has-no-options", t),
                  this.setOptionAttr(),
                  this.setOptionsPosition(),
                  this.setOptionsTooltip();
              },
            },
            {
              key: "afterSetOptionsContainerHeight",
              value: function (e) {
                e && this.showAsPopup && this.setVisibleOptions();
              },
            },
            {
              key: "afterSetSearchValue",
              value: function () {
                var e = this;
                this.hasServerSearch
                  ? (clearInterval(this.serverSearchTimeout),
                    (this.serverSearchTimeout = setTimeout(function () {
                      e.serverSearch();
                    }, this.searchDelay)))
                  : this.setVisibleOptionsCount(),
                  this.selectAllOnlyVisible && this.toggleAllOptionsClass(),
                  this.focusOption({ focusFirst: !0 });
              },
            },
            {
              key: "afterSetVisibleOptionsCount",
              value: function () {
                this.scrollToTop(),
                  this.setOptionsHeight(),
                  this.setVisibleOptions(),
                  this.updatePosition();
              },
            },
            {
              key: "afterValueSet",
              value: function () {
                this.scrollToTop(), this.setSearchValue(""), this.renderOptions();
              },
            },
            {
              key: "afterSetOptions",
              value: function (e) {
                e && this.setSelectedProp(),
                  this.setOptionsHeight(),
                  this.setVisibleOptions(),
                  this.showOptionsOnlyOnSearch && this.setSearchValue("", !1, !0),
                  e || this.reset();
              },
            },
            {
              key: "setProps",
              value: function (e) {
                var t = this.setDefaultProps(e);
                this.setPropsFromElementAttr(t);
                var i = s.convertToBoolean;
                (this.$ele = t.ele),
                  (this.dropboxWrapper = t.dropboxWrapper),
                  (this.valueKey = t.valueKey),
                  (this.labelKey = t.labelKey),
                  (this.descriptionKey = t.descriptionKey),
                  (this.aliasKey = t.aliasKey),
                  (this.optionHeightText = t.optionHeight),
                  (this.optionHeight = parseFloat(this.optionHeightText)),
                  (this.multiple = i(t.multiple)),
                  (this.hasSearch = i(t.search)),
                  (this.searchByStartsWith = i(t.searchByStartsWith)),
                  (this.searchGroup = i(t.searchGroup)),
                  (this.hideClearButton = i(t.hideClearButton)),
                  (this.autoSelectFirstOption = i(t.autoSelectFirstOption)),
                  (this.hasOptionDescription = i(t.hasOptionDescription)),
                  (this.silentInitialValueSet = i(t.silentInitialValueSet)),
                  (this.allowNewOption = i(t.allowNewOption)),
                  (this.markSearchResults = i(t.markSearchResults)),
                  (this.showSelectedOptionsFirst = i(t.showSelectedOptionsFirst)),
                  (this.disableSelectAll = i(t.disableSelectAll)),
                  (this.keepAlwaysOpen = i(t.keepAlwaysOpen)),
                  (this.showDropboxAsPopup = i(t.showDropboxAsPopup)),
                  (this.hideValueTooltipOnSelectAll = i(
                    t.hideValueTooltipOnSelectAll
                  )),
                  (this.showOptionsOnlyOnSearch = i(t.showOptionsOnlyOnSearch)),
                  (this.selectAllOnlyVisible = i(t.selectAllOnlyVisible)),
                  (this.alwaysShowSelectedOptionsCount = i(
                    t.alwaysShowSelectedOptionsCount
                  )),
                  (this.alwaysShowSelectedOptionsLabel = i(
                    t.alwaysShowSelectedOptionsLabel
                  )),
                  (this.disableAllOptionsSelectedText = i(
                    t.disableAllOptionsSelectedText
                  )),
                  (this.showValueAsTags = i(t.showValueAsTags)),
                  (this.disableOptionGroupCheckbox = i(
                    t.disableOptionGroupCheckbox
                  )),
                  (this.enableSecureText = i(t.enableSecureText)),
                  (this.setValueAsArray = i(t.setValueAsArray)),
                  (this.disableValidation = i(t.disableValidation)),
                  (this.initialDisabled = i(t.disabled)),
                  (this.required = i(t.required)),
                  (this.autofocus = i(t.autofocus)),
                  (this.useGroupValue = i(t.useGroupValue)),
                  (this.focusSelectedOptionOnOpen = i(
                    t.focusSelectedOptionOnOpen
                  )),
                  (this.noOptionsText = t.noOptionsText),
                  (this.noSearchResultsText = t.noSearchResultsText),
                  (this.selectAllText = t.selectAllText),
                  (this.searchNormalize = t.searchNormalize),
                  (this.searchPlaceholderText = t.searchPlaceholderText),
                  (this.searchFormLabel = t.searchFormLabel),
                  (this.optionsSelectedText = t.optionsSelectedText),
                  (this.optionSelectedText = t.optionSelectedText),
                  (this.allOptionsSelectedText = t.allOptionsSelectedText),
                  (this.clearButtonText = t.clearButtonText),
                  (this.moreText = t.moreText),
                  (this.placeholder = t.placeholder),
                  (this.position = t.position),
                  (this.textDirection = t.textDirection),
                  (this.dropboxWidth = t.dropboxWidth),
                  (this.tooltipFontSize = t.tooltipFontSize),
                  (this.tooltipAlignment = t.tooltipAlignment),
                  (this.tooltipMaxWidth = t.tooltipMaxWidth),
                  (this.updatePositionThrottle = t.updatePositionThrottle),
                  (this.noOfDisplayValues = parseInt(t.noOfDisplayValues)),
                  (this.zIndex = parseInt(t.zIndex)),
                  (this.maxValues = parseInt(t.maxValues)),
                  (this.minValues = parseInt(t.minValues)),
                  (this.name = this.secureText(t.name)),
                  (this.additionalClasses = t.additionalClasses),
                  (this.popupDropboxBreakpoint = t.popupDropboxBreakpoint),
                  (this.popupPosition = t.popupPosition),
                  (this.onServerSearch = t.onServerSearch),
                  (this.labelRenderer = t.labelRenderer),
                  (this.initialSelectedValue =
                    0 === t.selectedValue ? "0" : t.selectedValue),
                  (this.emptyValue = t.emptyValue),
                  (this.ariaLabelledby = t.ariaLabelledby),
                  (this.ariaLabelText = t.ariaLabelText),
                  (this.maxWidth = t.maxWidth),
                  (this.searchDelay = t.searchDelay),
                  (this.selectedValues = []),
                  (this.selectedOptions = []),
                  (this.newValues = []),
                  (this.events = {}),
                  (this.tooltipEnterDelay = 200),
                  (this.searchValue = ""),
                  (this.searchValueOriginal = ""),
                  (this.isAllSelected = !1),
                  ((void 0 === t.search && this.multiple) ||
                    this.allowNewOption ||
                    this.showOptionsOnlyOnSearch) &&
                    (this.hasSearch = !0),
                  (this.hasServerSearch =
                    "function" == typeof this.onServerSearch),
                  (this.maxValues ||
                    this.hasServerSearch ||
                    this.showOptionsOnlyOnSearch) &&
                    ((this.disableSelectAll = !0),
                    (this.disableOptionGroupCheckbox = !0)),
                  this.keepAlwaysOpen && (this.dropboxWrapper = "self"),
                  (this.showAsPopup =
                    this.showDropboxAsPopup &&
                    !this.keepAlwaysOpen &&
                    window.innerWidth <= parseFloat(this.popupDropboxBreakpoint)),
                  (this.hasSearchContainer =
                    this.hasSearch || (this.multiple && !this.disableSelectAll)),
                  (this.optionsCount = this.getOptionsCount(t.optionsCount)),
                  (this.halfOptionsCount = Math.ceil(this.optionsCount / 2)),
                  (this.optionsHeight = this.getOptionsHeight()),
                  (this.uniqueId = this.getUniqueId());
              },
            },
            {
              key: "setDefaultProps",
              value: function (e) {
                var t = {
                  dropboxWrapper: "self",
                  valueKey: "value",
                  labelKey: "label",
                  descriptionKey: "description",
                  aliasKey: "alias",
                  ariaLabelText: "Options list",
                  optionsCount: 5,
                  noOfDisplayValues: 50,
                  optionHeight: "40px",
                  noOptionsText: "No options found",
                  noSearchResultsText: "No results found",
                  selectAllText: "Select All",
                  searchNormalize: !1,
                  searchPlaceholderText: "Search...",
                  searchFormLabel: "Search",
                  clearButtonText: "Clear",
                  moreText: "more...",
                  optionsSelectedText: "options selected",
                  optionSelectedText: "option selected",
                  allOptionsSelectedText: "All",
                  placeholder: "Select",
                  position: "bottom left",
                  zIndex: e.keepAlwaysOpen ? 1 : 2,
                  tooltipFontSize: "14px",
                  tooltipAlignment: "center",
                  tooltipMaxWidth: "300px",
                  updatePositionThrottle: 100,
                  name: "",
                  additionalClasses: "",
                  maxValues: 0,
                  showDropboxAsPopup: !0,
                  popupDropboxBreakpoint: "576px",
                  popupPosition: "center",
                  hideValueTooltipOnSelectAll: !0,
                  emptyValue: "",
                  searchDelay: 300,
                  focusSelectedOptionOnOpen: !0,
                };
                return (
                  e.hasOptionDescription &&
                    ((t.optionsCount = 4), (t.optionHeight = "50px")),
                  Object.assign(t, e)
                );
              },
            },
            {
              key: "setPropsFromElementAttr",
              value: function (e) {
                var t = e.ele;
                Object.keys(x).forEach(function (i) {
                  var o = t.getAttribute(i);
                  -1 === k.indexOf(i) || ("" !== o && "true" !== o) || (o = !0),
                    o && (e[x[i]] = o);
                });
              },
            },
            {
              key: "setEleProps",
              value: function () {
                var t = this.$ele;
                (t.virtualSelect = this),
                  (t.value = this.multiple ? [] : ""),
                  (t.name = this.name),
                  (t.disabled = !1),
                  (t.required = this.required),
                  (t.autofocus = this.autofocus),
                  (t.multiple = this.multiple),
                  (t.form = t.closest("form")),
                  (t.reset = e.reset),
                  (t.setValue = e.setValueMethod),
                  (t.setOptions = e.setOptionsMethod),
                  (t.setDisabledOptions = e.setDisabledOptionsMethod),
                  (t.setEnabledOptions = e.setEnabledOptionsMethod),
                  (t.toggleSelectAll = e.toggleSelectAll),
                  (t.isAllSelected = e.isAllSelected),
                  (t.addOption = e.addOptionMethod),
                  (t.getNewValue = e.getNewValueMethod),
                  (t.getDisplayValue = e.getDisplayValueMethod),
                  (t.getSelectedOptions = e.getSelectedOptionsMethod),
                  (t.getDisabledOptions = e.getDisabledOptionsMethod),
                  (t.open = e.openMethod),
                  (t.close = e.closeMethod),
                  (t.focus = e.focusMethod),
                  (t.enable = e.enableMethod),
                  (t.disable = e.disableMethod),
                  (t.destroy = e.destroyMethod),
                  (t.validate = e.validateMethod),
                  (t.toggleRequired = e.toggleRequiredMethod),
                  this.hasDropboxWrapper &&
                    (this.$dropboxWrapper.virtualSelect = this);
              },
            },
            {
              key: "setValueMethod",
              value: function (e, t) {
                var i = {},
                  o = {},
                  s = [],
                  n = this.multiple,
                  r = e;
                if (r) {
                  if ((Array.isArray(r) || (r = [r]), n)) {
                    var a = this.maxValues;
                    a && r.length > a && r.splice(a);
                  } else r.length > 1 && (r = [r[0]]);
                  (r = r.map(function (e) {
                    return e || 0 === e ? e.toString() : "";
                  })),
                    this.useGroupValue && (r = this.setGroupOptionsValue(r)),
                    r.forEach(function (e, t) {
                      (i[e] = !0), (o[e] = t);
                    }),
                    this.allowNewOption && r && this.setNewOptionsFromValue(r);
                }
                if (
                  (this.options.forEach(function (e) {
                    !0 !== i[e.value] || e.isDisabled || e.isGroupTitle
                      ? (e.isSelected = !1)
                      : ((e.isSelected = !0), s.push(e.value));
                  }),
                  n)
                )
                  this.hasOptionGroup && this.setGroupsSelectedProp(),
                    s.sort(function (e, t) {
                      return o[e] - o[t];
                    });
                else {
                  var l = y(s, 1);
                  s = l[0];
                }
                this.beforeValueSet(),
                  this.setValue(s, { disableEvent: t }),
                  this.afterValueSet();
              },
            },
            {
              key: "setGroupOptionsValue",
              value: function (e) {
                var t = [],
                  i = {},
                  o = {};
                return (
                  e.forEach(function (e) {
                    o[e] = !0;
                  }),
                  this.options.forEach(function (e) {
                    var s = e.value,
                      n = !0 === o[s];
                    e.isGroupTitle
                      ? n && (i[e.index] = !0)
                      : (n || i[e.groupIndex]) && t.push(s);
                  }),
                  t
                );
              },
            },
            {
              key: "setGroupsSelectedProp",
              value: function () {
                var e = this.isAllGroupOptionsSelected.bind(this);
                this.options.forEach(function (t) {
                  t.isGroupTitle && (t.isSelected = e(t.index));
                });
              },
            },
            {
              key: "setOptionsMethod",
              value: function (e, t) {
                this.setOptions(e), this.afterSetOptions(t);
              },
            },
            {
              key: "setDisabledOptionsMethod",
              value: function (e) {
                var t =
                  arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                this.setDisabledOptions(e, !0),
                  t || (this.setValueMethod(null), this.toggleAllOptionsClass()),
                  this.setVisibleOptions();
              },
            },
            {
              key: "setDisabledOptions",
              value: function (e) {
                var t =
                    arguments.length > 1 &&
                    void 0 !== arguments[1] &&
                    arguments[1],
                  i = [];
                if (e)
                  if (!0 === e)
                    t &&
                      this.options.forEach(function (e) {
                        return (e.isDisabled = !0), i.push(e.value), e;
                      });
                  else {
                    i = e.map(function (e) {
                      return e.toString();
                    });
                    var o = {};
                    i.forEach(function (e) {
                      o[e] = !0;
                    }),
                      t &&
                        this.options.forEach(function (e) {
                          return (e.isDisabled = !0 === o[e.value]), e;
                        });
                  }
                else
                  t &&
                    this.options.forEach(function (e) {
                      return (e.isDisabled = !1), e;
                    });
                this.disabledOptions = i;
              },
            },
            {
              key: "setEnabledOptionsMethod",
              value: function (e) {
                var t =
                  arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                this.setEnabledOptions(e),
                  t || (this.setValueMethod(null), this.toggleAllOptionsClass()),
                  this.setVisibleOptions();
              },
            },
            {
              key: "setEnabledOptions",
              value: function (e) {
                if (void 0 !== e) {
                  var t = [];
                  if (!0 === e)
                    this.options.forEach(function (e) {
                      return (e.isDisabled = !1), e;
                    });
                  else {
                    var i = {};
                    e.forEach(function (e) {
                      i[e] = !0;
                    }),
                      this.options.forEach(function (e) {
                        var o = !0 !== i[e.value];
                        return (e.isDisabled = o), o && t.push(e.value), e;
                      });
                  }
                  this.disabledOptions = t;
                }
              },
            },
            {
              key: "setOptions",
              value: function () {
                var e = this,
                  t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : [],
                  i = [],
                  o = this.disabledOptions.length,
                  n = this.valueKey,
                  r = this.labelKey,
                  a = this.descriptionKey,
                  l = this.aliasKey,
                  u = this.hasOptionDescription,
                  p = s.getString,
                  c = s.convertToBoolean,
                  h = this.secureText.bind(this),
                  d = this.getAlias.bind(this),
                  y = 0,
                  b = !1,
                  m = {},
                  g = !1;
                this.disabledOptions.forEach(function (e) {
                  m[e] = !0;
                });
                var O = function t(O) {
                  var S;
                  "object" !== f(O) && (v((S = {}), n, O), v(S, r, O), (O = S));
                  var x = h(p(O[n])),
                    w = h(p(O[r])),
                    k = O.options,
                    E = !!k,
                    C = {
                      index: y,
                      value: x,
                      label: w,
                      labelNormalized: e.searchNormalize
                        ? s.normalizeString(w).toLowerCase()
                        : w.toLowerCase(),
                      alias: d(O[l]),
                      isVisible: c(O.isVisible, !0),
                      isNew: O.isNew || !1,
                      isGroupTitle: E,
                      classNames: O.classNames,
                    };
                  if (
                    (g || "" !== x || (g = !0),
                    o && (C.isDisabled = !0 === m[x]),
                    O.isGroupOption &&
                      ((C.isGroupOption = !0), (C.groupIndex = O.groupIndex)),
                    u && (C.description = h(p(O[a]))),
                    O.customData && (C.customData = O.customData),
                    i.push(C),
                    (y += 1),
                    E)
                  ) {
                    var A = C.index;
                    (b = !0),
                      k.forEach(function (e) {
                        (e.isGroupOption = !0), (e.groupIndex = A), t(e);
                      });
                  }
                };
                Array.isArray(t) && t.forEach(O);
                var S = i.length,
                  x = this.$ele;
                (x.options = i),
                  (x.length = S),
                  (this.options = i),
                  (this.visibleOptionsCount = S),
                  (this.lastOptionIndex = S - 1),
                  (this.newValues = []),
                  (this.hasOptionGroup = b),
                  (this.hasEmptyValueOption = g),
                  this.setSortedOptions();
              },
            },
            {
              key: "setServerOptions",
              value: function () {
                var e = this,
                  t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : [];
                this.setOptionsMethod(t, !0);
                var i = this.selectedOptions,
                  o = this.options,
                  s = !1;
                if (i.length) {
                  var n = {};
                  (s = !0),
                    o.forEach(function (e) {
                      n[e.value] = !0;
                    }),
                    i.forEach(function (e) {
                      !0 !== n[e.value] && ((e.isVisible = !1), o.push(e));
                    }),
                    this.setOptionsMethod(o, !0);
                }
                if (this.allowNewOption && this.searchValue) {
                  var r = o.some(function (t) {
                    return t.label.toLowerCase() === e.searchValue;
                  });
                  r || ((s = !0), this.setNewOption());
                }
                s
                  ? (this.setVisibleOptionsCount(),
                    this.multiple && this.toggleAllOptionsClass(),
                    this.setValueText())
                  : this.updatePosition(),
                  c.removeClass(this.$allWrappers, "server-searching");
              },
            },
            {
              key: "setSelectedOptions",
              value: function () {
                this.selectedOptions = this.options.filter(function (e) {
                  return e.isSelected;
                });
              },
            },
            {
              key: "setSortedOptions",
              value: function () {
                var e = b(this.options);
                this.showSelectedOptionsFirst &&
                  this.selectedValues.length &&
                  (e = this.hasOptionGroup
                    ? this.sortOptionsGroup(e)
                    : this.sortOptions(e)),
                  (this.sortedOptions = e);
              },
            },
            {
              key: "setVisibleOptions",
              value: function () {
                var e = b(this.sortedOptions),
                  t = 2 * this.optionsCount,
                  i = this.getVisibleStartIndex(),
                  o = this.getNewOption(),
                  s = i + t - 1,
                  n = 0;
                o && ((o.visibleIndex = n), (n += 1)),
                  (e = e.filter(function (e) {
                    var t = !1;
                    return (
                      e.isVisible &&
                        !e.isCurrentNew &&
                        ((t = n >= i && n <= s), (e.visibleIndex = n), (n += 1)),
                      t
                    );
                  })),
                  o && (e = [o].concat(b(e))),
                  (this.visibleOptions = e),
                  this.renderOptions();
              },
            },
            {
              key: "setOptionsPosition",
              value: function (e) {
                var t = (e || this.getVisibleStartIndex()) * this.optionHeight;
                (this.$options.style.transform = "translate3d(0, ".concat(
                  t,
                  "px, 0)"
                )),
                  c.setData(this.$options, "top", t);
              },
            },
            {
              key: "setOptionsTooltip",
              value: function () {
                var e = this,
                  t = this.getVisibleOptions(),
                  i = this.hasOptionDescription;
                t.forEach(function (t) {
                  var o = e.$dropboxContainer.querySelector(
                    '.vscomp-option[data-index="'.concat(t.index, '"]')
                  );
                  c.setData(
                    o.querySelector(".vscomp-option-text"),
                    "tooltip",
                    t.label
                  ),
                    i &&
                      c.setData(
                        o.querySelector(".vscomp-option-description"),
                        "tooltip",
                        t.description
                      );
                });
              },
            },
            {
              key: "setValue",
              value: function (e) {
                var t =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : {},
                  i = t.disableEvent,
                  o = void 0 !== i && i,
                  n = t.disableValidation,
                  r = void 0 !== n && n,
                  a = (this.hasEmptyValueOption && "" === e) || e;
                a
                  ? Array.isArray(e)
                    ? (this.selectedValues = b(e))
                    : (this.selectedValues = [e])
                  : (this.selectedValues = []);
                var l = this.getValue();
                (this.$ele.value = l),
                  (this.$hiddenInput.value = this.getInputValue(l)),
                  (this.isMaxValuesSelected = !!(
                    this.maxValues && this.maxValues <= this.selectedValues.length
                  )),
                  this.toggleAllOptionsClass(),
                  this.setValueText(),
                  c.toggleClass(
                    this.$allWrappers,
                    "has-value",
                    s.isNotEmpty(this.selectedValues)
                  ),
                  c.toggleClass(
                    this.$allWrappers,
                    "max-value-selected",
                    this.isMaxValuesSelected
                  ),
                  r || this.validate(),
                  o || c.dispatchEvent(this.$ele, "change", !0);
              },
            },
            {
              key: "setValueText",
              value: function () {
                var e = this.multiple,
                  t = this.selectedValues,
                  i = this.noOfDisplayValues,
                  o = this.showValueAsTags,
                  s = this.$valueText,
                  n = [],
                  r = [],
                  a = t.length,
                  l = 0,
                  u =
                    this.isAllSelected &&
                    !this.hasServerSearch &&
                    !this.disableAllOptionsSelectedText &&
                    !o;
                if (u && this.hideValueTooltipOnSelectAll)
                  s.innerHTML = ""
                    .concat(this.allOptionsSelectedText, " (")
                    .concat(a, ")");
                else {
                  this.getSelectedOptions({
                    fullDetails: !0,
                    keepSelectionOrder: !0,
                  }).some(function (e) {
                    if (e.isCurrentNew) return !1;
                    if (l >= i) return !0;
                    var t = e.label;
                    if ((n.push(t), (l += 1), o)) {
                      var s = '<span class="vscomp-value-tag" data-index="'
                        .concat(
                          e.index,
                          '">\n              <span class="vscomp-value-tag-content">'
                        )
                        .concat(
                          t,
                          '</span>\n              <span class="vscomp-value-tag-clear-button">\n                <i class="vscomp-clear-icon"></i>\n              </span>\n            </span>'
                        );
                      r.push(s);
                    } else r.push(t);
                    return !1;
                  });
                  var p = a - i;
                  p > 0 &&
                    r.push(
                      '<span class="vscomp-value-tag more-value-count">+ '
                        .concat(p, " ")
                        .concat(this.moreText, "</span>")
                    );
                  var h = n.join(", ");
                  if ("" === h) s.innerHTML = this.placeholder;
                  else if (((s.innerHTML = h), e)) {
                    var d = this.maxValues;
                    if (
                      this.alwaysShowSelectedOptionsCount ||
                      c.hasEllipsis(s) ||
                      d ||
                      o
                    ) {
                      var v = '<span class="vscomp-selected-value-count">'.concat(
                        a,
                        "</span>"
                      );
                      if (
                        (d &&
                          (v += ' / <span class="vscomp-max-value-count">'.concat(
                            d,
                            "</span>"
                          )),
                        u)
                      )
                        s.innerHTML = ""
                          .concat(this.allOptionsSelectedText, " (")
                          .concat(a, ")");
                      else if (o)
                        (s.innerHTML = r.join("")),
                          (this.$valueTags =
                            s.querySelectorAll(".vscomp-value-tag")),
                          this.setValueTagAttr();
                      else if (!this.alwaysShowSelectedOptionsLabel) {
                        var f =
                          1 === a
                            ? this.optionSelectedText
                            : this.optionsSelectedText;
                        s.innerHTML = "".concat(v, " ").concat(f);
                      }
                    } else r = [];
                  }
                }
                var y = "";
                0 === a ? (y = this.placeholder) : o || (y = r.join(", ")),
                  c.setData(s, "tooltip", y),
                  e &&
                    (c.setData(s, "tooltipEllipsisOnly", 0 === a),
                    o && this.updatePosition());
              },
            },
            {
              key: "setSearchValue",
              value: function (e) {
                var t =
                    arguments.length > 1 &&
                    void 0 !== arguments[1] &&
                    arguments[1],
                  i =
                    arguments.length > 2 &&
                    void 0 !== arguments[2] &&
                    arguments[2];
                if (e !== this.searchValueOriginal || i) {
                  t || (this.$searchInput.value = e);
                  var o = e.replace(/\\/g, "").toLowerCase().trim();
                  (this.searchValue = o),
                    (this.searchValueOriginal = e),
                    c.toggleClass(this.$allWrappers, "has-search-value", e),
                    this.afterSetSearchValue();
                }
              },
            },
            {
              key: "setVisibleOptionsCount",
              value: function () {
                var e,
                  t = 0,
                  i = !1,
                  o = this.searchGroup,
                  n = this.showOptionsOnlyOnSearch,
                  r = this.searchByStartsWith,
                  a = this.searchValue;
                a = this.searchNormalize ? s.normalizeString(a) : a;
                var l = this.isOptionVisible.bind(this);
                this.hasOptionGroup &&
                  (e = this.getVisibleOptionGroupsMapping(a)),
                  this.options.forEach(function (s) {
                    var u;
                    s.isCurrentNew ||
                      (n && !a
                        ? ((s.isVisible = !1),
                          (u = { isVisible: !1, hasExactOption: !1 }))
                        : (u = l({
                            data: s,
                            searchValue: a,
                            hasExactOption: i,
                            visibleOptionGroupsMapping: e,
                            searchGroup: o,
                            searchByStartsWith: r,
                          })),
                      u.isVisible && (t += 1),
                      i || (i = u.hasExactOption));
                  }),
                  this.allowNewOption &&
                    (a && !i
                      ? (this.setNewOption(), (t += 1))
                      : this.removeNewOption()),
                  (this.visibleOptionsCount = t),
                  this.afterSetVisibleOptionsCount();
              },
            },
            {
              key: "setOptionProp",
              value: function (e, t, i) {
                this.options[e] && (this.options[e][t] = i);
              },
            },
            {
              key: "setOptionsHeight",
              value: function () {
                this.$optionsList.style.height = "".concat(
                  this.optionHeight * this.visibleOptionsCount,
                  "px"
                );
              },
            },
            {
              key: "setOptionsContainerHeight",
              value: function (e) {
                var t;
                e
                  ? this.showAsPopup &&
                    ((this.optionsCount = this.getOptionsCount()),
                    (this.halfOptionsCount = Math.ceil(this.optionsCount / 2)),
                    (t = this.getOptionsHeight()),
                    (this.optionsHeight = t))
                  : ((t = this.optionsHeight),
                    this.keepAlwaysOpen &&
                      (c.setStyle(this.$noOptions, "height", t),
                      c.setStyle(this.$noSearchResults, "height", t))),
                  c.setStyle(this.$optionsContainer, "max-height", t),
                  this.afterSetOptionsContainerHeight(e);
              },
            },
            {
              key: "setNewOption",
              value: function (e) {
                var t = e || this.searchValueOriginal.trim();
                if (t) {
                  var i = this.getNewOption();
                  if (i) {
                    var o = i.index;
                    this.setOptionProp(o, "value", this.secureText(t)),
                      this.setOptionProp(o, "label", this.secureText(t));
                  } else {
                    var s = { value: t, label: t };
                    e
                      ? ((s.isNew = !0), this.newValues.push(t))
                      : (s.isCurrentNew = !0),
                      this.addOption(s);
                  }
                }
              },
            },
            {
              key: "setSelectedProp",
              value: function () {
                var e = {};
                this.selectedValues.forEach(function (t) {
                  e[t] = !0;
                }),
                  this.options.forEach(function (t) {
                    !0 === e[t.value] && (t.isSelected = !0);
                  });
              },
            },
            {
              key: "setNewOptionsFromValue",
              value: function (e) {
                if (e) {
                  var t = this.setNewOption.bind(this),
                    i = {};
                  this.options.forEach(function (e) {
                    i[e.value] = !0;
                  }),
                    e.forEach(function (e) {
                      e && !0 !== i[e] && t(e);
                    });
                }
              },
            },
            {
              key: "setDropboxWrapperWidth",
              value: function () {
                if (!this.showAsPopup) {
                  var e =
                    this.dropboxWidth ||
                    "".concat(this.$wrapper.offsetWidth, "px");
                  c.setStyle(this.$dropboxContainer, "max-width", e);
                }
              },
            },
            {
              key: "setEleStyles",
              value: function () {
                var e = this.maxWidth,
                  t = {};
                e && (t["max-width"] = e), c.setStyles(this.$ele, t);
              },
            },
            {
              key: "setDropboxStyles",
              value: function () {
                var e = this.dropboxWidth,
                  t = {},
                  i = { "z-index": this.zIndex };
                e && (this.showAsPopup ? (t["max-width"] = e) : (i.width = e)),
                  c.setStyles(this.$dropboxContainer, i),
                  c.setStyles(this.$dropbox, t);
              },
            },
            {
              key: "setOptionAttr",
              value: function () {
                var e = this.$visibleOptions,
                  t = this.options,
                  i = "".concat(this.optionHeight, "px"),
                  o = c.setStyle,
                  s = c.getData,
                  n = c.setData;
                e &&
                  e.length &&
                  e.forEach(function (e) {
                    var r = t[s(e, "index")];
                    o(e, "height", i), n(e, "value", r.value);
                  });
              },
            },
            {
              key: "setValueTagAttr",
              value: function () {
                var e = this.$valueTags;
                if (e && e.length) {
                  var t = c.getData,
                    i = c.setData,
                    o = this.options;
                  e.forEach(function (e) {
                    var s = t(e, "index");
                    if (void 0 !== s) {
                      var n = o[s];
                      i(e, "value", n.value);
                    }
                  });
                }
              },
            },
            {
              key: "setScrollTop",
              value: function () {
                var e = this.selectedValues;
                if (
                  !this.showSelectedOptionsFirst &&
                  this.focusSelectedOptionOnOpen &&
                  0 !== e.length
                ) {
                  var t,
                    i = {};
                  e.forEach(function (e) {
                    i[e] = !0;
                  }),
                    this.options.some(function (e) {
                      return !!i[e.value] && ((t = e.visibleIndex), !0);
                    }),
                    t &&
                      (this.$optionsContainer.scrollTop = this.optionHeight * t);
                }
              },
            },
            {
              key: "getVisibleOptions",
              value: function () {
                return this.visibleOptions || [];
              },
            },
            {
              key: "getValue",
              value: function () {
                return this.multiple
                  ? this.useGroupValue
                    ? this.getGroupValue()
                    : this.selectedValues
                  : this.selectedValues[0] || "";
              },
            },
            {
              key: "getGroupValue",
              value: function () {
                var e = [],
                  t = {};
                return (
                  this.options.forEach(function (i) {
                    if (i.isSelected) {
                      var o = i.value;
                      i.isGroupTitle
                        ? o && ((t[i.index] = !0), e.push(o))
                        : !0 !== t[i.groupIndex] && e.push(o);
                    }
                  }),
                  e
                );
              },
            },
            {
              key: "getInputValue",
              value: function (e) {
                var t = e;
                return (
                  t && t.length
                    ? this.setValueAsArray &&
                      this.multiple &&
                      (t = JSON.stringify(t))
                    : (t = this.emptyValue),
                  t
                );
              },
            },
            {
              key: "getFirstVisibleOptionIndex",
              value: function () {
                return Math.ceil(
                  this.$optionsContainer.scrollTop / this.optionHeight
                );
              },
            },
            {
              key: "getVisibleStartIndex",
              value: function () {
                var e = this.getFirstVisibleOptionIndex() - this.halfOptionsCount;
                return e < 0 && (e = 0), e;
              },
            },
            {
              key: "getTooltipAttrText",
              value: function (e) {
                var t =
                    arguments.length > 1 &&
                    void 0 !== arguments[1] &&
                    arguments[1],
                  i =
                    arguments.length > 2 &&
                    void 0 !== arguments[2] &&
                    arguments[2],
                  o = {
                    "data-tooltip": e || "",
                    "data-tooltip-enter-delay": this.tooltipEnterDelay,
                    "data-tooltip-z-index": this.zIndex,
                    "data-tooltip-font-size": this.tooltipFontSize,
                    "data-tooltip-alignment": this.tooltipAlignment,
                    "data-tooltip-max-width": this.tooltipMaxWidth,
                    "data-tooltip-ellipsis-only": t,
                    "data-tooltip-allow-html": i,
                  };
                return c.getAttributesText(o);
              },
            },
            {
              key: "getOptionObj",
              value: function (e) {
                if (e) {
                  var t = s.getString,
                    i = this.secureText.bind(this);
                  return {
                    index: e.index,
                    value: i(t(e.value)),
                    label: i(t(e.label)),
                    description: i(t(e.description)),
                    alias: this.getAlias(e.alias),
                    isCurrentNew: e.isCurrentNew || !1,
                    isNew: e.isNew || !1,
                    isVisible: !0,
                  };
                }
              },
            },
            {
              key: "getNewOption",
              value: function () {
                var e = this.options[this.lastOptionIndex];
                if (e && e.isCurrentNew) return e;
              },
            },
            {
              key: "getOptionIndex",
              value: function (e) {
                var t;
                return (
                  this.options.some(function (i) {
                    return i.value === e && ((t = i.index), !0);
                  }),
                  t
                );
              },
            },
            {
              key: "getNewValue",
              value: function () {
                var e = {};
                this.newValues.forEach(function (t) {
                  e[t] = !0;
                });
                var t = this.selectedValues.filter(function (t) {
                  return !0 === e[t];
                });
                return this.multiple ? t : t[0];
              },
            },
            {
              key: "getAlias",
              value: function (e) {
                var t = e;
                return (
                  t &&
                    (t = (t = Array.isArray(t)
                      ? t.join(",")
                      : t.toString().trim()).toLowerCase()),
                  t || ""
                );
              },
            },
            {
              key: "getDisplayValue",
              value: function () {
                var e = [];
                return (
                  this.options.forEach(function (t) {
                    t.isSelected && e.push(t.label);
                  }),
                  this.multiple ? e : e[0] || ""
                );
              },
            },
            {
              key: "getSelectedOptions",
              value: function () {
                var e =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : {},
                  t = e.fullDetails,
                  i = void 0 !== t && t,
                  o = e.keepSelectionOrder,
                  s = void 0 !== o && o,
                  n = this.valueKey,
                  r = this.labelKey,
                  a = this.selectedValues,
                  l = [];
                if (
                  (this.options.forEach(function (e) {
                    if (e.isSelected && !e.isGroupTitle)
                      if (i) l.push(e);
                      else {
                        var t,
                          o = (v((t = {}), n, e.value), v(t, r, e.label), t);
                        e.isNew && (o.isNew = !0),
                          e.customData && (o.customData = e.customData),
                          l.push(o);
                      }
                  }),
                  s)
                ) {
                  var u = {};
                  a.forEach(function (e, t) {
                    u[e] = t;
                  }),
                    l.sort(function (e, t) {
                      return u[e.value] - u[t.value];
                    });
                }
                return this.multiple || i ? l : l[0];
              },
            },
            {
              key: "getDisabledOptions",
              value: function () {
                var e = this.valueKey,
                  t = this.labelKey,
                  i = this.disabledOptions,
                  o = {},
                  s = [];
                return (
                  i.forEach(function (e) {
                    o[e] = !0;
                  }),
                  this.options.forEach(function (i) {
                    var n,
                      r = i.value,
                      a = i.label;
                    o[r] && s.push((v((n = {}), e, r), v(n, t, a), n));
                  }),
                  s
                );
              },
            },
            {
              key: "getVisibleOptionGroupsMapping",
              value: function (e) {
                var t = this.options,
                  i = {},
                  o = this.isOptionVisible.bind(this);
                return (
                  (t = this.structureOptionGroup(t)).forEach(function (t) {
                    i[t.index] = t.options.some(function (t) {
                      return o({ data: t, searchValue: e }).isVisible;
                    });
                  }),
                  i
                );
              },
            },
            {
              key: "getOptionsCount",
              value: function (e) {
                var t;
                if (this.showAsPopup) {
                  var i = (80 * window.innerHeight) / 100 - 48;
                  this.hasSearchContainer && (i -= 40),
                    (t = Math.floor(i / this.optionHeight));
                } else t = parseInt(e);
                return t;
              },
            },
            {
              key: "getOptionsHeight",
              value: function () {
                return "".concat(this.optionsCount * this.optionHeight, "px");
              },
            },
            {
              key: "getSibling",
              value: function (e, t) {
                var i =
                    "next" === t
                      ? "nextElementSibling"
                      : "previousElementSibling",
                  o = e;
                do {
                  o && (o = o[i]);
                } while (
                  c.hasClass(o, "disabled") ||
                  c.hasClass(o, "group-title")
                );
                return o;
              },
            },
            {
              key: "getUniqueId",
              value: function () {
                var e = s.getRandomInt(1e4);
                return document.querySelector("#vscomp-ele-wrapper-".concat(e))
                  ? this.getUniqueId()
                  : e;
              },
            },
            {
              key: "initDropboxPopover",
              value: function () {
                var e = {
                  ele: this.$ele,
                  target: this.$dropboxContainer,
                  position: this.position,
                  zIndex: this.zIndex,
                  margin: 4,
                  transitionDistance: 30,
                  hideArrowIcon: !0,
                  disableManualAction: !0,
                  disableUpdatePosition: !this.hasDropboxWrapper,
                  updatePositionThrottle: this.updatePositionThrottle,
                  afterShow: this.afterShowPopper.bind(this),
                  afterHide: this.afterHidePopper.bind(this),
                };
                this.dropboxPopover = new PopoverComponent(e);
              },
            },
            {
              key: "openDropbox",
              value: function (e) {
                (this.isSilentOpen = e),
                  e
                    ? c.setStyle(this.$dropboxContainer, "display", "inline-flex")
                    : (c.dispatchEvent(this.$ele, "beforeOpen"),
                      c.setAria(this.$wrapper, "expanded", !0)),
                  this.setDropboxWrapperWidth(),
                  c.removeClass(this.$allWrappers, "closed"),
                  c.changeTabIndex(this.$allWrappers, 0),
                  this.dropboxPopover && !e
                    ? this.dropboxPopover.show()
                    : this.afterShowPopper();
              },
            },
            {
              key: "afterShowPopper",
              value: function () {
                var e = this.isSilentOpen;
                (this.isSilentOpen = !1),
                  e ||
                    (this.moveSelectedOptionsFirst(),
                    this.setScrollTop(),
                    c.addClass(this.$allWrappers, "focused"),
                    this.showAsPopup
                      ? (c.addClass(this.$body, "vscomp-popup-active"),
                        (this.isPopupActive = !0))
                      : this.focusSearchInput(),
                    c.dispatchEvent(this.$ele, "afterOpen"));
              },
            },
            {
              key: "closeDropbox",
              value: function (e) {
                (this.isSilentClose = e),
                  this.keepAlwaysOpen
                    ? this.removeOptionFocus()
                    : (e
                        ? c.setStyle(this.$dropboxContainer, "display", "")
                        : (c.dispatchEvent(this.$ele, "beforeClose"),
                          c.setAria(this.$wrapper, "expanded", !1),
                          c.setAria(this.$wrapper, "activedescendant", "")),
                      this.dropboxPopover && !e
                        ? this.dropboxPopover.hide()
                        : this.afterHidePopper());
              },
            },
            {
              key: "afterHidePopper",
              value: function () {
                var e = this.isSilentClose;
                (this.isSilentClose = !1),
                  c.removeClass(this.$allWrappers, "focused"),
                  this.removeOptionFocus(),
                  !e &&
                    this.isPopupActive &&
                    (c.removeClass(this.$body, "vscomp-popup-active"),
                    (this.isPopupActive = !1)),
                  c.addClass(this.$allWrappers, "closed"),
                  e || c.dispatchEvent(this.$ele, "afterClose"),
                  this.focus();
              },
            },
            {
              key: "moveSelectedOptionsFirst",
              value: function () {
                this.showSelectedOptionsFirst &&
                  (this.setSortedOptions(),
                  this.$optionsContainer.scrollTop && this.selectedValues.length
                    ? this.scrollToTop()
                    : this.setVisibleOptions());
              },
            },
            {
              key: "toggleDropbox",
              value: function () {
                this.isOpened() ? this.closeDropbox() : this.openDropbox();
              },
            },
            {
              key: "updatePosition",
              value: function () {
                this.dropboxPopover &&
                  this.isOpened() &&
                  this.$ele.updatePosition();
              },
            },
            {
              key: "isOpened",
              value: function () {
                return !c.hasClass(this.$wrapper, "closed");
              },
            },
            {
              key: "focusSearchInput",
              value: function () {
                var e = this.$searchInput;
                e && e.focus();
              },
            },
            {
              key: "focusOption",
              value: function () {
                var e,
                  t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : {},
                  i = t.direction,
                  o = t.$option,
                  s = t.focusFirst,
                  n = this.$dropboxContainer.querySelector(
                    ".vscomp-option.focused"
                  );
                if (o) e = o;
                else if (!n || s) {
                  var r = this.getFirstVisibleOptionIndex();
                  (e = this.$dropboxContainer.querySelector(
                    '.vscomp-option[data-visible-index="'.concat(r, '"]')
                  )),
                    (c.hasClass(e, "disabled") || c.hasClass(e, "group-title")) &&
                      (e = this.getSibling(e, "next"));
                } else e = this.getSibling(n, i);
                e &&
                  e !== n &&
                  (n && this.toggleOptionFocusedState(n, !1),
                  this.$ariaLiveElem &&
                    (this.$ariaLiveElem.textContent = e.textContent),
                  this.toggleOptionFocusedState(e, !0),
                  this.toggleFocusedProp(c.getData(e, "index"), !0),
                  this.moveFocusedOptionToView(e));
              },
            },
            {
              key: "moveFocusedOptionToView",
              value: function (e) {
                var t =
                  e ||
                  this.$dropboxContainer.querySelector(".vscomp-option.focused");
                if (t) {
                  var i,
                    o = this.$optionsContainer.getBoundingClientRect(),
                    s = t.getBoundingClientRect(),
                    n = o.top,
                    r = o.bottom,
                    a = o.height,
                    l = s.top,
                    u = s.bottom,
                    p = s.height,
                    h = t.offsetTop,
                    d = c.getData(this.$options, "top", "number");
                  n > l ? (i = h + d) : r < u && (i = h - a + p + d),
                    void 0 !== i && (this.$optionsContainer.scrollTop = i);
                }
              },
            },
            {
              key: "removeOptionFocus",
              value: function () {
                var e = this.$dropboxContainer.querySelector(
                  ".vscomp-option.focused"
                );
                e &&
                  (this.toggleOptionFocusedState(e, !1),
                  this.toggleFocusedProp(null));
              },
            },
            {
              key: "selectOption",
              value: function (e) {
                var t =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : {},
                  i = t.event;
                if (e) {
                  var o = !c.hasClass(e, "selected");
                  if (o) {
                    if (this.multiple && this.isMaxValuesSelected) return;
                  } else if (!this.multiple) return void this.closeDropbox();
                  var n = this.selectedValues,
                    r = c.getData(e, "value"),
                    a = c.getData(e, "index", "number"),
                    l = c.hasClass(e, "current-new"),
                    u = !1,
                    p = this.lastSelectedOptionIndex;
                  if (
                    ((this.lastSelectedOptionIndex = null),
                    this.toggleSelectedProp(a, o),
                    o)
                  ) {
                    if (this.multiple)
                      n.push(r),
                        this.toggleAllOptionsClass(),
                        this.toggleGroupOptionsParent(e),
                        i && i.shiftKey && (u = !0);
                    else {
                      n.length &&
                        this.toggleSelectedProp(this.getOptionIndex(n[0]), !1),
                        (n = [r]);
                      var h = this.$dropboxContainer.querySelector(
                        ".vscomp-option.selected"
                      );
                      h && this.toggleOptionSelectedState(h, !1),
                        this.closeDropbox(),
                        l || this.setSearchValue("");
                    }
                    (this.lastSelectedOptionIndex = a),
                      this.toggleOptionSelectedState(e);
                  } else
                    this.multiple &&
                      (this.toggleOptionSelectedState(e),
                      s.removeItemFromArray(n, r),
                      this.toggleAllOptionsClass(!1),
                      this.toggleGroupOptionsParent(e, !1));
                  l && this.beforeSelectNewValue(),
                    this.setValue(n),
                    u && this.selectRangeOptions(p, a);
                }
              },
            },
            {
              key: "selectFocusedOption",
              value: function () {
                this.selectOption(
                  this.$dropboxContainer.querySelector(".vscomp-option.focused")
                );
              },
            },
            {
              key: "selectRangeOptions",
              value: function (e, t) {
                var i = this;
                if ("number" == typeof e && !this.maxValues) {
                  var o,
                    s,
                    n = this.selectedValues,
                    r = this.hasOptionGroup,
                    a = {};
                  if (
                    (e < t ? ((o = e), (s = t)) : ((o = t), (s = e)),
                    this.options.forEach(function (e) {
                      if (
                        !e.isDisabled &&
                        !e.isGroupTitle &&
                        e.isVisible &&
                        !e.isSelected
                      ) {
                        var t = e.index;
                        if (t > o && t < s) {
                          if (r) {
                            var i = e.groupIndex;
                            "number" == typeof i && (a[i] = !0);
                          }
                          (e.isSelected = !0), n.push(e.value);
                        }
                      }
                    }),
                    this.toggleAllOptionsClass(),
                    this.setValue(n),
                    (a = Object.keys(a)).length)
                  ) {
                    var l = this.toggleGroupTitleProp.bind(this);
                    a.forEach(function (e) {
                      l(parseInt(e));
                    });
                  }
                  setTimeout(function () {
                    i.renderOptions();
                  }, 0);
                }
              },
            },
            {
              key: "toggleAllOptions",
              value: function (e) {
                if (this.multiple && !this.disableSelectAll) {
                  var t =
                      "boolean" == typeof isSelected
                        ? e
                        : !c.hasClass(this.$toggleAllCheckbox, "checked"),
                    i = [],
                    o = this.selectAllOnlyVisible;
                  this.options.forEach(function (e) {
                    var s = e;
                    if (!s.isDisabled && !s.isCurrentNew) {
                      var n = s.isVisible,
                        r = s.isSelected;
                      (!t && (!o || n || !r)) || (t && o && !n && !r)
                        ? (s.isSelected = !1)
                        : ((s.isSelected = !0),
                          s.isGroupTitle || i.push(s.value));
                    }
                  }),
                    this.toggleAllOptionsClass(t),
                    this.setValue(i),
                    this.renderOptions();
                }
              },
            },
            {
              key: "toggleAllOptionsClass",
              value: function (e) {
                if (this.multiple) {
                  var t = !1;
                  "boolean" == typeof e || (e = this.isAllOptionsSelected()),
                    !e &&
                      this.selectAllOnlyVisible &&
                      (t = this.isAllOptionsSelected(!0)),
                    c.toggleClass(this.$toggleAllCheckbox, "checked", e || t),
                    (this.isAllSelected = e);
                }
              },
            },
            {
              key: "isAllOptionsSelected",
              value: function (e) {
                var t = !1;
                return (
                  this.options.length &&
                    this.selectedValues.length &&
                    (t = !this.options.some(function (t) {
                      return (
                        !t.isSelected &&
                        !t.isDisabled &&
                        !t.isGroupTitle &&
                        (!e || t.isVisible)
                      );
                    })),
                  t
                );
              },
            },
            {
              key: "isAllGroupOptionsSelected",
              value: function (e) {
                var t = !1;
                return (
                  this.options.length &&
                    (t = !this.options.some(function (t) {
                      return (
                        !t.isSelected &&
                        !t.isDisabled &&
                        !t.isGroupTitle &&
                        t.groupIndex === e
                      );
                    })),
                  t
                );
              },
            },
            {
              key: "toggleGroupOptionsParent",
              value: function (e, t) {
                if (
                  this.hasOptionGroup &&
                  !this.disableOptionGroupCheckbox &&
                  e
                ) {
                  var i = c.getData(e, "groupIndex");
                  void 0 !== i && (i = parseInt(i));
                  var o = this.$options.querySelector(
                      '.vscomp-option[data-index="'.concat(i, '"]')
                    ),
                    s =
                      "boolean" == typeof t
                        ? t
                        : this.isAllGroupOptionsSelected(i);
                  this.toggleGroupTitleCheckbox(o, s),
                    this.toggleGroupTitleProp(i, s);
                }
              },
            },
            {
              key: "toggleGroupTitleProp",
              value: function (e, t) {
                var i =
                  "boolean" == typeof t ? t : this.isAllGroupOptionsSelected(e);
                this.toggleSelectedProp(e, i);
              },
            },
            {
              key: "toggleGroupOptions",
              value: function (e, t) {
                var i = this;
                if (
                  this.hasOptionGroup &&
                  !this.disableOptionGroupCheckbox &&
                  e
                ) {
                  var o = c.getData(e, "index", "number"),
                    n = this.selectedValues,
                    r = this.selectAllOnlyVisible,
                    a = {},
                    l = s.removeItemFromArray;
                  n.forEach(function (e) {
                    a[e] = !0;
                  }),
                    this.options.forEach(function (e) {
                      if (!e.isDisabled && e.groupIndex === o) {
                        var i = e.value;
                        !t || (r && !e.isVisible)
                          ? ((e.isSelected = !1), a[i] && l(n, i))
                          : ((e.isSelected = !0), a[i] || n.push(i));
                      }
                    }),
                    this.toggleAllOptionsClass(!!t && null),
                    this.setValue(n),
                    setTimeout(function () {
                      i.renderOptions();
                    }, 0);
                }
              },
            },
            {
              key: "toggleGroupTitleCheckbox",
              value: function (e, t) {
                if (e) {
                  var i = c.getData(e, "index", "number");
                  this.toggleSelectedProp(i, t),
                    this.toggleOptionSelectedState(e, t);
                }
              },
            },
            {
              key: "toggleFocusedProp",
              value: function (e) {
                var t =
                  arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                this.focusedOptionIndex &&
                  this.setOptionProp(this.focusedOptionIndex, "isFocused", !1),
                  this.setOptionProp(e, "isFocused", t),
                  (this.focusedOptionIndex = e);
              },
            },
            {
              key: "toggleSelectedProp",
              value: function (e) {
                var t =
                  arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                this.setOptionProp(e, "isSelected", t);
              },
            },
            {
              key: "scrollToTop",
              value: function () {
                var e = !this.isOpened();
                e && this.openDropbox(!0),
                  this.$optionsContainer.scrollTop > 0 &&
                    (this.$optionsContainer.scrollTop = 0),
                  e && this.closeDropbox(!0);
              },
            },
            {
              key: "reset",
              value: function () {
                var e =
                  arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                this.options.forEach(function (e) {
                  e.isSelected = !1;
                }),
                  this.beforeValueSet(!0),
                  this.setValue(null, { disableValidation: e }),
                  this.afterValueSet(),
                  e && c.removeClass(this.$allWrappers, "has-error"),
                  c.dispatchEvent(this.$ele, "reset");
              },
            },
            {
              key: "addOption",
              value: function (e, t) {
                if (e) {
                  this.lastOptionIndex += 1;
                  var i = this.getOptionObj(
                    d(d({}, e), {}, { index: this.lastOptionIndex })
                  );
                  this.options.push(i),
                    this.sortedOptions.push(i),
                    t &&
                      ((this.visibleOptionsCount += 1), this.afterSetOptions());
                }
              },
            },
            {
              key: "removeOption",
              value: function (e) {
                (e || 0 === e) &&
                  (this.options.splice(e, 1), (this.lastOptionIndex -= 1));
              },
            },
            {
              key: "removeNewOption",
              value: function () {
                var e = this.getNewOption();
                e && this.removeOption(e.index);
              },
            },
            {
              key: "sortOptions",
              value: function (e) {
                return e.sort(function (e, t) {
                  var i = e.isSelected || e.isAnySelected,
                    o = t.isSelected || t.isAnySelected;
                  return i || o ? (i && (!o || e.index < t.index) ? -1 : 1) : 0;
                });
              },
            },
            {
              key: "sortOptionsGroup",
              value: function (e) {
                var t = this.sortOptions.bind(this),
                  i = this.structureOptionGroup(e);
                return (
                  i.forEach(function (e) {
                    var i = e.options;
                    (e.isAnySelected = i.some(function (e) {
                      return e.isSelected;
                    })),
                      e.isAnySelected && t(i);
                  }),
                  t(i),
                  this.destructureOptionGroup(i)
                );
              },
            },
            {
              key: "isOptionVisible",
              value: function (e) {
                var t = e.data,
                  i = e.searchValue,
                  o = e.hasExactOption,
                  s = e.visibleOptionGroupsMapping,
                  n = e.searchGroup,
                  r = e.searchByStartsWith,
                  a = t.value.toLowerCase(),
                  l = this.searchNormalize
                    ? t.labelNormalized
                    : t.label.toLowerCase(),
                  u = t.description,
                  p = t.alias,
                  c = r ? l.startsWith(i) : l.includes(i);
                return (
                  !t.isGroupTitle || (n && c) || (c = s[t.index]),
                  r || !p || c || (c = p.includes(i)),
                  r || !u || c || (c = u.toLowerCase().includes(i)),
                  (t.isVisible = c),
                  o || (o = l === i || a === i),
                  { isVisible: c, hasExactOption: o }
                );
              },
            },
            {
              key: "structureOptionGroup",
              value: function (e) {
                var t = [],
                  i = {};
                return (
                  e.forEach(function (e) {
                    if (e.isGroupTitle) {
                      var o = [];
                      (e.options = o), (i[e.index] = o), t.push(e);
                    }
                  }),
                  e.forEach(function (e) {
                    e.isGroupOption && i[e.groupIndex].push(e);
                  }),
                  t
                );
              },
            },
            {
              key: "destructureOptionGroup",
              value: function (e) {
                var t = [];
                return (
                  e.forEach(function (e) {
                    t.push(e), (t = t.concat(e.options));
                  }),
                  t
                );
              },
            },
            {
              key: "serverSearch",
              value: function () {
                c.removeClass(this.$allWrappers, "has-no-search-results"),
                  c.addClass(this.$allWrappers, "server-searching"),
                  this.setSelectedOptions(),
                  this.onServerSearch(this.searchValue, this);
              },
            },
            {
              key: "removeValue",
              value: function (e) {
                var t = this.selectedValues,
                  i = c.getData(e, "value");
                s.removeItemFromArray(t, i), this.setValueMethod(t);
              },
            },
            {
              key: "focus",
              value: function () {
                this.$wrapper.focus();
              },
            },
            {
              key: "enable",
              value: function () {
                (this.$ele.disabled = !1),
                  this.$ele.removeAttribute("disabled"),
                  this.$hiddenInput.removeAttribute("disabled"),
                  c.setAria(this.$wrapper, "disabled", !1);
              },
            },
            {
              key: "disable",
              value: function () {
                (this.$ele.disabled = !0),
                  this.$ele.setAttribute("disabled", ""),
                  this.$hiddenInput.setAttribute("disabled", ""),
                  c.setAria(this.$wrapper, "disabled", !0);
              },
            },
            {
              key: "validate",
              value: function () {
                if (this.disableValidation) return !0;
                var e = !1,
                  t = this.selectedValues,
                  i = this.minValues;
                return (
                  this.required &&
                    (s.isEmpty(t) || (this.multiple && i && t.length < i)) &&
                    (e = !0),
                  c.toggleClass(this.$allWrappers, "has-error", e),
                  !e
                );
              },
            },
            {
              key: "destroy",
              value: function () {
                var e = this.$ele;
                (e.virtualSelect = void 0),
                  (e.value = void 0),
                  (e.innerHTML = ""),
                  this.hasDropboxWrapper &&
                    (this.$dropboxWrapper.remove(),
                    this.mutationObserver.disconnect()),
                  this.dropboxPopover && this.dropboxPopover.destroy(),
                  c.removeClass(e, "vscomp-ele");
              },
            },
            {
              key: "createSecureTextElements",
              value: function () {
                (this.$secureDiv = document.createElement("div")),
                  (this.$secureText = document.createTextNode("")),
                  this.$secureDiv.appendChild(this.$secureText);
              },
            },
            {
              key: "secureText",
              value: function (e) {
                return e && this.enableSecureText
                  ? ((this.$secureText.nodeValue = e), this.$secureDiv.innerHTML)
                  : e;
              },
            },
            {
              key: "toggleRequired",
              value: function (e) {
                (this.required = s.convertToBoolean(e)),
                  (this.$ele.required = this.required);
              },
            },
            {
              key: "toggleOptionSelectedState",
              value: function (e, t) {
                var i = t;
                void 0 === i && (i = !c.hasClass(e, "selected")),
                  c.toggleClass(e, "selected", i),
                  c.setAria(e, "selected", i);
              },
            },
            {
              key: "toggleOptionFocusedState",
              value: function (e, t) {
                e &&
                  (c.toggleClass(e, "focused", t),
                  t && c.setAria(this.$wrapper, "activedescendant", e.id));
              },
            },
          ]) && O(t.prototype, i),
          o && O(t, o),
          Object.defineProperty(t, "prototype", { writable: !1 }),
          e
        );
      })();
    document.addEventListener("reset", A.onFormReset),
      document.addEventListener("submit", A.onFormSubmit),
      window.addEventListener("resize", A.onResizeMethod),
      (x = A.getAttrProps()),
      (window.VirtualSelect = A),
      "undefined" != typeof NodeList &&
        NodeList.prototype &&
        !NodeList.prototype.forEach &&
        (NodeList.prototype.forEach = Array.prototype.forEach);
  })(),
    (function () {
      "use strict";
      function e(e) {
        return (
          (function (e) {
            if (Array.isArray(e)) return t(e);
          })(e) ||
          (function (e) {
            if (
              ("undefined" != typeof Symbol && null != e[Symbol.iterator]) ||
              null != e["@@iterator"]
            )
              return Array.from(e);
          })(e) ||
          (function (e, i) {
            if (e) {
              if ("string" == typeof e) return t(e, i);
              var o = Object.prototype.toString.call(e).slice(8, -1);
              return (
                "Object" === o && e.constructor && (o = e.constructor.name),
                "Map" === o || "Set" === o
                  ? Array.from(e)
                  : "Arguments" === o ||
                    /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(o)
                  ? t(e, i)
                  : void 0
              );
            }
          })(e) ||
          (function () {
            throw new TypeError(
              "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
            );
          })()
        );
      }
      function t(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var i = 0, o = new Array(t); i < t; i++) o[i] = e[i];
        return o;
      }
      var i = (function () {
          function t() {
            !(function (e, t) {
              if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function");
            })(this, t);
          }
          var i;
          return (
            (i = [
              {
                key: "addClass",
                value: function (i, o) {
                  i &&
                    ((o = o.split(" ")),
                    t.getElements(i).forEach(function (t) {
                      var i;
                      (i = t.classList).add.apply(i, e(o));
                    }));
                },
              },
              {
                key: "removeClass",
                value: function (i, o) {
                  i &&
                    ((o = o.split(" ")),
                    t.getElements(i).forEach(function (t) {
                      var i;
                      (i = t.classList).remove.apply(i, e(o));
                    }));
                },
              },
              {
                key: "getElements",
                value: function (e) {
                  if (e) return void 0 === e.forEach && (e = [e]), e;
                },
              },
              {
                key: "getMoreVisibleSides",
                value: function (e) {
                  if (!e) return {};
                  var t = e.getBoundingClientRect(),
                    i = window.innerWidth,
                    o = window.innerHeight,
                    s = t.left,
                    n = t.top;
                  return {
                    horizontal: s > i - s - t.width ? "left" : "right",
                    vertical: n > o - n - t.height ? "top" : "bottom",
                  };
                },
              },
              {
                key: "getAbsoluteCoords",
                value: function (e) {
                  if (e) {
                    var t = e.getBoundingClientRect(),
                      i = window.pageXOffset,
                      o = window.pageYOffset;
                    return {
                      width: t.width,
                      height: t.height,
                      top: t.top + o,
                      right: t.right + i,
                      bottom: t.bottom + o,
                      left: t.left + i,
                    };
                  }
                },
              },
              {
                key: "getCoords",
                value: function (e) {
                  return e ? e.getBoundingClientRect() : {};
                },
              },
              {
                key: "getData",
                value: function (e, t, i) {
                  if (e) {
                    var o = e ? e.dataset[t] : "";
                    return (
                      "number" === i
                        ? (o = parseFloat(o) || 0)
                        : "true" === o
                        ? (o = !0)
                        : "false" === o && (o = !1),
                      o
                    );
                  }
                },
              },
              {
                key: "setData",
                value: function (e, t, i) {
                  e && (e.dataset[t] = i);
                },
              },
              {
                key: "setStyle",
                value: function (e, t, i) {
                  e && (e.style[t] = i);
                },
              },
              {
                key: "show",
                value: function (e) {
                  var i =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : "block";
                  t.setStyle(e, "display", i);
                },
              },
              {
                key: "hide",
                value: function (e) {
                  t.setStyle(e, "display", "none");
                },
              },
              {
                key: "getHideableParent",
                value: function (e) {
                  for (var t, i = e.parentElement; i; ) {
                    var o = getComputedStyle(i).overflow;
                    if (-1 !== o.indexOf("scroll") || -1 !== o.indexOf("auto")) {
                      t = i;
                      break;
                    }
                    i = i.parentElement;
                  }
                  return t;
                },
              },
            ]) &&
              (function (e, t) {
                for (var i = 0; i < t.length; i++) {
                  var o = t[i];
                  (o.enumerable = o.enumerable || !1),
                    (o.configurable = !0),
                    "value" in o && (o.writable = !0),
                    Object.defineProperty(e, o.key, o);
                }
              })(t, i),
            t
          );
        })(),
        o = ["top", "bottom", "left", "right"].map(function (e) {
          return "position-".concat(e);
        }),
        s = {
          top: "rotate(180deg)",
          left: "rotate(90deg)",
          right: "rotate(-90deg)",
        },
        n = (function () {
          function e(t) {
            !(function (e, t) {
              if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function");
            })(this, e);
            try {
              this.setProps(t), this.init();
            } catch (e) {
              console.warn("Couldn't initiate popper"), console.error(e);
            }
          }
          var t;
          return (
            (t = [
              {
                key: "init",
                value: function () {
                  var e = this.$popperEle;
                  e &&
                    this.$triggerEle &&
                    (i.setStyle(e, "zIndex", this.zIndex), this.setPosition());
                },
              },
              {
                key: "setProps",
                value: function (e) {
                  var t = (e = this.setDefaultProps(e)).position
                    ? e.position.toLowerCase()
                    : "auto";
                  if (
                    ((this.$popperEle = e.$popperEle),
                    (this.$triggerEle = e.$triggerEle),
                    (this.$arrowEle = e.$arrowEle),
                    (this.margin = parseFloat(e.margin)),
                    (this.offset = parseFloat(e.offset)),
                    (this.enterDelay = parseFloat(e.enterDelay)),
                    (this.exitDelay = parseFloat(e.exitDelay)),
                    (this.showDuration = parseFloat(e.showDuration)),
                    (this.hideDuration = parseFloat(e.hideDuration)),
                    (this.transitionDistance = parseFloat(e.transitionDistance)),
                    (this.zIndex = parseFloat(e.zIndex)),
                    (this.afterShowCallback = e.afterShow),
                    (this.afterHideCallback = e.afterHide),
                    (this.hasArrow = !!this.$arrowEle),
                    -1 !== t.indexOf(" "))
                  ) {
                    var i = t.split(" ");
                    (this.position = i[0]), (this.secondaryPosition = i[1]);
                  } else this.position = t;
                },
              },
              {
                key: "setDefaultProps",
                value: function (e) {
                  return Object.assign(
                    {
                      position: "auto",
                      margin: 8,
                      offset: 5,
                      enterDelay: 0,
                      exitDelay: 0,
                      showDuration: 300,
                      hideDuration: 200,
                      transitionDistance: 10,
                      zIndex: 1,
                    },
                    e
                  );
                },
              },
              {
                key: "setPosition",
                value: function () {
                  i.show(this.$popperEle, "inline-flex");
                  var e,
                    t,
                    n,
                    r = window.innerWidth,
                    a = window.innerHeight,
                    l = i.getAbsoluteCoords(this.$popperEle),
                    u = i.getAbsoluteCoords(this.$triggerEle),
                    p = l.width,
                    c = l.height,
                    h = l.top,
                    d = l.right,
                    v = l.bottom,
                    f = l.left,
                    y = u.width,
                    b = u.height,
                    m = u.top,
                    g = u.right,
                    O = u.bottom,
                    S = u.left,
                    x = m - h,
                    w = S - f,
                    k = w,
                    E = x,
                    C = this.position,
                    A = this.secondaryPosition,
                    $ = y / 2 - p / 2,
                    T = b / 2 - c / 2,
                    D = this.margin,
                    V = this.transitionDistance,
                    P = window.scrollY - h,
                    I = a + P,
                    M = window.scrollX - f,
                    F = r + M,
                    L = this.offset;
                  L && ((P += L), (I -= L), (M += L), (F -= L)),
                    "auto" === C &&
                      (C = i.getMoreVisibleSides(this.$triggerEle).vertical);
                  var G = {
                      top: { top: E - c - D, left: k + $ },
                      bottom: { top: E + b + D, left: k + $ },
                      right: { top: E + T, left: k + y + D },
                      left: { top: E + T, left: k - p - D },
                    },
                    N = G[C];
                  if (
                    ((E = N.top),
                    (k = N.left),
                    A &&
                      ("top" === A
                        ? (E = x)
                        : "bottom" === A
                        ? (E = x + b - c)
                        : "left" === A
                        ? (k = w)
                        : "right" === A && (k = w + y - p)),
                    k < M
                      ? "left" === C
                        ? (n = "right")
                        : (k = M + f > g ? g - f : M)
                      : k + p > F &&
                        ("right" === C
                          ? (n = "left")
                          : (k = F + f < S ? S - d : F - p)),
                    E < P
                      ? "top" === C
                        ? (n = "bottom")
                        : (E = P + h > O ? O - h : P)
                      : E + c > I &&
                        ("bottom" === C
                          ? (n = "top")
                          : (E = I + h < m ? m - v : I - c)),
                    n)
                  ) {
                    var H = G[n];
                    "top" === (C = n) || "bottom" === C
                      ? (E = H.top)
                      : ("left" !== C && "right" !== C) || (k = H.left);
                  }
                  "top" === C
                    ? ((e = E + V), (t = k))
                    : "right" === C
                    ? ((e = E), (t = k - V))
                    : "left" === C
                    ? ((e = E), (t = k + V))
                    : ((e = E - V), (t = k));
                  var j = "translate3d(".concat(t, "px, ").concat(e, "px, 0)");
                  if (
                    (i.setStyle(this.$popperEle, "transform", j),
                    i.setData(this.$popperEle, "fromLeft", t),
                    i.setData(this.$popperEle, "fromTop", e),
                    i.setData(this.$popperEle, "top", E),
                    i.setData(this.$popperEle, "left", k),
                    i.removeClass(this.$popperEle, o.join(" ")),
                    i.addClass(this.$popperEle, "position-".concat(C)),
                    this.hasArrow)
                  ) {
                    var W = 0,
                      q = 0,
                      R = k + f,
                      z = E + h,
                      B = this.$arrowEle.offsetWidth / 2,
                      K = s[C] || "";
                    "top" === C || "bottom" === C
                      ? (W = y / 2 + S - R) < B
                        ? (W = B)
                        : W > p - B && (W = p - B)
                      : ("left" !== C && "right" !== C) ||
                        ((q = b / 2 + m - z) < B
                          ? (q = B)
                          : q > c - B && (q = c - B)),
                      i.setStyle(
                        this.$arrowEle,
                        "transform",
                        "translate3d("
                          .concat(W, "px, ")
                          .concat(q, "px, 0) ")
                          .concat(K)
                      );
                  }
                  i.hide(this.$popperEle);
                },
              },
              {
                key: "resetPosition",
                value: function () {
                  i.setStyle(this.$popperEle, "transform", "none"),
                    this.setPosition();
                },
              },
              {
                key: "show",
                value: function () {
                  var e = this,
                    t =
                      arguments.length > 0 && void 0 !== arguments[0]
                        ? arguments[0]
                        : {},
                    o = t.resetPosition,
                    s = t.data;
                  clearTimeout(this.exitDelayTimeout),
                    clearTimeout(this.hideDurationTimeout),
                    o && this.resetPosition(),
                    (this.enterDelayTimeout = setTimeout(function () {
                      var t = i.getData(e.$popperEle, "left"),
                        o = i.getData(e.$popperEle, "top"),
                        n = "translate3d(".concat(t, "px, ").concat(o, "px, 0)"),
                        r = e.showDuration;
                      i.show(e.$popperEle, "inline-flex"),
                        i.getCoords(e.$popperEle),
                        i.setStyle(e.$popperEle, "transitionDuration", r + "ms"),
                        i.setStyle(e.$popperEle, "transform", n),
                        i.setStyle(e.$popperEle, "opacity", 1),
                        (e.showDurationTimeout = setTimeout(function () {
                          "function" == typeof e.afterShowCallback &&
                            e.afterShowCallback(s);
                        }, r));
                    }, this.enterDelay));
                },
              },
              {
                key: "hide",
                value: function () {
                  var e = this,
                    t =
                      arguments.length > 0 && void 0 !== arguments[0]
                        ? arguments[0]
                        : {},
                    o = t.data;
                  clearTimeout(this.enterDelayTimeout),
                    clearTimeout(this.showDurationTimeout),
                    (this.exitDelayTimeout = setTimeout(function () {
                      if (e.$popperEle) {
                        var t = i.getData(e.$popperEle, "fromLeft"),
                          s = i.getData(e.$popperEle, "fromTop"),
                          n = "translate3d("
                            .concat(t, "px, ")
                            .concat(s, "px, 0)"),
                          r = e.hideDuration;
                        i.setStyle(e.$popperEle, "transitionDuration", r + "ms"),
                          i.setStyle(e.$popperEle, "transform", n),
                          i.setStyle(e.$popperEle, "opacity", 0),
                          (e.hideDurationTimeout = setTimeout(function () {
                            i.hide(e.$popperEle),
                              "function" == typeof e.afterHideCallback &&
                                e.afterHideCallback(o);
                          }, r));
                      }
                    }, this.exitDelay));
                },
              },
              {
                key: "updatePosition",
                value: function () {
                  i.setStyle(this.$popperEle, "transitionDuration", "0ms"),
                    this.resetPosition();
                  var e = i.getData(this.$popperEle, "left"),
                    t = i.getData(this.$popperEle, "top");
                  i.show(this.$popperEle, "inline-flex"),
                    i.setStyle(
                      this.$popperEle,
                      "transform",
                      "translate3d(".concat(e, "px, ").concat(t, "px, 0)")
                    );
                },
              },
            ]) &&
              (function (e, t) {
                for (var i = 0; i < t.length; i++) {
                  var o = t[i];
                  (o.enumerable = o.enumerable || !1),
                    (o.configurable = !0),
                    "value" in o && (o.writable = !0),
                    Object.defineProperty(e, o.key, o);
                }
              })(e.prototype, t),
            e
          );
        })();
      window.PopperComponent = n;
    })(),
    (function () {
      "use strict";
      function e(e, t) {
        for (var i = 0; i < t.length; i++) {
          var o = t[i];
          (o.enumerable = o.enumerable || !1),
            (o.configurable = !0),
            "value" in o && (o.writable = !0),
            Object.defineProperty(e, o.key, o);
        }
      }
      var t = (function () {
        function t() {
          !(function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, t);
        }
        var i, o;
        return (
          (i = t),
          (o = [
            {
              key: "convertToBoolean",
              value: function (e) {
                var t =
                  arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                return (
                  !0 === e || "true" === e || (!1 !== e && "false" !== e && t)
                );
              },
            },
            {
              key: "removeArrayEmpty",
              value: function (e) {
                return Array.isArray(e) && e.length
                  ? e.filter(function (e) {
                      return !!e;
                    })
                  : [];
              },
            },
            {
              key: "throttle",
              value: function (e, t) {
                var i,
                  o = 0;
                return function () {
                  for (
                    var s = arguments.length, n = new Array(s), r = 0;
                    r < s;
                    r++
                  )
                    n[r] = arguments[r];
                  var a = new Date().getTime(),
                    l = t - (a - o);
                  clearTimeout(i),
                    l <= 0
                      ? ((o = a), e.apply(void 0, n))
                      : (i = setTimeout(function () {
                          e.apply(void 0, n);
                        }, l));
                };
              },
            },
          ]) && e(i, o),
          Object.defineProperty(i, "prototype", { writable: !1 }),
          t
        );
      })();
      function i(e) {
        return (
          (function (e) {
            if (Array.isArray(e)) return o(e);
          })(e) ||
          (function (e) {
            if (
              ("undefined" != typeof Symbol && null != e[Symbol.iterator]) ||
              null != e["@@iterator"]
            )
              return Array.from(e);
          })(e) ||
          (function (e, t) {
            if (e) {
              if ("string" == typeof e) return o(e, t);
              var i = Object.prototype.toString.call(e).slice(8, -1);
              return (
                "Object" === i && e.constructor && (i = e.constructor.name),
                "Map" === i || "Set" === i
                  ? Array.from(e)
                  : "Arguments" === i ||
                    /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i)
                  ? o(e, t)
                  : void 0
              );
            }
          })(e) ||
          (function () {
            throw new TypeError(
              "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
            );
          })()
        );
      }
      function o(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var i = 0, o = new Array(t); i < t; i++) o[i] = e[i];
        return o;
      }
      function s(e, t) {
        for (var i = 0; i < t.length; i++) {
          var o = t[i];
          (o.enumerable = o.enumerable || !1),
            (o.configurable = !0),
            "value" in o && (o.writable = !0),
            Object.defineProperty(e, o.key, o);
        }
      }
      var n = (function () {
        function e() {
          !(function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, e);
        }
        var o, n;
        return (
          (o = e),
          (n = [
            {
              key: "addClass",
              value: function (t, o) {
                t &&
                  ((o = o.split(" ")),
                  e.getElements(t).forEach(function (e) {
                    var t;
                    (t = e.classList).add.apply(t, i(o));
                  }));
              },
            },
            {
              key: "removeClass",
              value: function (t, o) {
                t &&
                  ((o = o.split(" ")),
                  e.getElements(t).forEach(function (e) {
                    var t;
                    (t = e.classList).remove.apply(t, i(o));
                  }));
              },
            },
            {
              key: "hasClass",
              value: function (e, t) {
                return !!e && e.classList.contains(t);
              },
            },
            {
              key: "getElement",
              value: function (e) {
                return (
                  e &&
                    ("string" == typeof e
                      ? (e = document.querySelector(e))
                      : void 0 !== e.length && (e = e[0])),
                  e || null
                );
              },
            },
            {
              key: "getElements",
              value: function (e) {
                if (e) return void 0 === e.forEach && (e = [e]), e;
              },
            },
            {
              key: "addEvent",
              value: function (t, i, o) {
                e.addOrRemoveEvent(t, i, o, "add");
              },
            },
            {
              key: "removeEvent",
              value: function (t, i, o) {
                e.addOrRemoveEvent(t, i, o, "remove");
              },
            },
            {
              key: "addOrRemoveEvent",
              value: function (i, o, s, n) {
                i &&
                  (o = t.removeArrayEmpty(o.split(" "))).forEach(function (t) {
                    (i = e.getElements(i)).forEach(function (e) {
                      "add" === n
                        ? e.addEventListener(t, s)
                        : e.removeEventListener(t, s);
                    });
                  });
              },
            },
            {
              key: "getScrollableParents",
              value: function (e) {
                if (!e) return [];
                for (var t = [window], i = e.parentElement; i; ) {
                  var o = getComputedStyle(i).overflow;
                  (-1 === o.indexOf("scroll") && -1 === o.indexOf("auto")) ||
                    t.push(i),
                    (i = i.parentElement);
                }
                return t;
              },
            },
            {
              key: "convertPropToDataAttr",
              value: function (e) {
                return e
                  ? "data-popover-"
                      .concat(e)
                      .replace(/([A-Z])/g, "-$1")
                      .toLowerCase()
                  : "";
              },
            },
          ]) && s(o, n),
          Object.defineProperty(o, "prototype", { writable: !1 }),
          e
        );
      })();
      function r(e, t) {
        for (var i = 0; i < t.length; i++) {
          var o = t[i];
          (o.enumerable = o.enumerable || !1),
            (o.configurable = !0),
            "value" in o && (o.writable = !0),
            Object.defineProperty(e, o.key, o);
        }
      }
      var a,
        l = { 27: "onEscPress" },
        u = [
          "target",
          "position",
          "margin",
          "offset",
          "enterDelay",
          "exitDelay",
          "showDuration",
          "hideDuration",
          "transitionDistance",
          "updatePositionThrottle",
          "zIndex",
          "hideOnOuterClick",
          "showOnHover",
          "hideArrowIcon",
          "disableManualAction",
          "disableUpdatePosition",
        ],
        p = (function () {
          function e(t) {
            !(function (e, t) {
              if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function");
            })(this, e);
            try {
              this.setProps(t), this.init();
            } catch (e) {
              console.warn("Couldn't initiate Popover component"),
                console.error(e);
            }
          }
          var i, o, s;
          return (
            (i = e),
            (s = [
              {
                key: "init",
                value: function (t) {
                  var i = t.ele;
                  if (i) {
                    var o = !1;
                    if ("string" == typeof i) {
                      if (!(i = document.querySelectorAll(i))) return;
                      1 === i.length && (o = !0);
                    }
                    void 0 === i.length && ((i = [i]), (o = !0));
                    var s = [];
                    return (
                      i.forEach(function (i) {
                        (t.ele = i), e.destroy(i), s.push(new e(t));
                      }),
                      o ? s[0] : s
                    );
                  }
                },
              },
              {
                key: "destroy",
                value: function (e) {
                  if (e) {
                    var t = e.popComp;
                    t && t.destroy();
                  }
                },
              },
              {
                key: "showMethod",
                value: function () {
                  this.popComp.show();
                },
              },
              {
                key: "hideMethod",
                value: function () {
                  this.popComp.hide();
                },
              },
              {
                key: "updatePositionMethod",
                value: function () {
                  this.popComp.popper.updatePosition();
                },
              },
              {
                key: "getAttrProps",
                value: function () {
                  var e = n.convertPropToDataAttr,
                    t = {};
                  return (
                    u.forEach(function (i) {
                      t[e(i)] = i;
                    }),
                    t
                  );
                },
              },
            ]),
            (o = [
              {
                key: "init",
                value: function () {
                  this.$popover &&
                    (this.setElementProps(),
                    this.renderArrow(),
                    this.initPopper(),
                    this.addEvents());
                },
              },
              {
                key: "getEvents",
                value: function () {
                  var e = [
                    { $ele: document, event: "click", method: "onDocumentClick" },
                    {
                      $ele: document,
                      event: "keydown",
                      method: "onDocumentKeyDown",
                    },
                  ];
                  return (
                    this.disableManualAction ||
                      (e.push({
                        $ele: this.$ele,
                        event: "click",
                        method: "onTriggerEleClick",
                      }),
                      this.showOnHover &&
                        (e.push({
                          $ele: this.$ele,
                          event: "mouseenter",
                          method: "onTriggerEleMouseEnter",
                        }),
                        e.push({
                          $ele: this.$ele,
                          event: "mouseleave",
                          method: "onTriggerEleMouseLeave",
                        }))),
                    e
                  );
                },
              },
              {
                key: "addOrRemoveEvents",
                value: function (e) {
                  var t = this;
                  this.getEvents().forEach(function (i) {
                    t.addOrRemoveEvent({
                      action: e,
                      $ele: i.$ele,
                      events: i.event,
                      method: i.method,
                    });
                  });
                },
              },
              {
                key: "addEvents",
                value: function () {
                  this.addOrRemoveEvents("add");
                },
              },
              {
                key: "removeEvents",
                value: function () {
                  this.addOrRemoveEvents("remove"),
                    this.removeScrollEventListeners(),
                    this.removeResizeEventListeners();
                },
              },
              {
                key: "addOrRemoveEvent",
                value: function (e) {
                  var i = this,
                    o = e.action,
                    s = e.$ele,
                    r = e.events,
                    a = e.method,
                    l = e.throttle;
                  s &&
                    (r = t.removeArrayEmpty(r.split(" "))).forEach(function (e) {
                      var r = "".concat(a, "-").concat(e),
                        u = i.events[r];
                      u ||
                        ((u = i[a].bind(i)),
                        l && (u = t.throttle(u, l)),
                        (i.events[r] = u)),
                        "add" === o
                          ? n.addEvent(s, e, u)
                          : n.removeEvent(s, e, u);
                    });
                },
              },
              {
                key: "addScrollEventListeners",
                value: function () {
                  (this.$scrollableElems = n.getScrollableParents(this.$ele)),
                    this.addOrRemoveEvent({
                      action: "add",
                      $ele: this.$scrollableElems,
                      events: "scroll",
                      method: "onAnyParentScroll",
                      throttle: this.updatePositionThrottle,
                    });
                },
              },
              {
                key: "removeScrollEventListeners",
                value: function () {
                  this.$scrollableElems &&
                    (this.addOrRemoveEvent({
                      action: "remove",
                      $ele: this.$scrollableElems,
                      events: "scroll",
                      method: "onAnyParentScroll",
                    }),
                    (this.$scrollableElems = null));
                },
              },
              {
                key: "addResizeEventListeners",
                value: function () {
                  this.addOrRemoveEvent({
                    action: "add",
                    $ele: window,
                    events: "resize",
                    method: "onResize",
                    throttle: this.updatePositionThrottle,
                  });
                },
              },
              {
                key: "removeResizeEventListeners",
                value: function () {
                  this.addOrRemoveEvent({
                    action: "remove",
                    $ele: window,
                    events: "resize",
                    method: "onResize",
                  });
                },
              },
              {
                key: "onAnyParentScroll",
                value: function () {
                  this.popper.updatePosition();
                },
              },
              {
                key: "onResize",
                value: function () {
                  this.popper.updatePosition();
                },
              },
              {
                key: "onDocumentClick",
                value: function (e) {
                  var t = e.target,
                    i = t.closest(".pop-comp-ele"),
                    o = t.closest(".pop-comp-wrapper");
                  this.hideOnOuterClick &&
                    i !== this.$ele &&
                    o !== this.$popover &&
                    this.hide();
                },
              },
              {
                key: "onDocumentKeyDown",
                value: function (e) {
                  var t = e.which || e.keyCode,
                    i = l[t];
                  i && this[i](e);
                },
              },
              {
                key: "onEscPress",
                value: function () {
                  this.hideOnOuterClick && this.hide();
                },
              },
              {
                key: "onTriggerEleClick",
                value: function () {
                  this.toggle();
                },
              },
              {
                key: "onTriggerEleMouseEnter",
                value: function () {
                  this.show();
                },
              },
              {
                key: "onTriggerEleMouseLeave",
                value: function () {
                  this.hide();
                },
              },
              {
                key: "setProps",
                value: function (e) {
                  (e = this.setDefaultProps(e)), this.setPropsFromElementAttr(e);
                  var i = t.convertToBoolean;
                  (this.$ele = e.ele),
                    (this.target = e.target),
                    (this.position = e.position),
                    (this.margin = parseFloat(e.margin)),
                    (this.offset = parseFloat(e.offset)),
                    (this.enterDelay = parseFloat(e.enterDelay)),
                    (this.exitDelay = parseFloat(e.exitDelay)),
                    (this.showDuration = parseFloat(e.showDuration)),
                    (this.hideDuration = parseFloat(e.hideDuration)),
                    (this.transitionDistance = parseFloat(e.transitionDistance)),
                    (this.updatePositionThrottle = parseFloat(
                      e.updatePositionThrottle
                    )),
                    (this.zIndex = parseFloat(e.zIndex)),
                    (this.hideOnOuterClick = i(e.hideOnOuterClick)),
                    (this.showOnHover = i(e.showOnHover)),
                    (this.hideArrowIcon = i(e.hideArrowIcon)),
                    (this.disableManualAction = i(e.disableManualAction)),
                    (this.disableUpdatePosition = i(e.disableUpdatePosition)),
                    (this.beforeShowCallback = e.beforeShow),
                    (this.afterShowCallback = e.afterShow),
                    (this.beforeHideCallback = e.beforeHide),
                    (this.afterHideCallback = e.afterHide),
                    (this.events = {}),
                    (this.$popover = n.getElement(this.target));
                },
              },
              {
                key: "setDefaultProps",
                value: function (e) {
                  return Object.assign(
                    {
                      position: "auto",
                      margin: 8,
                      offset: 5,
                      enterDelay: 0,
                      exitDelay: 0,
                      showDuration: 300,
                      hideDuration: 200,
                      transitionDistance: 10,
                      updatePositionThrottle: 100,
                      zIndex: 1,
                      hideOnOuterClick: !0,
                      showOnHover: !1,
                      hideArrowIcon: !1,
                      disableManualAction: !1,
                      disableUpdatePosition: !1,
                    },
                    e
                  );
                },
              },
              {
                key: "setPropsFromElementAttr",
                value: function (e) {
                  var t = e.ele;
                  for (var i in a) {
                    var o = t.getAttribute(i);
                    o && (e[a[i]] = o);
                  }
                },
              },
              {
                key: "setElementProps",
                value: function () {
                  var t = this.$ele;
                  (t.popComp = this),
                    (t.show = e.showMethod),
                    (t.hide = e.hideMethod),
                    (t.updatePosition = e.updatePositionMethod),
                    n.addClass(this.$ele, "pop-comp-ele"),
                    n.addClass(this.$popover, "pop-comp-wrapper");
                },
              },
              {
                key: "getOtherTriggerPopComp",
                value: function () {
                  var e,
                    t = this.$popover.popComp;
                  return t && t.$ele !== this.$ele && (e = t), e;
                },
              },
              {
                key: "initPopper",
                value: function () {
                  var e = {
                    $popperEle: this.$popover,
                    $triggerEle: this.$ele,
                    $arrowEle: this.$arrowEle,
                    position: this.position,
                    margin: this.margin,
                    offset: this.offset,
                    enterDelay: this.enterDelay,
                    exitDelay: this.exitDelay,
                    showDuration: this.showDuration,
                    hideDuration: this.hideDuration,
                    transitionDistance: this.transitionDistance,
                    zIndex: this.zIndex,
                    afterShow: this.afterShow.bind(this),
                    afterHide: this.afterHide.bind(this),
                  };
                  this.popper = new PopperComponent(e);
                },
              },
              {
                key: "beforeShow",
                value: function () {
                  "function" == typeof this.beforeShowCallback &&
                    this.beforeShowCallback(this);
                },
              },
              {
                key: "beforeHide",
                value: function () {
                  "function" == typeof this.beforeHideCallback &&
                    this.beforeHideCallback(this);
                },
              },
              {
                key: "show",
                value: function () {
                  this.isShown() ||
                    (this.isShownForOtherTrigger()
                      ? this.showAfterOtherHide()
                      : (n.addClass(this.$popover, "pop-comp-disable-events"),
                        (this.$popover.popComp = this),
                        this.beforeShow(),
                        this.popper.show({ resetPosition: !0 }),
                        n.addClass(this.$ele, "pop-comp-active")));
                },
              },
              {
                key: "hide",
                value: function () {
                  this.isShown() &&
                    (this.beforeHide(),
                    this.popper.hide(),
                    this.removeScrollEventListeners(),
                    this.removeResizeEventListeners());
                },
              },
              {
                key: "toggle",
                value: function (e) {
                  void 0 === e && (e = !this.isShown()),
                    e ? this.show() : this.hide();
                },
              },
              {
                key: "isShown",
                value: function () {
                  return n.hasClass(this.$ele, "pop-comp-active");
                },
              },
              {
                key: "isShownForOtherTrigger",
                value: function () {
                  var e = this.getOtherTriggerPopComp();
                  return !!e && e.isShown();
                },
              },
              {
                key: "showAfterOtherHide",
                value: function () {
                  var e = this,
                    t = this.getOtherTriggerPopComp();
                  if (t) {
                    var i = t.exitDelay + t.hideDuration + 100;
                    setTimeout(function () {
                      e.show();
                    }, i);
                  }
                },
              },
              {
                key: "afterShow",
                value: function () {
                  var e = this;
                  this.showOnHover
                    ? setTimeout(function () {
                        n.removeClass(e.$popover, "pop-comp-disable-events");
                      }, 2e3)
                    : n.removeClass(this.$popover, "pop-comp-disable-events"),
                    this.disableUpdatePosition ||
                      (this.addScrollEventListeners(),
                      this.addResizeEventListeners()),
                    "function" == typeof this.afterShowCallback &&
                      this.afterShowCallback(this);
                },
              },
              {
                key: "afterHide",
                value: function () {
                  n.removeClass(this.$ele, "pop-comp-active"),
                    "function" == typeof this.afterHideCallback &&
                      this.afterHideCallback(this);
                },
              },
              {
                key: "renderArrow",
                value: function () {
                  if (!this.hideArrowIcon) {
                    var e = this.$popover.querySelector(".pop-comp-arrow");
                    e ||
                      (this.$popover.insertAdjacentHTML(
                        "afterbegin",
                        '<i class="pop-comp-arrow"></i>'
                      ),
                      (e = this.$popover.querySelector(".pop-comp-arrow"))),
                      (this.$arrowEle = e);
                  }
                },
              },
              {
                key: "destroy",
                value: function () {
                  this.removeEvents();
                },
              },
            ]) && r(i.prototype, o),
            s && r(i, s),
            Object.defineProperty(i, "prototype", { writable: !1 }),
            e
          );
        })();
      (a = p.getAttrProps()), (window.PopoverComponent = p);
    })();
  