"use strict";
function _toConsumableArray(arr) {
  return (
    _arrayWithoutHoles(arr) ||
    _iterableToArray(arr) ||
    _unsupportedIterableToArray(arr) ||
    _nonIterableSpread()
  );
}
function _nonIterableSpread() {
  throw new TypeError(
    "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
  );
}
function _iterableToArray(iter) {
  if (
    (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null) ||
    iter["@@iterator"] != null
  )
    return Array.from(iter);
}
function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return _arrayLikeToArray(arr);
}
function _typeof(obj) {
  "@babel/helpers - typeof";
  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj &&
        typeof Symbol === "function" &&
        obj.constructor === Symbol &&
        obj !== Symbol.prototype
        ? "symbol"
        : typeof obj;
    };
  }
  return _typeof(obj);
}
function _createForOfIteratorHelper(o, allowArrayLike) {
  var it =
    (typeof Symbol !== "undefined" && o[Symbol.iterator]) || o["@@iterator"];
  if (!it) {
    if (
      Array.isArray(o) ||
      (it = _unsupportedIterableToArray(o)) ||
      (allowArrayLike && o && typeof o.length === "number")
    ) {
      if (it) o = it;
      var i = 0;
      var F = function F() {};
      return {
        s: F,
        n: function n() {
          if (i >= o.length) return { done: true };
          return { done: false, value: o[i++] };
        },
        e: function e(_e) {
          throw _e;
        },
        f: F,
      };
    }
    throw new TypeError(
      "Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
    );
  }
  var normalCompletion = true,
    didErr = false,
    err;
  return {
    s: function s() {
      it = it.call(o);
    },
    n: function n() {
      var step = it.next();
      normalCompletion = step.done;
      return step;
    },
    e: function e(_e2) {
      didErr = true;
      err = _e2;
    },
    f: function f() {
      try {
        if (!normalCompletion && it.return != null) it.return();
      } finally {
        if (didErr) throw err;
      }
    },
  };
}
function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))
    return _arrayLikeToArray(o, minLen);
}
function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;
  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }
  return arr2;
}

(function ($) {
  "use strict";

  window.builder = {
    init: function init() {
      this.currentRow = "";
      this.currentColumn = "";
      this.currentBuilder = "";
      this.currentRowInput = "";
      this.componentsOrder = "";
      this.currentColumnPos = "";
      this.currentComponent = "";
      this.currentBuilderType = "";
      this.updateGridDelay = 150;
      this.currentDevice = "desktop";
      this.builderGridContentFlag = false;

      this.preventEmptyRowValues(); // Prevent empty
      this.elementNavigation(); // Element navigation
      this.elementsPopup(); // Element popup
      this.elementsButton(); // Element button
      this.storeGlobals(); // Store globals
      this.elementsPopupContent(); // Element popup content
      this.builderGridContent(); // Builder grid content
      this.elementsSortable(); // Element sortable
      this.builderCustomColumns(); // Builder custom column
      this.builderColumnsLayout(); // Builder columns layout
      this.showHideBuilder(); // Show hide builder
      this.showHideBuilderTop(); // Show hide builder top
    },
    jsonDecode: function jsonDecode(value) {
      return JSON.parse(value.replace(/'/g, '"').replace(";", ""));
    },
    // In some rare cases, the row values are empty, so we need to prevent that
    // case it is empty, we set the default values
    preventEmptyRowValues: function preventEmptyRowValues() {
      var areas = ["header", "footer"],
        rows = ["above", "main", "below"];

      for (var _i = 0, _areas = areas; _i < _areas.length; _i++) {
        var area = _areas[_i];

        var _iterator = _createForOfIteratorHelper(rows),
          _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done; ) {
            var row = _step.value;
            var rowInputValue = $(
              "#_customize-input-knote_builder_" + area + "_row_" + row
            ).val();

            if (rowInputValue == "") {
              $(
                "#_customize-input-knote_builder_" + area + "_row_" + row
              ).val(knote_builder.rows.defaults[area + "_row_" + row]);
            }
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      }

      // Mobile offcanvas row
      var mobileOffcanvasRowInputValue = $(
        "#_customize-input-knote_builder_mobile_offcanvas"
      ).val();
      if (mobileOffcanvasRowInputValue == "") {
        $("#_customize-input-knote_builder_mobile_offcanvas").val(
          knote_builder.rows.defaults["mobile_offcanvas"]
        );
      }
    },
    elementNavigation: function elementNavigation() {
      var sections = [
        //Header
        "sub-accordion-section-knote_section_header_row_above",
        "sub-accordion-section-knote_section_header_row_main",
        "sub-accordion-section-knote_section_header_row_below",
        "sub-accordion-section-knote_header_component_button",
        "sub-accordion-section-knote_header_component_button2",
        "sub-accordion-section-knote_header_component_hamburger",
        "sub-accordion-section-knote_header_component_html",
        "sub-accordion-section-knote_header_component_html2",
        "sub-accordion-section-knote_header_component_shortcode",
        "sub-accordion-section-knote_header_component_logo",
        "sub-accordion-section-knote_header_component_menu",
        "sub-accordion-section-knote_header_component_search",
        "sub-accordion-section-knote_header_component_social",
        "sub-accordion-section-knote_header_component_scrolling_text",
        "sub-accordion-section-knote_header_component_secondary_menu",
        "sub-accordion-section-knote_header_component_offcanvas_menu",
        "sub-accordion-section-knote_header_component_cart",
        "sub-accordion-section-knote_header_component_contact_information",

        //Footer
        "sub-accordion-section-knote_section_footer_row_above",
        "sub-accordion-section-knote_section_footer_row_main",
        "sub-accordion-section-knote_section_footer_row_below",
        "sub-accordion-section-knote_footer_component_widget1",
        "sub-accordion-section-knote_footer_component_widget2",
        "sub-accordion-section-knote_footer_component_widget3",
        "sub-accordion-section-knote_footer_component_widget4",
        "sub-accordion-section-knote_footer_component_widget5",
        "sub-accordion-section-knote_footer_component_widget6",
        "sub-accordion-section-knote_footer_component_widget_area",
        "sub-accordion-section-knote_footer_component_credits",
        "sub-accordion-section-knote_footer_component_shortcode",
        "sub-accordion-section-knote_footer_component_button",
        "sub-accordion-section-knote_footer_component_button2",
        "sub-accordion-section-knote_footer_component_html",
        "sub-accordion-section-knote_footer_component_html2",
        "sub-accordion-section-knote_footer_component_footer_menu",
        "sub-accordion-section-knote_footer_component_policy_menu",
        "sub-accordion-section-knote_footer_component_payment_icons",
      ];

      var rows = ["above", "main", "below"];

      for (var _i2 = 0, _rows = rows; _i2 < _rows.length; _i2++) {
        var row = _rows[_i2];
        for (var i = 1; i <= 6; i++) {
          sections.push(
            "sub-accordion-section-knote_builder_header_row_" +
              row +
              "_column" +
              i
          );
          sections.push(
            "sub-accordion-section-knote_builder_footer_row_" +
              row +
              "_column" +
              i
          );
        }
      }

      var current_section_id = "";
      $(document).on(
        "mouseover focus",
        ".customize-section-back",
        function (e) {
          current_section_id = $(".control-section.open").attr("id");
        }
      );

      $(document).on("click keydown", ".customize-section-back", function (e) {
        if (sections.includes(current_section_id)) {
          //Header Columns
          if (current_section_id.indexOf("_header_row_above_column") !== -1) {
            wp.customize.section("knote_section_header_row_above").focus();
            return false;
          }

          if (current_section_id.indexOf("_header_row_main_column") !== -1) {
            wp.customize.section("knote_section_header_row_main").focus();
            return false;
          }

          if (current_section_id.indexOf("_header_row_below_column") !== -1) {
            wp.customize.section("knote_section_header_row_below").focus();
            return false;
          }

          //Footer Columns
          if (current_section_id.indexOf("_footer_row_above_column") !== -1) {
            wp.customize.section("knote_section_footer_row_above").focus();
            return false;
          }

          if (current_section_id.indexOf("_footer_row_main_column") !== -1) {
            wp.customize.section("knote_section_footer_row_main").focus();
            return false;
          }

          if (current_section_id.indexOf("_footer_row_below_column") !== -1) {
            wp.customize.section("knote_section_footer_row_below").focus();
            return false;
          }

          if (current_section_id.indexOf("_header_") !== -1) {
            wp.customize.section("knote_section_header_wrapper").focus();
          } else {
            wp.customize.section("knote_section_footer_wrapper").focus();
          }
        }
      });
    },
    storeGlobals: function storeGlobals() {
      var _this = this;

      // Current Device.
      $(".wp-full-overlay-footer .devices button").on("click", function () {
        var device = $(this).attr("data-device");

        if (device === "tablet") {
          device = "mobile";
        }

        if (_this.currentBuilderType === "footer") {
          device = "desktop";
        }

        _this.currentDevice = device;
        _this.builderGridContent();
      });

      // Column Area.
      $(document).on(
        "click mouseover",
        ".knote-builder-area:not(.builder-available-components)",
        function (e) {
          if ($("#knote-builder-elements").hasClass("active")) {
            return false;
          }

          _this.currentRowInput = $(
            "#_customize-input-knote_builder_" + $(this).data("builder-row")
          );

          _this.currentRow = $(this).closest(".block-builder__row");
          _this.currentColumnPos = $(this).index() - 1;
          _this.currentColumn = $(this);

          if (
            !_this.currentRow.length &&
            $(this).hasClass("knote-builder-area-offcanvas")
          ) {
            _this.currentRowInput = $(
              "#_customize-input-knote_builder_mobile_offcanvas"
            );
            _this.currentRow = $(".knote-builder-area-offcanvas");
            _this.currentColumnPos = $(this).index();
          }
        }
      );

      $(document).on("click mouseover", ".element-button", function (e) {
        _this.currentComponent = $(this).data("element-id");
      });
    },
    builderGridContent: function builderGridContent() {
      var _this = this,
        fields = [
          "#_customize-input-knote_builder_header_row_above",
          "#_customize-input-knote_builder_header_row_main",
          "#_customize-input-knote_builder_header_row_below",
          "#_customize-input-knote_builder_mobile_offcanvas",
        ];

      if (_this.currentBuilderType && _this.currentBuilderType === "footer") {
        fields = [
          "#_customize-input-knote_builder_footer_row_above",
          "#_customize-input-knote_builder_footer_row_main",
          "#_customize-input-knote_builder_footer_row_below",
        ];
      }

      if (_this.builderGridContentFlag) {
        return false;
      }

      _this.builderGridContentFlag = true;

      setTimeout(function () {
        var _iterator10 = _createForOfIteratorHelper(fields),
          _step10;

        try {
          for (_iterator10.s(); !(_step10 = _iterator10.n()).done; ) {
            var field = _step10.value;

            var value = _this.jsonDecode($(field).val());
            var current_row = ""; // Detect row.

            if (field.indexOf(_this.currentBuilderType + "_row_above") !== -1) {
              current_row = "above";
            }

            if (field.indexOf(_this.currentBuilderType + "_row_main") !== -1) {
              current_row = "main";
            }

            if (field.indexOf(_this.currentBuilderType + "_row_below") !== -1) {
              current_row = "below";
            }

            if (field.indexOf("mobile_offcanvas") !== -1) {
              current_row = "mobile_offcanvas";
            }

            $(
              '.knote-builder-area[data-builder-row="' +
                _this.currentBuilderType +
                "_row_" +
                current_row +
                '"]'
            ).each(function () {
              $(this).remove();
            });

            // Desktop.
            if (_this.currentDevice === "desktop") {
              var column_id = 1;

              var _iterator11 = _createForOfIteratorHelper(value.desktop),
                _step11;

              try {
                for (_iterator11.s(); !(_step11 = _iterator11.n()).done; ) {
                  var columns = _step11.value;
                  $(
                    ".knote-builder-" +
                      _this.currentBuilderType +
                      " .knote-builder-" +
                      current_row +
                      "-row"
                  ).append(
                    '<div class="knote-builder-area" data-builder-row="' +
                      _this.currentBuilderType +
                      "_row_" +
                      current_row +
                      '"><a class="btn-column-edit" href="#" onClick="event.stopPropagation(); wp.customize.section(\'knote_builder_' +
                      _this.currentBuilderType +
                      "_row_" +
                      current_row +
                      "_column" +
                      column_id +
                      '\').focus();"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="2" height="15" fill="#FFF"/><rect x="7" width="2" height="15" fill="#FFF"/><rect y="3" width="3" height="16" transform="rotate(-90 0 3)" fill="#FFF"/><rect y="15" width="2" height="16" transform="rotate(-90 0 15)" fill="#FFF"/><rect x="14" width="2" height="15" fill="#FFF"/></svg></a>'
                  );
                  var column = $(
                    ".knote-builder-" + current_row + "-row"
                  ).find(".knote-builder-area:last-child");

                  if (columns.length) {
                    var _iterator12 = _createForOfIteratorHelper(columns),
                      _step12;

                    try {
                      for (
                        _iterator12.s();
                        !(_step12 = _iterator12.n()).done;

                      ) {
                        var _element2 = _step12.value;
                        _element2 = _this.getElementData(_element2);

                        if (_typeof(_element2) !== "object") {
                          continue;
                        }

                        column.append(
                          '<div class="builder-element-item">' +
                            '<a href="#" class="element-button" data-element-id="' +
                            _element2.id +
                            '" data-section-focus="knote_' +
                            _this.currentBuilderType +
                            "_component_" +
                            _element2.id +
                            '">' +
                            '<span class="title-element">' +
                            _element2.label +
                            "</span>" +
                            '<i class="btn-element-edit dashicons dashicons-admin-generic"></i>' +
                            '<i class="btn-element-remove dashicons dashicons-no-alt"></i>' +
                            "</a>" +
                            "</div>"
                        );
                      }
                    } catch (err) {
                      _iterator12.e(err);
                    } finally {
                      _iterator12.f();
                    }
                  }

                  column_id++;
                }
              } catch (err) {
                _iterator11.e(err);
              } finally {
                _iterator11.f();
              }
            }

            // Mobile
            if (_this.currentDevice === "mobile") {
              var _column_id = 1;

              var _iterator13 = _createForOfIteratorHelper(value.mobile),
                _step13;

              try {
                for (_iterator13.s(); !(_step13 = _iterator13.n()).done; ) {
                  var _columns = _step13.value;
                  $(
                    ".knote-builder-header .knote-builder-" +
                      current_row +
                      "-row"
                  ).append(
                    '<div class="knote-builder-area" data-builder-row="header_row_' +
                      current_row +
                      '"><a class="btn-column-edit" href="#" onClick="event.stopPropagation(); wp.customize.section(\'knote_builder_header_row_' +
                      current_row +
                      "_column" +
                      _column_id +
                      '\').focus();"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="2" height="15" fill="#FFF"/><rect x="7" width="2" height="15" fill="#FFF"/><rect y="3" width="3" height="16" transform="rotate(-90 0 3)" fill="#FFF"/><rect y="15" width="2" height="16" transform="rotate(-90 0 15)" fill="#FFF"/><rect x="14" width="2" height="15" fill="#FFF"/></svg></a>'
                  );

                  var column = $(
                    ".knote-builder-" + current_row + "-row"
                  ).find(".knote-builder-area:last-child");

                  if (_columns.length) {
                    var _iterator15 = _createForOfIteratorHelper(_columns),
                      _step15;

                    try {
                      for (
                        _iterator15.s();
                        !(_step15 = _iterator15.n()).done;

                      ) {
                        var _element3 = _step15.value;
                        _element3 = _this.getElementData(_element3);

                        column.append(
                          '<div class="builder-element-item">' +
                            '<a href="#" class="element-button" data-element-id="' +
                            _element3.id +
                            '" data-section-focus="knote_header_component_' +
                            _element3.id +
                            '">' +
                            '<span class="title-element">' +
                            _element3.label +
                            "</span>" +
                            '<i class="btn-element-edit dashicons dashicons-admin-generic"></i>' +
                            '<i class="btn-element-remove dashicons dashicons-no-alt"></i>' +
                            "</a>" +
                            "</div>"
                        );
                      }
                    } catch (err) {
                      _iterator15.e(err);
                    } finally {
                      _iterator15.f();
                    }
                  }

                  _column_id++;
                }
              } catch (err) {
                _iterator13.e(err);
              } finally {
                _iterator13.f();
              }

              if (field.indexOf("mobile_offcanvas") !== -1) {
                $(".knote-builder-area-offcanvas").html("");

                if (value.mobile_offcanvas.length) {
                  var elements = value.mobile_offcanvas[0];

                  var _iterator14 = _createForOfIteratorHelper(elements),
                    _step14;

                  try {
                    for (_iterator14.s(); !(_step14 = _iterator14.n()).done; ) {
                      var element = _step14.value;
                      element = _this.getElementData(element);
                      $(".knote-builder-area-offcanvas").append(
                        '<div class="builder-element-item">' +
                          '<a href="#" class="element-button" data-element-id="' +
                          element.id +
                          '" data-section-focus="knote_header_component_' +
                          element.id +
                          '">' +
                          '<span class="title-element">' +
                          element.label +
                          "</span>" +
                          '<i class="btn-element-edit dashicons dashicons-admin-generic"></i>' +
                          '<i class="btn-element-remove dashicons dashicons-no-alt"></i>' +
                          "</a>" +
                          "</div>"
                      );
                    }
                  } catch (err) {
                    _iterator14.e(err);
                  } finally {
                    _iterator14.f();
                  }
                }
              }
            }
          }
        } catch (err) {
          _iterator10.e(err);
        } finally {
          _iterator10.f();
        }

        if (!_this.currentBuilder) {
          _this.builderGridContentFlag = false;
          return false;
        }

        _this.elementsSortable();
        _this.builderGridContentFlag = false;
      }, this.updateGridDelay);
    },
    elementsButtonAdd: function elementsButtonAdd(id) {
      var hasOrder =
        arguments.length > 1 && arguments[1] !== undefined
          ? arguments[1]
          : false;

      var _this = this;

      var current_value = _this.jsonDecode(_this.currentRowInput.val()),
        value_wrapper = _this.currentDevice;

      if (
        _this.currentDevice === "mobile" &&
        _this.currentRow.hasClass("knote-builder-area-offcanvas")
      ) {
        value_wrapper = "mobile_offcanvas";
      }

      // Change the value.
      if (!hasOrder) {
        current_value[value_wrapper][_this.currentColumnPos].push(id);
      } else {
        current_value[value_wrapper][_this.currentColumnPos] =
          _this.componentsOrder;
      }

      // Do not add specific components on specific areas.
      // E.g: Don't add 'Mobile Offcanvas Menu' on areas that are not the 'offcanvas wrapper'
      if (
        _this.currentComponent === "offcanvas_menu" &&
        !_this.currentRow.hasClass("knote-builder-area-offcanvas")
      ) {
        return false;
      }

      if (
        _this.currentComponent === "hamburger" &&
        _this.currentRow.hasClass("knote-builder-area-offcanvas")
      ) {
        return false;
      }

      // Update the value in the customizer field.
      _this.currentRowInput.val(JSON.stringify(current_value));

      // Trigger change in the customizer field (desktop).
      _this.currentRowInput.trigger("change");

      // Trigger change in the customizer field (mobile).
      if (_this.currentBuilderType === "header") {
        _this.currentRowInput
          .closest(".customize-control")
          .next()
          .find("input")
          .val(Math.random())
          .trigger("change");
      }

      _this.elementsPopupContent();
      _this.builderGridContent();
    },
    elementsButtonRemove: function elementsButtonRemove(id) {
      var triggerChange =
        arguments.length > 1 && arguments[1] !== undefined
          ? arguments[1]
          : true;

      var _this = this;
      var current_value = _this.jsonDecode(_this.currentRowInput.val()),
        value_wrapper = _this.currentDevice;

      if (
        _this.currentDevice === "mobile" &&
        _this.currentRow.hasClass("knote-builder-area-offcanvas")
      ) {
        value_wrapper = "mobile_offcanvas";
      }

      // Change the value.
      current_value[value_wrapper][_this.currentColumnPos] = current_value[
        value_wrapper
      ][_this.currentColumnPos].filter(function (item) {
        return item !== id;
      });

      // Update the value in the customizer field.
      _this.currentRowInput.val(JSON.stringify(current_value));

      // Trigger change in the customizer field.
      if (triggerChange) {
        // Desktop.
        _this.currentRowInput.trigger("change");

        // Mobile.
        _this.currentRowInput
          .closest(".customize-control")
          .next()
          .find("input")
          .val(Math.random())
          .trigger("change");
      }

      _this.elementsPopupContent();
      _this.builderGridContent();
    },
    elementsSortable: function elementsSortable() {
      var _this = this;

      $(".knote-builder-area").each(function () {
        $(this).sortable({
          placeholder: "builder-element-item builder-state-highlight",
          connectWith: ".knote-builder-area",
          scroll: false,
          cancel: ".btn-column-edit",
          change: function change(e, ui) {
            _this.currentComponent = $(ui.item[0])
              .find(".element-button")
              .data("element-id");
            _this.currentRow = !$(ui.placeholder[0]).closest(
              ".block-builder__row"
            ).length
              ? $(ui.placeholder[0]).closest(".knote-builder-area-offcanvas")
              : $(ui.placeholder[0]).closest(".block-builder__row");
            _this.currentRowInput = $(
              "#_customize-input-knote_builder_" +
                ui.placeholder
                  .closest(".knote-builder-area")
                  .data("builder-row")
            );

            var order = [];
            ui.placeholder
              .closest(".knote-builder-area")
              .find(".ui-sortable-placeholder")
              .attr("data-element-id", _this.currentComponent);
            ui.placeholder
              .closest(".knote-builder-area")
              .find(".builder-element-item")
              .each(function () {
                var cid =
                  typeof $(this).find(".element-button").data("element-id") !==
                  "undefined"
                    ? $(this).find(".element-button").data("element-id")
                    : $(this).data("element-id");
                if (!$(this).hasClass("ui-sortable-helper")) {
                  order.push(cid);
                }
              });

            // Save components order (from respective row)
            _this.componentsOrder = order;
          },
          update: function update(e, ui) {
            // When we use "connectWith" param this condition is needed
            // to prevent the code being running twice because the 'update' event runs twice
            if (this === ui.item.parent()[0]) {
              var component_id = ui.item
                  .find("> .element-button")
                  .data("element-id"),
                row = ui.item
                  .closest(".knote-builder-area")
                  .data("builder-row"),
                column = ui.item.closest(".knote-builder-area").index() - 1,
                prevRow =
                  ui.sender !== null ? ui.sender.data("builder-row") : null,
                prevColumn = ui.sender !== null ? ui.sender.index() - 1 : null;

              if (ui.sender === null) {
                // Add component based on global order "_this.componentsOrder"
                _this.elementsButtonAdd("", true);

                return false;
              }

              if (!ui.sender.hasClass("builder-available-components")) {
                _this.currentRowInput = $(
                  "#_customize-input-knote_builder_" + prevRow
                );
              }

              _this.currentColumnPos = prevColumn;

              _this.elementsButtonRemove(component_id, true);

              if (!ui.sender.hasClass("builder-available-components")) {
                _this.currentRowInput = $(
                  "#_customize-input-knote_builder_" + row
                );
              }

              _this.currentColumnPos = column;
              _this.elementsButtonAdd(component_id, true);
            }
          },
        });
        $(this).disableSelection();
      });
    },
    elementsButton: function elementsButton() {
      var _this = this;

      $(document).on("click", ".builder-element-item > a", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data("element-id"),
          focusSection = $(this).data("section-focus");

        if ($(this).closest("#knote-builder-elements").length) {
          _this.elementsButtonAdd(id);
          _this.currentBuilder
            .find("#knote-builder-elements")
            .removeClass("active");
        } else {
          if (e.target.classList.contains("btn-element-remove")) {
            _this.elementsButtonRemove(id);
            return false;
          }
        }

        setTimeout(function () {
          wp.customize.section(focusSection).focus();
        }, this.updateGridDelay);
      });
    },
    builderCustomColumns: function builderCustomColumns() {
      var _this = this,
        options = [
          "knote_builder_header_row_above_columns",
          "knote_builder_header_row_main_columns",
          "knote_builder_header_row_below_columns",
          "knote_builder_footer_row_above_columns",
          "knote_builder_footer_row_main_columns",
          "knote_builder_footer_row_below_columns",
        ];

      options.forEach(function (optionID) {
        if (typeof wp.customize.control(optionID) !== "undefined") {
          var devices =
            optionID.indexOf("header") !== -1
              ? ["desktop", "tablet"]
              : ["desktop"];

          var _loop4 = function _loop4() {
            var device = _devices[_i5];
            var deviceSelector = "_" + device;

            wp.customize(optionID + deviceSelector, function (option) {
              option.bind(function (to) {
                var rows = ["above", "main", "below"],
                  rowSelector = "",
                  $rowInput = "";

                for (var _i6 = 0, _rows3 = rows; _i6 < _rows3.length; _i6++) {
                  var row = _rows3[_i6];
                  var rowOptionID =
                      "knote_builder_" +
                      _this.currentBuilderType +
                      "_row_" +
                      row,
                    rowInputSelector =
                      "#_customize-input-knote_builder_" +
                      _this.currentBuilderType +
                      "_row_" +
                      row;

                  if (optionID.indexOf(rowOptionID) !== -1) {
                    rowSelector = "knote-builder-" + row + "-row";
                    $rowInput = $(rowInputSelector);
                    _this.currentRow = row;
                  }
                }

                if (rowSelector === "" || $rowInput === "") {
                  return false;
                }

                // Update builder row columns class.
                //_this.addBuilderRowColumnsClass(device, rowSelector, to);

                // Update row input value.
                var current_value = _this.jsonDecode($rowInput.val());

                // Add column.
                if (to < current_value[_this.currentDevice].length) {
                  while (current_value[_this.currentDevice].length > to) {
                    current_value[_this.currentDevice].pop();
                  }
                  // Remove column.
                } else if (to > current_value[_this.currentDevice].length) {
                  while (current_value[_this.currentDevice].length < to) {
                    current_value[_this.currentDevice].push([]);
                  }
                }

                // Update the value in the customizer field.
                $rowInput.val(JSON.stringify(current_value));

                // Update the respective row columns layout customizer field.
                _this.updateColumnsLayoutOption(device, to);

                // Update 'Available Columns' area.
                _this.updateAvailableColumnsArea(device, to);

                // Trigger change in the customizer field (desktop).
                $rowInput.trigger("change");

                // Trigger change in the customizer field (mobile).
                if (
                  _this.currentBuilderType === "header" &&
                  _this.currentDevice === "mobile"
                ) {
                  $rowInput
                    .closest(".customize-control")
                    .next()
                    .find("input")
                    .val(Math.random())
                    .trigger("change");
                }

                // Update grid.
                _this.builderGridContent();
              });
            });
          };

          for (var _i5 = 0, _devices = devices; _i5 < _devices.length; _i5++) {
            _loop4();
          }
        }
      });

      // Main purpose of the below code is update 'Columns Layout' options on the first load.
      var areas = ["header", "footer"],
        rows = ["above", "main", "below"];

      for (var _i7 = 0, _areas2 = areas; _i7 < _areas2.length; _i7++) {
        var area = _areas2[_i7];

        var _iterator17 = _createForOfIteratorHelper(rows),
          _step17;

        try {
          var _loop5 = function _loop5() {
            var row = _step17.value;
            var sectionID = "knote_section_" + area + "_row_" + row;

            if (typeof wp.customize.section(sectionID) !== "undefined") {
              wp.customize
                .section(sectionID)
                .expanded.bind(function (is_active) {
                  if (is_active) {
                    if (sectionID.indexOf("header") !== -1) {
                      _this.currentBuilderType = "header";
                    } else if (sectionID.indexOf("footer") !== -1) {
                      _this.currentBuilderType = "footer";
                    }

                    var devices =
                      _this.currentBuilderType === "header"
                        ? ["desktop", "tablet"]
                        : ["desktop"];

                    var _loop6 = function _loop6() {
                      var device = _devices2[_i8];
                      setTimeout(function () {
                        var rowSelector = "knote-builder-row-" + row,
                          columnsOptionID =
                            "knote_builder_" +
                            _this.currentBuilderType +
                            "_row_" +
                            row +
                            "_columns_" +
                            device;

                        _this.currentRow = row;
                        _this.currentRowInput = $(
                          "#_customize-input-knote_builder_" +
                            _this.currentBuilderType +
                            "_row_" +
                            row
                        );

                        // Update builder row columns class.
                        //_this.addBuilderRowColumnsClass(device, rowSelector, wp.customize(columnsOptionID).get());

                        // Update 'Columns Layout' options.
                        _this.updateColumnsLayoutOption(
                          device,
                          wp.customize(columnsOptionID).get()
                        );

                        // Update 'Available Columns' area.
                        _this.updateAvailableColumnsArea(
                          device,
                          wp.customize(columnsOptionID).get()
                        );
                      }, 50);
                    };

                    for (
                      var _i8 = 0, _devices2 = devices;
                      _i8 < _devices2.length;
                      _i8++
                    ) {
                      _loop6();
                    }
                  }
                });
            }
          };

          for (_iterator17.s(); !(_step17 = _iterator17.n()).done; ) {
            _loop5();
          }
        } catch (err) {
          _iterator17.e(err);
        } finally {
          _iterator17.f();
        }
      }
    },
    updateColumnsLayoutOption: function updateColumnsLayoutOption(device, val) {
      var _this = this,
        setting_id =
          "knote_builder_" +
          _this.currentBuilderType +
          "_row_" +
          _this.currentRow +
          "_columns_layout_" +
          device;

      $('label[for*="' + setting_id + '"]').css("display", "none");
      $('label[for*="' + setting_id + "-column-" + val + '"]').css(
        "display",
        "block"
      );

      wp.customize(setting_id, function (setting) {
        var value = setting.get();
        if (value.indexOf(val) == -1) {
          $(
            'label[for="knote_builder_' +
              _this.currentBuilderType +
              "_row_" +
              _this.currentRow +
              "_columns_layout_" +
              device +
              "-column-" +
              val +
              '-equal"]'
          ).click();
        }
      });
    },
    builderColumnsLayout: function builderColumnsLayout() {
      var _this = this,
        options = [
          "knote_builder_header_row_above_columns_layout",
          "knote_builder_header_row_main_columns_layout",
          "knote_builder_header_row_below_columns_layout",
          "knote_builder_footer_row_above_columns_layout",
          "knote_builder_footer_row_main_columns_layout",
          "knote_builder_footer_row_below_columns_layout",
        ];

      options.forEach(function (optionID) {
        if (typeof wp.customize.control(optionID) !== "undefined") {
          var devices =
            optionID.indexOf("header") !== -1
              ? ["desktop", "tablet"]
              : ["desktop"];

          var _loop7 = function _loop7() {
            var device = _devices3[_i9];
            var deviceSelector = "_" + device;
            wp.customize(optionID + deviceSelector, function (option) {
              var v = option.get();
              var current_row = "above";
              if (optionID.indexOf("main") !== -1) {
                current_row = "main";
              } else if (optionID.indexOf("below") !== -1) {
                current_row = "below";
              }

              // Convert 'tablet' to 'mobile'
              if (device === "tablet") {
                device = "mobile";
              }

              var $builderRow = $(
                ".knote-builder-" +
                  _this.currentBuilderType +
                  " .knote-builder-" +
                  device +
                  " .knote-builder-row-" +
                  current_row
              );
              $builderRow.removeClass("columns-layout-equal");
              $builderRow.removeClass("columns-layout-fluid");
              $builderRow.removeClass("columns-layout-bigleft");
              $builderRow.removeClass("columns-layout-bigright");

              if (v.indexOf("equal") !== -1) {
                $builderRow.addClass("columns-layout-equal");
              }

              if (v.indexOf("bigleft") !== -1) {
                $builderRow.addClass("columns-layout-bigleft");
              }

              if (v.indexOf("bigright") !== -1) {
                $builderRow.addClass("columns-layout-bigright");
              }

              if (v.indexOf("fluid") !== -1) {
                $builderRow.addClass("columns-layout-fluid");
              }

              option.bind(function (to) {
                var current_row = "above";
                if (optionID.indexOf("main") !== -1) {
                  current_row = "main";
                } else if (optionID.indexOf("below") !== -1) {
                  current_row = "below";
                }
                // Convert 'tablet' to 'mobile' because html selectors are 'mobile' and not 'tablet'.
                if (device === "tablet") {
                  device = "mobile";
                }

                _this.currentRowInput = $(
                  "#_customize-input-knote_builder_" +
                    _this.currentBuilderType +
                    "_row_" +
                    current_row
                );
                var $builderRow = $(
                  ".knote-builder-" +
                    _this.currentBuilderType +
                    " .knote-builder-" +
                    device +
                    " .knote-builder-row-" +
                    current_row
                );
                $builderRow.removeClass("columns-layout-equal");
                $builderRow.removeClass("columns-layout-equal");
                $builderRow.removeClass("columns-layout-bigleft");
                $builderRow.removeClass("columns-layout-bigright");

                if (to.indexOf("equal") !== -1) {
                  $builderRow.addClass("columns-layout-equal");
                }

                if (to.indexOf("bigleft") !== -1) {
                  $builderRow.addClass("columns-layout-bigleft");
                }

                if (to.indexOf("bigright") !== -1) {
                  $builderRow.addClass("columns-layout-bigright");
                }

                if (to.indexOf("fluid") !== -1) {
                  $builderRow.addClass("columns-layout-fluid");
                }

                // Trigger change in the customizer field to run the selective refresh on the respective row.
                var inputValue = _this.currentRowInput.val();

                _this.currentRowInput.val("").trigger("change");
                _this.currentRowInput.val(inputValue).trigger("change");

                // Trigger change on mobile row field.
                if (
                  _this.currentBuilderType === "header" &&
                  _this.currentDevice === "mobile"
                ) {
                  _this.currentRowInput
                    .closest(".customize-control")
                    .next()
                    .find("input")
                    .val(Math.random())
                    .trigger("change");
                }
              });
            });
          };

          for (
            var _i9 = 0, _devices3 = devices;
            _i9 < _devices3.length;
            _i9++
          ) {
            _loop7();
          }
        }
      });
    },
    getElementData: function getElementData(element) {
      var _this = this;

      var elements = [].concat(
        _toConsumableArray(knote_builder.components.desktop),
        _toConsumableArray(knote_builder.components.mobile)
      );
      if (_this.currentBuilderType === "footer") {
        elements = knote_builder.components.footer;
      }

      var _iterator16 = _createForOfIteratorHelper(elements),
        _step16;

      try {
        for (_iterator16.s(); !(_step16 = _iterator16.n()).done; ) {
          var el = _step16.value;
          if (el.id === element) {
            return el;
          }
        }
      } catch (err) {
        _iterator16.e(err);
      } finally {
        _iterator16.f();
      }
      return "";
    },
    getElementsUnused: function getElementsUnused() {
      var _this = this;

      var elements = knote_builder.components.desktop,
        mb_elements = knote_builder.components.mobile;
      var fields = [
        "#_customize-input-knote_builder_header_row_above",
        "#_customize-input-knote_builder_header_row_main",
        "#_customize-input-knote_builder_header_row_below",
        "#_customize-input-knote_builder_mobile_offcanvas",
      ];

      if (_this.currentBuilderType === "footer") {
        elements = knote_builder.components.footer;
        fields = [
          "#_customize-input-knote_builder_footer_row_above",
          "#_customize-input-knote_builder_footer_row_main",
          "#_customize-input-knote_builder_footer_row_below",
        ];
      }

      for (var _i3 = 0, _fields = fields; _i3 < _fields.length; _i3++) {
        var field = _fields[_i3];

        // Desktop
        var _iterator2 = _createForOfIteratorHelper(elements),
          _step2;

        try {
          for (_iterator2.s(); !(_step2 = _iterator2.n()).done; ) {
            var el = _step2.value;
            var input_value = this.jsonDecode($(field).val());

            if (input_value.desktop.length) {
              var _iterator4 = _createForOfIteratorHelper(input_value.desktop),
                _step4;

              try {
                var _loop = function _loop() {
                  var column = _step4.value;
                  elements = elements.filter(function (item) {
                    return !column.includes(item.id);
                  });
                };

                for (_iterator4.s(); !(_step4 = _iterator4.n()).done; ) {
                  _loop();
                }
              } catch (err) {
                _iterator4.e(err);
              } finally {
                _iterator4.f();
              }
            }
          }
        } catch (err) {
          _iterator2.e(err);
        } finally {
          _iterator2.f();
        }

        // Mobile
        var _iterator3 = _createForOfIteratorHelper(mb_elements),
          _step3;

        try {
          for (_iterator3.s(); !(_step3 = _iterator3.n()).done; ) {
            var el = _step3.value;

            var _input_value = this.jsonDecode($(field).val());

            if (_input_value.mobile.length) {
              var _iterator5 = _createForOfIteratorHelper(_input_value.mobile),
                _step5;

              try {
                var _loop2 = function _loop2() {
                  var column = _step5.value;
                  mb_elements = mb_elements.filter(function (item) {
                    return !column.includes(item.id);
                  });
                };

                for (_iterator5.s(); !(_step5 = _iterator5.n()).done; ) {
                  _loop2();
                }
              } catch (err) {
                _iterator5.e(err);
              } finally {
                _iterator5.f();
              }
            }

            // Off-canvas
            if (
              field.indexOf("_mobile_offcanvas") !== -1 &&
              _input_value.mobile_offcanvas.length
            ) {
              var _iterator6 = _createForOfIteratorHelper(
                  _input_value.mobile_offcanvas
                ),
                _step6;

              try {
                var _loop3 = function _loop3() {
                  var column = _step6.value;
                  mb_elements = mb_elements.filter(function (item) {
                    return !column.includes(item.id);
                  });
                };

                for (_iterator6.s(); !(_step6 = _iterator6.n()).done; ) {
                  _loop3();
                }
              } catch (err) {
                _iterator6.e(err);
              } finally {
                _iterator6.f();
              }
            }
          }
        } catch (err) {
          _iterator3.e(err);
        } finally {
          _iterator3.f();
        }
      }

      return {
        desktop: elements,
        mobile: mb_elements,
      };
    },
    elementsPopup: function elementsPopup() {
      var _this = this;

      $(document).on(
        "click",
        ".knote-builder-area:not(.builder-available-components)",
        function (e) {
          var popup = _this.currentBuilder.find("#knote-builder-elements"),
            rect = $(this)[0].getBoundingClientRect(),
            row = $(this).data("builder-row");
          setTimeout(function () {
            popup.css("top", 0);
            popup.css("left", rect.left);
            popup.css("top", rect.top - (popup.height() + 66));

            if (_this.isElementInViewport(popup)) {
              popup.css("left", rect.left);
              popup.css("right", "auto");
            } else {
              popup.css("left", "auto");
              popup.css("right", 25);
            }

            if (
              e.target.classList.contains("btn-element-remove") ||
              e.target.classList.contains("element-button")
            ) {
              return false;
            }

            popup.addClass("active");
          }, this.updateGridDelay);

          _this.elementsPopupContent(row);
          _this.builderGridContent();
        }
      );

      $("#customize-preview iframe").on("mouseup", function (e) {
        _this.closeElementsPopup(e);
      });

      $(document).on("mouseup", function (e) {
        if (!_this.currentBuilder) {
          return false;
        }
        _this.closeElementsPopup(e);
      });
    },
    closeElementsPopup: function closeElementsPopup(e) {
      var _this = this,
        popup = _this.currentBuilder.find("#knote-builder-elements");

      if (e.target.closest("#knote-builder-elements") === null) {
        popup.removeClass("active");
      }
    },
    isElementInViewport: function isElementInViewport(el) {
      if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
      }

      var rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || $(window).height()) &&
        rect.right <= (window.innerWidth || $(window).width())
      );
    },
    elementsPopupContent: function elementsPopupContent() {
      var row =
        arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

      var _this = this,
        elements = this.getElementsUnused(),
        elementsWrapper = $(".knote-builder-elements-desktop"),
        mobileElementsWrapper = $(".knote-builder-elements-mobile");

      elementsWrapper.html("");
      mobileElementsWrapper.html("");

      if (elements.desktop.length) {
        var _iterator7 = _createForOfIteratorHelper(elements.desktop),
          _step7;

        try {
          for (_iterator7.s(); !(_step7 = _iterator7.n()).done; ) {
            var element = _step7.value;
            elementsWrapper.append(
              '<div class="builder-element-item builder-element-item-desktop">' +
                '<a href="#" class="element-button" data-element-id="' +
                element.id +
                '" data-section-focus="knote_' +
                _this.currentBuilderType +
                "_component_" +
                element.id +
                '">' +
                element.label +
                "</a>" +
                "</div>"
            );
          }
        } catch (err) {
          _iterator7.e(err);
        } finally {
          _iterator7.f();
        }
      } else {
        elementsWrapper.append(
          '<p class="builder-elements-message">' +
            knote_builder.i18n.elementsMessage +
            "</p>"
        );
      }

      // Remove off-canvas menu when the selected row
      // isnt't the off-canvas area
      if (row !== "mobile_offcanvas") {
        elements.mobile = elements.mobile.filter(function (item) {
          return item.id !== "offcanvas_menu";
        });
      } else {
        // Remove some components from mobile
        elements.mobile = elements.mobile.filter(function (item) {
          return item.id !== "secondary_menu" && item.id !== "hamburger";
        });
      }

      if (elements.mobile.length) {
        var _iterator8 = _createForOfIteratorHelper(elements.mobile),
          _step8;

        try {
          for (_iterator8.s(); !(_step8 = _iterator8.n()).done; ) {
            var _element = _step8.value;
            mobileElementsWrapper.append(
              '<div class="builder-element-item builder-element-item-desktop">' +
                '<a href="#" class="element-button" data-element-id="' +
                _element.id +
                '" data-section-focus="knote_' +
                _this.currentBuilderType +
                "_component_" +
                _element.id +
                '">' +
                _element.label +
                "</a>" +
                "</div>"
            );
          }
        } catch (err) {
          _iterator8.e(err);
        } finally {
          _iterator8.f();
        }
      } else {
        mobileElementsWrapper.append(
          '<p class="builder-elements-message">' +
            knote_builder.i18n.elementsMessage +
            "</p>"
        );
      }

      this.addUpsellComponents();
    },
    updateAvailableColumnsArea: function updateAvailableColumnsArea(
      device,
      colsNumber
    ) {
      var _this = this,
        rowSection = _this.currentRowInput.closest(".control-section"),
        columnsItems = rowSection.find(
          ".builder-available-columns-" + device + " .columns-item"
        );
      columnsItems.addClass("hide");

      for (var i = 1; i <= colsNumber; i++) {
        columnsItems.eq(i - 1).removeClass("hide");
      }
    },
    showHideBuilderTop: function showHideBuilderTop() {
      var self = this;

      $(".knote-builder-bottom-display").on("click", function (e) {
        e.preventDefault();

        $(this).toggleClass("active");
        $(".knote-builder-top").toggleClass("active");
        self.builderGridContent();
      });
    },
    showHideBuilder: function showHideBuilder() {
      var self = this;
      var sections = [
        //Header
        "knote_section_header_wrapper",
        "knote_section_header_row_main",
        "knote_section_header_row_above",
        "knote_section_header_row_below",
        "knote_header_component_button",
        "knote_header_component_button2",
        "knote_header_component_hamburger",
        "knote_header_component_html",
        "knote_header_component_html2",
        "knote_header_component_logo",
        "knote_header_component_shortcode",
        "knote_header_component_menu",
        "knote_header_component_search",
        "knote_header_component_social",
        "knote_header_component_scrolling_text",
        "knote_section_header_mobile_offcanvas",
        "knote_header_component_secondary_menu",
        "knote_header_component_contact_information",
        "knote_header_component_cart",

        //Footer
        "knote_section_footer_wrapper",
        "knote_section_footer_row_main",
        "knote_section_footer_row_above",
        "knote_section_footer_row_below",
        "knote_footer_component_credits",
        "knote_footer_component_widget1",
        "knote_footer_component_widget2",
        "knote_footer_component_widget3",
        "knote_footer_component_widget4",
        "knote_footer_component_widget5",
        "knote_footer_component_widget6",
        "knote_footer_component_widget_area",
        "knote_footer_component_shortcode",
        "knote_footer_component_button",
        "knote_footer_component_button2",
        "knote_footer_component_html",
        "knote_footer_component_html2",
        "knote_footer_component_footer_menu",
        "knote_footer_component_policy_menu",
        "knote_footer_component_payment_icons",
      ];

      var rows = ["above", "main", "below"];

      for (var _i4 = 0, _rows2 = rows; _i4 < _rows2.length; _i4++) {
        var row = _rows2[_i4];

        for (var i = 1; i <= 6; i++) {
          sections.push("knote_builder_header_row_" + row + "_column" + i);
          sections.push("knote_builder_footer_row_" + row + "_column" + i);
        }
      }

      sections.forEach(function (section) {
        if (typeof wp.customize.section(section) !== "undefined") {
          wp.customize.section(section).expanded.bind(function (is_active) {
            self.currentBuilder = self.getCurrentBuilderByComponent(section);
            self.currentBuilderType = self.currentBuilder.hasClass(
              "knote-builder-header"
            )
              ? "header"
              : "footer";

            if (is_active) {
              if (self.currentBuilderType == "header") {
                $("body").removeClass("js-footer-builder");
                $("body").addClass("js-active-builder js-header-builder");
                self.scrollToBuilderArea();
              } else if (self.currentBuilderType == "footer") {
                $("body").removeClass("js-header-builder");
                $("body").addClass("js-active-builder js-footer-builder");
                self.scrollToBuilderArea();
              }
            } else {
              $("body").removeClass(
                "js-header-builder js-footer-builder js-active-builder"
              );
            }

            setTimeout(function () {
              self.builderGridContent();
            }, 100);
          });
        }
      });
    },
    addUpsellComponents: function addUpsellComponents() {
      var _this = this;

      if (!knote_builder.upsell_components.enable) {
        return false;
      }

      var upsellComponentsHTML = "",
        components =
          _this.currentBuilderType === "header" ? knote_builder.upsell_components.header : knote_builder.upsell_components.footer;

      var _iterator9 = _createForOfIteratorHelper(components),
        _step9;

      try {
        for (_iterator9.s(); !(_step9 = _iterator9.n()).done; ) {
          var _element = _step9.value;
          upsellComponentsHTML += '<div class="builder-element-item builder-element-item-desktop">' +
              '<a href="#" class="element-button" data-element-id="' +
              _element.id +
              '" data-section-focus="knote_' +
              _this.currentBuilderType +
              "_component_" +
              _element.id +
              '">' +
              _element.label +
              "</a>" +
              "</div>";
        }
      } catch (err) {
        _iterator9.e(err);
      } finally {
        _iterator9.f();
      }

      var upsellHTML ='<div class="knote-upsell-components-wrapper"><h4>'
          .concat(
            knote_builder.upsell_components.title,
            '</h4><div class="knote-upsell-components">'
          )
          .concat(upsellComponentsHTML, "</div>\n                    <p>")
          .concat(
            knote_builder.upsell_components.total,
            '</p>\n                    <a href="'
          )
          .concat(
            knote_builder.upsell_components.link,
            '" target="_blank" class="button">'
          )
          .concat(
            knote_builder.upsell_components.button,
            "</a>\n                </div>\n            "
          );
      $("#knote-builder-elements .knote-builder-elements-wrapper .knote-upsell-components-wrapper").remove();
      $("#knote-builder-elements .knote-builder-elements-wrapper").append(upsellHTML);
    },
    getCurrentBuilderByComponent: function getCurrentBuilderByComponent(
      component
    ) {
      if (component.indexOf("_header_") !== -1) {
        return $(".knote-builder-header");
      } else if (component.indexOf("_footer_") !== -1) {
        return $(".knote-builder-footer");
      }

      return false;
    },

    scrollToBuilderArea: function scrollToBuilderArea() {
      var _this = this,
        iframeHTMLTag = document
          .querySelector("#customize-preview > iframe")
          .contentWindow.document.getElementsByTagName("html")[0],
        scrollTo = _this.currentBuilderType === "header" ? 0 : 10000;

      $(iframeHTMLTag).animate(
        {
          scrollTop: scrollTo,
        },
        "smooth"
      );
    },
  };

  $(document).ready(function () {
    builder.init();
  });
})(jQuery);
