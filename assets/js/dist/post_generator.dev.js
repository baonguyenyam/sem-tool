"use strict";

$("#clear").on("click", function () {
  localStorage.removeItem("myLIFT_KW");
  localStorage.removeItem("myLIFT");
  $("#keyworkds").val('');
  $('#keyworkds_toast').toast("show");
});
$("#clear_a").on("click", function () {
  localStorage.removeItem("myLIFT_A");
  $("#keyworkds_a").val('');
  $('#keyworkds_toast').toast("show");
});
$("#clear_b").on("click", function () {
  localStorage.removeItem("myLIFT_B");
  $("#keyworkds_b").val('');
  $('#keyworkds_toast').toast("show");
});
$("#clear_c").on("click", function () {
  localStorage.removeItem("myLIFT_C");
  $("#keyworkds_c").val('');
  $('#keyworkds_toast').toast("show");
});
$("#clear_d").on("click", function () {
  localStorage.removeItem("myLIFT_D");
  $("#keyworkds_d").val('');
  $('#keyworkds_toast').toast("show");
});
$("#clear_e").on("click", function () {
  localStorage.removeItem("myLIFT_E");
  $("#keyworkds_e").val('');
  $('#keyworkds_toast').toast("show");
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

    try {
      text;
    } catch (e) {} finally {
      download(filename, text);
    }
  }
});
$("#keyworkds").val(localStorage.getItem("myLIFT"));
$("#keyworkds_a").val(localStorage.getItem("myLIFT_A"));
$("#keyworkds_b").val(localStorage.getItem("myLIFT_B"));
$("#keyworkds_c").val(localStorage.getItem("myLIFT_C"));
$("#keyworkds_d").val(localStorage.getItem("myLIFT_D"));
$("#keyworkds_e").val(localStorage.getItem("myLIFT_E"));