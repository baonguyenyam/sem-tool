"use strict";

youlicense;
$("#key-btn").on("click", function () {
  var text = $("#youlicense").val();
  var filename = "LIFT_LICENSE_" + new Date().getTime() + ".txt";

  try {
    text;
  } catch (e) {} finally {
    download(filename, text);
  }
});