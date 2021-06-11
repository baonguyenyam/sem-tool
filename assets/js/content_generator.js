$("#contentgeneratorimport").on("click", function () {
    $('#totalurls').html('')
    $('#contentresult').val('')
    var err = "";
    if (!$("#csvsource").val() && !LIFT_APP.code) {
        err += "Please upload .csv file\n";
    }
    if (err) {
        alert(err);
    } else {
        var sourcev = null;
        var pushlistkw = '';
        if($("#csvsource").val()){
            sourcev = $("#csvsource").val();
        }
        if(LIFT_APP.code){
            sourcev = LIFT_APP.code.getValue();
        }
        sourcev = sourcev.replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n")

        var getkwv = $('#readCSVTable #fkw').val()
        var geturlv = $('#readCSVTable #furl').val()

        for (let index = 0; index < sourcev.length; index++) {
            var stringurl = '';
            if($('#add-title:checkbox:checked').length > 0) {
                stringurl += ' title="'+replaceLIFT(sourcev[index].split(",")[getkwv]).trim()+'"';
            }
            if($('#add-nofollow:checkbox:checked').length > 0) {
                stringurl += ' rel="nofollow"';
            }
            if($('#add-tab:checkbox:checked').length > 0) {
                stringurl += ' target="_blank"';
            }
            if(index < sourcev.length - 1) {
                pushlistkw += '<a href="'+sourcev[index].split(",")[geturlv]+'"'+stringurl+'>'+replaceLIFT(sourcev[index].split(",")[getkwv]).trim()+'</a>, '
            } else {
                pushlistkw += '<a href="'+sourcev[index].split(",")[geturlv]+'"'+stringurl+'>'+replaceLIFT(sourcev[index].split(",")[getkwv]).trim()+'</a>'
            }
        }
        if(pushlistkw.length > 0) {
            $('#boxresult .rv').hide()
            $('#totalurls').html(pushlistkw)
            $('#contentresult').val(pushlistkw)
            $('#boxresult .rs').removeClass('d-none')
        }
    }
});

$("#contentgenerator").on("click", function () {
    $('#totalurls').html('')
    $('#contentresult').val('')
    var err = "";
    var contentkeyword = $("#contentkeyword").val().replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n");
    var contenturls = $("#contenturls").val().replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n");
    if (!$("#contentkeyword").val()) {
        err += "Please enter keywords list\n";
    }
    if (!$("#contenturls").val()) {
        err += "Please enter URLs list\n";
    }
    if(contentkeyword.length != contenturls.length){
        err += "Something wrong!\n";
    }
    if (err) {
        alert(err);
    } else {
        var pushlistkw = '';
        for (let index = 0; index < contentkeyword.length; index++) {
            var stringurl = '';
            if($('#add-title:checkbox:checked').length > 0) {
                stringurl += ' title="'+replaceLIFT(contentkeyword[index]).trim()+'"';
            }
            if($('#add-nofollow:checkbox:checked').length > 0) {
                stringurl += ' rel="nofollow"';
            }
            if($('#add-tab:checkbox:checked').length > 0) {
                stringurl += ' target="_blank"';
            }
            if(index < contentkeyword.length - 1) {
                pushlistkw += '<a href="'+contenturls[index]+'"'+stringurl+'>'+replaceLIFT(contentkeyword[index]).trim()+'</a>, '
            } else {
                pushlistkw += '<a href="'+contenturls[index]+'"'+stringurl+'>'+replaceLIFT(contentkeyword[index]).trim()+'</a>'
            }
        }
        if(pushlistkw.length > 0) {
            $('#boxresult .rv').hide()
            $('#totalurls').html(pushlistkw)
            $('#contentresult').val(pushlistkw)
            $('#boxresult .rs').removeClass('d-none')
        }
    }
});

var clipboard = new ClipboardJS('[data-clipboard-target]');
clipboard.on('success', function(e) {
    $('#copy_toast').toast("show")
    e.clearSelection();
});