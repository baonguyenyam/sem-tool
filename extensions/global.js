function createGrid() {
    $('body').append('<h1>sdfsdfsdf</h1>').css({
        'background': 'red'
    })
};
var LIFT_APP = {
    grid: function () { 
        chrome.tabs.executeScript(null, {code: `$('body').remove()`});
        // chrome.tabs.executeScript(null, {"file": "app/js/jquery.min.js"}, createGrid());
        // chrome.tabs.executeScript(null, {code: ``}, createGrid());
    }
}
