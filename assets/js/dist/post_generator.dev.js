"use strict";

$("#clear").on("click", function () {
  localStorage.removeItem("myLIFT_KW");
  localStorage.removeItem("myLIFT");
  $("#keywordds").val('');
  $('#keywordds_toast').toast("show");
});
$("#create-btn").on("click", function () {
  var err = "";

  if (!$("#source").val()) {
    err += "Please upload source file\n";
  }

  if (!$("#keywordds").val()) {
    err += "Please enter keywords list\n";
  }

  if (err) {
    alert(err);
  } else {
    var nel = $("#keywordds").val().split("\n");
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
        arrayDone.push(result[0].replace(/(___REPLACE___|___replace___)/gi, nel[gmc].trim()).replace(/<wp:post_id>(.*?)<\/wp:post_id>/gi, '<wp:post_id>' + id + '</wp:post_id>'));
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
$("#keywordds").val(localStorage.getItem("myLIFT"));
localStorage.getItem("keywordds_a") ? $("#a_kw").val(localStorage.getItem("keywordds_a")) : null;
localStorage.getItem("keywordds_b") ? $("#b_kw").val(localStorage.getItem("keywordds_b")) : null;
localStorage.getItem("keywordds_c") ? $("#c_kw").val(localStorage.getItem("keywordds_c")) : null;
localStorage.getItem("keywordds_d") ? $("#d_kw").val(localStorage.getItem("keywordds_d")) : null;
localStorage.getItem("keywordds_e") ? $("#e_kw").val(localStorage.getItem("keywordds_e")) : null;
localStorage.getItem("keywordds_f") ? $("#instate").val(localStorage.getItem("keywordds_f")) : null;
localStorage.getItem("keywordds_g") ? $("#inlocation").val(localStorage.getItem("keywordds_g")) : null;
$(".btn-save").on("click", function () {
  if (localStorage.getItem($(this).attr('id'))) {
    localStorage.removeItem($(this).attr('id'));
    $(this).parents('.relative').find('textarea').val('');
    $(this).removeClass('ready').text('Save');
  } else {
    if ($(this).parents('.relative').find('textarea').val().length > 0) {
      localStorage.removeItem($(this).attr('id'));
      localStorage.setItem($(this).attr('id'), $(this).parents('.relative').find('textarea').val());
      $(this).addClass('ready').text('Clear');
    } else {
      alert('Please enter keywords');
    }
  }

  $('#keywordds_toast').toast("show");
});
$('.btn-save').each(function () {
  if (localStorage.getItem($(this).attr('id'))) {
    $(this).addClass('ready').text('Clear');
  }
});