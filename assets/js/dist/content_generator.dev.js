"use strict";

$("#contentgeneratorimport").on("click", function () {
  var err = "";

  if (!$("#csvsource").val() && !LIFT_APP.code) {
    err += "Please upload .csv file\n";
  }

  if (err) {
    alert(err);
  } else {
    var sourcev = null;
    var pushlistkw = '';
    var stringurl = '';

    if ($("#csvsource").val()) {
      sourcev = $("#csvsource").val();
    }

    if (LIFT_APP.code) {
      sourcev = LIFT_APP.code.getValue();
    }

    sourcev = sourcev.replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n");

    for (var index = 0; index < sourcev.length; index++) {
      if ($('#add-title:checkbox:checked').length > 0) {
        stringurl += ' title="' + replaceLIFT(sourcev[index].split(",")[0]).trim() + '"';
      }

      if ($('#add-nofollow:checkbox:checked').length > 0) {
        stringurl += ' rel="nofollow"';
      }

      if ($('#add-tab:checkbox:checked').length > 0) {
        stringurl += ' target="_blank"';
      }

      if (index < sourcev.length - 1) {
        pushlistkw += '<a href="' + sourcev[index].split(",")[1] + '"' + stringurl + '>' + replaceLIFT(sourcev[index].split(",")[0]).trim() + '</a>, ';
      } else {
        pushlistkw += '<a href="' + sourcev[index].split(",")[1] + '"' + stringurl + '>' + replaceLIFT(sourcev[index].split(",")[0]).trim() + '</a>';
      }
    }

    if (pushlistkw.length > 0) {
      $('#boxresult .rv').hide();
      $('#totalurls').html(pushlistkw);
      $('#contentresult').val(pushlistkw);
      $('#boxresult .rs').removeClass('d-none');
    }
  }
});
$("#contentgenerator").on("click", function () {
  var err = "";
  var contentkeyword = $("#contentkeyword").val().replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n");
  var contenturls = $("#contenturls").val().replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n");

  if (!$("#contentkeyword").val()) {
    err += "Please enter keywords list\n";
  }

  if (!$("#contenturls").val()) {
    err += "Please enter URLs list\n";
  }

  if (contentkeyword.length != contenturls.length) {
    err += "Something wrong!\n";
  }

  if (err) {
    alert(err);
  } else {
    var pushlistkw = '';
    var stringurl = '';

    for (var index = 0; index < contentkeyword.length; index++) {
      if ($('#add-title:checkbox:checked').length > 0) {
        stringurl += ' title="' + replaceLIFT(contentkeyword[index]).trim() + '"';
      }

      if ($('#add-nofollow:checkbox:checked').length > 0) {
        stringurl += ' rel="nofollow"';
      }

      if ($('#add-tab:checkbox:checked').length > 0) {
        stringurl += ' target="_blank"';
      }

      if (index < contentkeyword.length - 1) {
        pushlistkw += '<a href="' + contenturls[index] + '"' + stringurl + '>' + replaceLIFT(contentkeyword[index]).trim() + '</a>, ';
      } else {
        pushlistkw += '<a href="' + contenturls[index] + '"' + stringurl + '>' + replaceLIFT(contentkeyword[index]).trim() + '</a>';
      }
    }

    if (pushlistkw.length > 0) {
      $('#boxresult .rv').hide();
      $('#totalurls').html(pushlistkw);
      $('#contentresult').val(pushlistkw);
      $('#boxresult .rs').removeClass('d-none');
    }
  }
});