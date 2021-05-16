$('#createGrid').on('click', function () {
    chrome.runtime.sendMessage({ msg: "__build_Grid" });
    window.close();
})