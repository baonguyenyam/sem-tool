$("#jsongeneratorimport").on("click", function () {
    $('#totalurls').html('')
    $('#jsonresult').val('')
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
        sourcev = sourcev.replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').replace(/"/, '').split("\n")

        for (let index = 0; index < sourcev.length; index++) {
            var newssrc = sourcev[index].replace(/,/, '').split(";");
            if(index < sourcev.length - 1) {
                pushlistkw += '{"category": "' + newssrc[0].trim() + '",'
                + '"grantee": "' + newssrc[1].trim() + '",'
                + '"location": "' + newssrc[2].trim() + '",'
                + '"purpose": "' + newssrc[3].trim() + '",'
                + '"amount": ' + newssrc[4].replace(/,/, '').trim() + ','
                + '"year": 2020},'
            } else {
                pushlistkw += '{"category": "' + newssrc[0].trim() + '",'
                + '"grantee": "' + newssrc[1].trim() + '",'
                + '"location": "' + newssrc[2].trim() + '",'
                + '"purpose": "' + newssrc[3].trim() + '",'
                + '"amount": ' + newssrc[4].replace(/,/, '').trim() + ','
                + '"year": 2020}'
            }
        }

        if(pushlistkw.length > 0) {
            $('#boxresult .rv').hide()
            $('#totalurls').html(pushlistkw)
            $('#jsonresult').val(pushlistkw)
            $('#boxresult .rs').removeClass('d-none')
        }
    }
});

var clipboard = new ClipboardJS('[data-clipboard-target]');
clipboard.on('success', function(e) {
    $('#copy_toast').toast("show")
    e.clearSelection();
});