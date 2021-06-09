"use strict";

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