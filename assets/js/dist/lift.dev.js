"use strict";

var LIFT_APP = {
  version: 'v3.0.1',
  KW: [],
  code: null,
  __a_kw: $("#a_kw"),
  __b_kw: $("#b_kw"),
  __c_kw: $("#c_kw"),
  __d_kw: $("#d_kw"),
  __e_kw: $("#e_kw"),
  akw_get: function akw_get() {
    k = this.__a_kw.val().trim().split(",");
    return k;
  },
  bkw_get: function bkw_get() {
    k = this.__b_kw.val().trim().split(",");
    return k;
  },
  ckw_get: function ckw_get() {
    k = this.__c_kw.val().trim().split(",");
    return k;
  },
  dkw_get: function dkw_get() {
    k = this.__d_kw.val().trim().split(",");
    return k;
  },
  ekw_get: function ekw_get() {
    k = this.__e_kw.val().trim().split(",");
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
$("#keyworkds").val(localStorage.getItem("myLIFT"));
$("#generator").on("click", function () {
  if (!LIFT_APP.__a_kw.val() || !LIFT_APP.__b_kw.val()) {
    alert("Please enter keywords");
  } else {
    LIFT_APP.KW = [];
    LIFT_APP.gen();
  }
});
$("#url").on("click", function () {
  var err = "";

  if (!$("#urlsource").val()) {
    err += "Please enter URL\n";
  }

  if (err) {
    alert(err);
  } else {
    $.ajax({
      type: 'GET',
      url: $("#urlsource").val().trim(),
      crossDomain: true,
      dataType: 'text/html',
      xhrFields: {
        withCredentials: false
      },
      headers: {
        "Access-Control-Allow-Origin: ": "*",
        "Access-Control-Allow-Methods: ": "GET",
        "Access-Control-Allow-Headers: ": "Authorization"
      },
      success: function success(data) {},
      error: function error(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown);
      }
    });
  }
});
$("#create-btn").on("click", function () {
  var err = "";

  if (!$("#source").val()) {
    err += "Please upload source file\n";
  }

  if (!$("#keyworkds").val()) {
    err += "Please enter keywords list\n";
  }

  if (err) {
    alert(err);
  } else {
    var nel = $("#keyworkds").val().split("\n");
    var nst = '';
    var arrayDone = [];
    var m = replaceLIFT(LIFT_APP.code.getValue());
    var dochange = m.replace(/<item>(.*?)<\/item>/gi, '___LIFTCHANGE___');
    var result = m.match(/<item>(.*?)<\/item>/gi).map(function (val) {
      return val;
    });

    for (var index = 0; index < result.length; index++) {
      nst += '___LIFTCHANGE___';
    }

    for (var gmc = 0; gmc < nel.length; gmc++) {
      var id = makeid(5);

      if (nel[gmc] && nel[gmc].length > 1) {
        arrayDone.push(result[0].replace(/___REPLACE___/gi, nel[gmc].trim()).replace(/<wp:post_id>(.*?)<\/wp:post_id>/gi, '<wp:post_id>' + id + '</wp:post_id>'));
      }
    }

    var t = dochange.replace(nst, arrayDone.join(""));
    $("#results").val(unReplaceLIFT(t));
    var text = $("#results").val();
    var filename = "LIFT_KW_LIST_" + new Date().getTime() + ".xml";
    download(filename, text);
  }
});
$("#dwn-btn").on("click", function () {
  var text = $("#results").val();
  var filename = "LIFT_KW_LIST_" + new Date().getTime() + ".txt";
  download(filename, text);
});
$("#save-btn").on("click", function () {
  localStorage.removeItem("myLIFT");
  localStorage.setItem("myLIFT", $("#results").val());
  localStorage.removeItem("myLIFT_KW");
  localStorage.setItem("myLIFT_KW", LIFT_APP.KW);
  $('#keyworkds_toast').toast("show");
});
$("#clear").on("click", function () {
  localStorage.removeItem("myLIFT_KW");
  localStorage.removeItem("myLIFT");
  $("#keyworkds").val('');
  $('#keyworkds_toast').toast("show");
});
$("#load").on("click", function () {
  LIFT_APP.__a_kw.val("Search Engine");

  LIFT_APP.__b_kw.val("Optimization, Marketing");

  LIFT_APP.__c_kw.val("Dallas, DFW");

  LIFT_APP.__d_kw.val("tactics, strategy, strategies, blogs, blog, bloggers, blogger");

  LIFT_APP.__e_kw.val("near me, here");
});
$("#checkHTML").on("click", function () {
  if (!$('#checkHTML_URL').val()) {
    alert("Please enter HTML Code");
    return false;
  }
});
$("#validator-btn").on("click", function () {
  var err = "";
  var err_HTML = "";
  var check_HTML = "";

  if (!$("#htmlcode").val()) {
    err += "Please enter HTML Code\n";
  }

  if (err) {
    alert(err);
  } else {
    var n = $("#htmlcode").val().trim();
    LIFT_APP.htmlResults_H1 = n.match(/<h1[^>]*>(.*?)<\/h1>/gi);
    LIFT_APP.htmlResults_H2 = n.match(/<h2[^>]*>(.*?)<\/h2>/gi);
    LIFT_APP.htmlResults_H3 = n.match(/<h3[^>]*>(.*?)<\/h3>/gi);
    LIFT_APP.htmlResults_H4 = n.match(/<h4[^>]*>(.*?)<\/h4>/gi);
    LIFT_APP.htmlResults_H5 = n.match(/<h5[^>]*>(.*?)<\/h5>/gi);
    LIFT_APP.htmlResults_H6 = n.match(/<h6[^>]*>(.*?)<\/h6>/gi);
    LIFT_APP.htmlResults_og_title = n.match(/og:title/gi);

    if (LIFT_APP.htmlResults_H1) {
      LIFT_APP.htmlResults_H1.map(function (val) {
        return val;
      });

      if (LIFT_APP.htmlResults_H1.length > 1) {
        err_HTML += "<li>We have more than 1 tag H1</li>";
      }
    } else {
      err_HTML += "<li>We need improve H1 tag</li>";
      LIFT_APP.htmlResults_H1 = [];
    }

    LIFT_APP.htmlResults_H2 ? LIFT_APP.htmlResults_H2 : LIFT_APP.htmlResults_H2 = [];
    LIFT_APP.htmlResults_H3 ? LIFT_APP.htmlResults_H3 : LIFT_APP.htmlResults_H3 = [];
    LIFT_APP.htmlResults_H4 ? LIFT_APP.htmlResults_H4 : LIFT_APP.htmlResults_H4 = [];
    LIFT_APP.htmlResults_H5 ? LIFT_APP.htmlResults_H5 : LIFT_APP.htmlResults_H5 = [];
    LIFT_APP.htmlResults_H6 ? LIFT_APP.htmlResults_H6 : LIFT_APP.htmlResults_H6 = [];

    if (err_HTML) {
      $('#err_HTML').html('<ul class="mb-0">' + err_HTML + '</ul>').removeClass('d-none');
      $('#done_HTML').addClass('d-none');
    } else {
      $('#err_HTML').addClass('d-none');
      $('#done_HTML').removeClass('d-none');
    }

    $('#check_HTML').html('<div class="list-group">' + resultHTMLValidate('H1 Tag', LIFT_APP.htmlResults_H1.length) + resultHTMLValidate('H2 Tag', LIFT_APP.htmlResults_H1.length) + resultHTMLValidate('H3 Tag', LIFT_APP.htmlResults_H3.length) + resultHTMLValidate('H4 Tag', LIFT_APP.htmlResults_H1.length) + resultHTMLValidate('H5 Tag', LIFT_APP.htmlResults_H1.length) + resultHTMLValidate('H6 Tag', LIFT_APP.htmlResults_H1.length) + resultHTMLValidate('OG Title Tag', LIFT_APP.htmlResults_og_title ? 'Ready' : 'Undefined') + '</div>').removeClass('d-none');
  }
});
$('#version').text(LIFT_APP.version);
$('[data-preview-content]').each(function () {
  var selfm = $(this);
  $.ajax({
    url: "/previewURL?url=" + selfm.attr('data-preview-content'),
    cache: true,
    dataType: 'JSON',
    success: function success(data, textStatus, jqXHR) {
      selfm.html('<div class="mb-3 row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative" style="background: aliceblue;"> <div class="col p-4 d-flex flex-column position-static"> <div><strong class="d-inline-block mb-2 text-dark">' + extractRootDomain(selfm.attr('data-preview-content')) + '</strong><span class="ms-2"><a style="z-index: 1000; position: relative;" href="https://www.facebook.com/sharer.php?u=' + selfm.attr('data-preview-content') + '&t=' + data.title + '"><i class="fab fa-facebook-square"></i> Share</a></span></div> <h3 class="h4 text-primary mb-2">' + data.title + '</h3> <p class="card-text mb-auto mb-0">' + data.description + '</p>  <a href="' + selfm.attr('data-preview-content') + '" class="stretched-link" target="_blank">Open URL</a> </div> <div class="col-auto d-none d-md-block"> <div style="width:200px;min-height:100px;height:100%; background: ' + (data.cover.length > 10 ? '' : '#dfdfdf') + ' url(' + data.cover + ') center center no-repeat; background-size: cover"></div> </div> </div>');

      if (jqXHR.status == 200) {
        selfm.parents('.data-preview').find('.data-preview-url').remove();

        if ($('#htmlcode').val().length > 0) {
          $('#validator-btn').trigger('click');
        }
      }
    }
  });
});