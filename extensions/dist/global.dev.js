"use strict";

var LIFT_APP = {
  measure: function measure() {
    chrome.tabs.executeScript(null, {
      code: "\n        if($('#lift_canvas').length>0) {\n            $('#lift_canvas').remove()\n        } else {\n            $('body').append('<div id=\"lift_canvas\"></div>');\n            initDraw(document.getElementById('lift_canvas'));\n        }\n        "
    });
  },
  ruler: function ruler() {
    chrome.tabs.executeScript(null, {
      code: "\n        if($('#lift_ruler').length>0) {\n            $('body').removeClass('lift_ruler_enable')\n            $('#lift_ruler').remove()\n        } else {\n            $('body').append('<div id=\"lift_ruler\"></div>');$(\"#lift_ruler\").ruler()\n        }\n        "
    });
  },
  grid: function grid() {
    chrome.tabs.executeScript(null, {
      code: "\n        if($('#lift_grid').length>0) {\n            $('#lift_grid').remove()\n        } else {\n            $('body').append('<div id=\"lift_grid\"><div class=\"row\"><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div><div class=\"col\"></div></div></div>')\n        }\n        "
    });
  },
  scale: function scale() {
    chrome.tabs.executeScript(null, {
      code: "\n        LIFT_Scale_WebSite();\n        "
    });
  }
};