var LIFT_APP = {
    __build_Grid: function () { 
        chrome.tabs.executeScript(null, {code: `$('body').remove()`});
    }
}