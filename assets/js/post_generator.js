
$("#clear").on("click", function () {
    localStorage.removeItem("myLIFT_KW");
    localStorage.removeItem("myLIFT");
    $("#keyworkds").val('');
    $('#keyworkds_toast').toast("show")
});

$("#create-btn").on("click", function () {
    var err = "";
    if (!$("#source").val()) {
        err += "Please upload source file\n";
    }
    if (!$("#keyworkds").val()) {
        err += "Please enter keywords list\n";
    }
    if (err) {
        alert(err);
    } else {
        var nel = $("#keyworkds").val().split("\n");
        var nst = ''
        var arrayDone = []
        var m = replaceLIFT(LIFT_APP.code.getValue());
        var dochange = m.replace(/<item>(.*?)<\/item>/gi, '___LIFTCHANGE___')
        var result = m.match(/<item>(.*?)<\/item>/gi).map(function (val) { return val; });
        for (let index = 0; index < result.length; index++) {
            nst += '___LIFTCHANGE___'
        }
        for (let gmc = 0; gmc < nel.length; gmc++) {
            var id = makeid(5);
            if(nel[gmc] && nel[gmc].length>1) {
                arrayDone.push(result[0].replace(/(___REPLACE___|___replace___)/gi, nel[gmc].trim()).replace(/<wp:post_id>(.*?)<\/wp:post_id>/gi, '<wp:post_id>'+id+'</wp:post_id>'))
            }
        }
        var t = dochange.replace(nst, arrayDone.join(""))
        $("#results").val(unReplaceLIFT(t))
        var text = $("#results").val();
        var filename = "LIFT_KW_LIST_" + new Date().getTime() + ".xml";
        try {
            text
        }
        catch (e) {
        }
        finally {
            download(filename, text);
        }
    }
});
$("#keyworkds").val(localStorage.getItem("myLIFT"));
localStorage.getItem("keyworkds_a") ? $("#a_kw").val(localStorage.getItem("keyworkds_a")) : null;
localStorage.getItem("keyworkds_b") ? $("#b_kw").val(localStorage.getItem("keyworkds_b")) : null;
localStorage.getItem("keyworkds_c") ? $("#c_kw").val(localStorage.getItem("keyworkds_c")) : null;
localStorage.getItem("keyworkds_d") ? $("#d_kw").val(localStorage.getItem("keyworkds_d")) : null;
localStorage.getItem("keyworkds_e") ? $("#e_kw").val(localStorage.getItem("keyworkds_e")) : null;
localStorage.getItem("keyworkds_f") ? $("#instate").val(localStorage.getItem("keyworkds_f")) : null;
localStorage.getItem("keyworkds_g") ? $("#inlocation").val(localStorage.getItem("keyworkds_g")) : null;

$(".btn-save").on("click", function () {
    if(localStorage.getItem($(this).attr('id'))) {
        localStorage.removeItem($(this).attr('id'));
        $(this).parents('.relative').find('textarea').val('')
        $(this).removeClass('ready').text('Save')
    } else {
        if($(this).parents('.relative').find('textarea').val().length>0) {
            localStorage.removeItem($(this).attr('id'));
            localStorage.setItem($(this).attr('id'), $(this).parents('.relative').find('textarea').val());
            $(this).addClass('ready').text('Clear')
        } else {
            alert('Please enter keywords')
        }
    }
    $('#keyworkds_toast').toast("show")
});

$('.btn-save').each(function() {
    if(localStorage.getItem($(this).attr('id'))) {
        $(this).addClass('ready').text('Clear')
    }
})
