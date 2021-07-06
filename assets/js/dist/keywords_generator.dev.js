"use strict";

$("#load").on("click", function () {
  LIFT_APP.__a_kw.val("Search Engine");

  LIFT_APP.__b_kw.val("Optimization, Marketing");

  LIFT_APP.__c_kw.val("Dallas, DFW");

  LIFT_APP.__d_kw.val("tactics, strategy, strategies, blogs, blog, bloggers, blogger");

  LIFT_APP.__e_kw.val("near me, here");
});
$("#generator").on("click", function () {
  if (!LIFT_APP.__a_kw.val() || !LIFT_APP.__b_kw.val()) {
    alert("Please enter keywords");
  } else {
    LIFT_APP.KW = [];
    LIFT_APP.gen();
  }
});
$("#dwn-btn").on("click", function () {
  var text = $("#results").val();
  var filename = "LIFT_KW_LIST_" + new Date().getTime() + ".txt";

  try {
    text;
  } catch (e) {} finally {
    download(filename, text);
  }
});
$("#save-btn").on("click", function () {
  localStorage.removeItem("myLIFT");
  localStorage.setItem("myLIFT", $("#results").val());
  localStorage.removeItem("myLIFT_KW");
  localStorage.setItem("myLIFT_KW", LIFT_APP.KW);
  $('#keywordds_toast').toast("show");
});