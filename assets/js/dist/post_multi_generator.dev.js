"use strict";

$("#create-btnmulti").on("click", function () {
  if (!LIFT_APP.__a_kw.val() || !LIFT_APP.__b_kw.val()) {
    alert("Please enter keywords");
  } else if (!$("#source").val()) {
    alert("Please upload file");
  } else {
    LIFT_APP.KW = [];
    LIFT_APP.genmulti();
  }
});