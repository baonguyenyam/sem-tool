document.getElementById("inputId").addEventListener("click", function() {
    chrome.runtime.getBackgroundPage(function(backgroundPage) {
        backgroundPage.helloWorld();
    });
}, false);