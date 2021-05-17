// $('#createGrid').on('click', function () {
//     chrome.runtime.sendMessage({ msg: "__build_Grid" });
//     // chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
//     //     chrome.tabs.sendMessage(tabs[0].id, {type:"__build_Grid"}, function(response){
//     //         // alert(response)
//     //         // $("#text").text(response);
//     //     });
//     // });

//     // chrome.windows.getLastFocused(
//     //     {populate: false}, 
//     //     function(currentWindow) {
//     //         chrome.windows.update(currentWindow.id, { width: 500 });
//     //     }
//     // );
//     // chrome.runtime.sendMessage({ message: "hi" }, (response) => {
//     //     console.log(response.message);
//     // });
//     // window.close();
// })
// $('#createRuler').on('click', function () {
//     chrome.runtime.sendMessage({ msg: "__build_Ruler" });
//     window.close();
// })

document.getElementById("createGrid").onclick = function() {
    chrome.runtime.sendMessage({ msg: "__build_Grid" });
    // chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
    //     chrome.tabs.sendMessage(tabs[0].id, {greeting: "hello"}, function(response) {
    //         alert(response.farewell);
    //     });
    // });
}