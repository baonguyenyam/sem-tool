chrome.browserAction.onClicked.addListener(function (request) {
})
chrome.extension.onConnect.addListener(function (request) {
});
chrome.runtime.onMessage.addListener(function (request) {
    if (request.msg == "__build_Grid") {
        LIFT_APP.grid()
    }
});