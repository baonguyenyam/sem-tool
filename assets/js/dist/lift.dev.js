"use strict";

var LIFT_APP = {
  version: 'v3.6.1',
  KW: [],
  code: null,
  init: function init() {
    $('#version').text(this.version);
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  },
  __a_kw: $("#a_kw"),
  __b_kw: $("#b_kw"),
  __c_kw: $("#c_kw"),
  __d_kw: $("#d_kw"),
  __e_kw: $("#e_kw"),
  akw_get: function akw_get() {
    var k = this.__a_kw.val().trim().split(",");

    return k;
  },
  bkw_get: function bkw_get() {
    var k = this.__b_kw.val().trim().split(",");

    return k;
  },
  ckw_get: function ckw_get() {
    var k = this.__c_kw.val().trim().split(",");

    return k;
  },
  dkw_get: function dkw_get() {
    var k = this.__d_kw.val().trim().split(",");

    return k;
  },
  ekw_get: function ekw_get() {
    var k = this.__e_kw.val().trim().split(",");

    return k;
  },
  gen: function gen() {
    for (var index_a = 0; index_a < this.akw_get().length; index_a++) {
      var _a = lift_encode(this.akw_get()[index_a].trim());

      if (_a.length > 0) {
        // this.KW.push(_a)
        for (var index_b = 0; index_b < this.bkw_get().length; index_b++) {
          var _b = lift_encode(this.bkw_get()[index_b].trim());

          if (_b.length > 0) {
            this.KW.push(_a + " " + _b);

            for (var index_c = 0; index_c < this.ckw_get().length; index_c++) {
              var _c = lift_encode(this.ckw_get()[index_c].trim());

              if (_c.length > 0) {
                this.KW.push(_a + " " + _b + " " + _c);

                for (var index_d = 0; index_d < this.dkw_get().length; index_d++) {
                  var _d = lift_encode(this.dkw_get()[index_d].trim());

                  if (_d.length > 0) {
                    this.KW.push(_a + " " + _b + " " + _c + " " + _d);

                    for (var index_e = 0; index_e < this.ekw_get().length; index_e++) {
                      var _e = lift_encode(this.ekw_get()[index_e].trim());

                      if (_e.length > 0) {
                        this.KW.push(_a + " " + _b + " " + _c + " " + _d + " " + _e);
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }

    $("#results").text(lift_decode(LIFT_APP.KW.join("\n")));
    $("#boxresult .rs").removeClass("d-none");
    $("#boxresult .rv").hide();
    $("#number").text(LIFT_APP.KW.length);
  }
};
LIFT_APP.init();