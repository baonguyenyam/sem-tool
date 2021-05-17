$('#createGrid').on('click', function () {
    chrome.runtime.sendMessage({ msg: "__build_Grid" });
    chrome.windows.getLastFocused(
        {populate: false}, 
        function(currentWindow) {
            chrome.windows.update(currentWindow.id, { width: 500 });
        }
    );
    window.close();
})
$('#createRuler').on('click', function () {
    chrome.runtime.sendMessage({ msg: "__build_Ruler" });
    window.close();
})