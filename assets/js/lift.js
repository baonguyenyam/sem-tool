var LIFT_APP = {
    KW: [],
    rePlaceMulti: '',
    rePlaceMulti_Done: [],
    code: null,
    init: function () {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    },
    __a_kw: $("#a_kw"),
    __b_kw: $("#b_kw"),
    __c_kw: $("#c_kw"),
    __d_kw: $("#d_kw"),
    __e_kw: $("#e_kw"),
    akw_get: function () {
        var k = this.__a_kw.val().trim().split(",");
        return k;
    },
    bkw_get: function () {
        var k = this.__b_kw.val().trim().split(",");
        return k;
    },
    ckw_get: function () {
        var k = this.__c_kw.val().trim().split(",");
        return k;
    },
    dkw_get: function () {
        var k = this.__d_kw.val().trim().split(",");
        return k;
    },
    ekw_get: function () {
        var k = this.__e_kw.val().trim().split(",");
        return k;
    },
    gen: function () {
        for (let index_a = 0; index_a < this.akw_get().length; index_a++) {
            let _a = lift_encode(this.akw_get()[index_a].trim());
            if (_a.length > 0) {
                // this.KW.push(_a)
                for (let index_b = 0; index_b < this.bkw_get().length; index_b++) {
                    let _b = lift_encode(this.bkw_get()[index_b].trim());
                    if (_b.length > 0) {
                        this.KW.push(_a + " " + _b);
                        for (let index_c = 0; index_c < this.ckw_get().length; index_c++) {
                            let _c = lift_encode(this.ckw_get()[index_c].trim());
                            if (_c.length > 0) {
                                this.KW.push(_a + " " + _b + " " + _c);
                                for (
                                    let index_d = 0;
                                    index_d < this.dkw_get().length;
                                    index_d++
                                ) {
                                    let _d = lift_encode(this.dkw_get()[index_d].trim());
                                    if (_d.length > 0) {
                                        this.KW.push(_a + " " + _b + " " + _c + " " + _d);
                                        for (
                                            let index_e = 0;
                                            index_e < this.ekw_get().length;
                                            index_e++
                                        ) {
                                            let _e = lift_encode(this.ekw_get()[index_e].trim());
                                            if (_e.length > 0) {
                                                this.KW.push(
                                                    _a + " " + _b + " " + _c + " " + _d + " " + _e
                                                );
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $("#results").text(lift_decode(LIFT_APP.KW.join("\n")));
        $("#boxresult .rs").removeClass("d-none");
        $("#boxresult .rv").hide();
        $("#number").text(LIFT_APP.KW.length);
    },
    genmulti: function () {
        this.rePlaceMulti = replaceLIFT(LIFT_APP.code.getValue());
        var dochange = this.rePlaceMulti.replace(/<item>(.*?)<\/item>/gi, '___LIFTCHANGE___')
        var nst = 0;
        for (let index_a = 0; index_a < this.akw_get().length; index_a++) {
            let _a = lift_encode(this.akw_get()[index_a].trim());
            if (_a.length > 0) {
                // nst++;
                // this.KW.push(_a)
                // this.replaceMultiKW(this.rePlaceMulti,nst,_a)
                for (let index_b = 0; index_b < this.bkw_get().length; index_b++) {
                    let _b = lift_encode(this.bkw_get()[index_b].trim());
                    if (_b.length > 0) {
                        nst++;
                        this.KW.push(_a + " " + _b);
                        this.replaceMultiKW(this.rePlaceMulti,nst,_a,_b)
                        for (let index_c = 0; index_c < this.ckw_get().length; index_c++) {
                            let _c = lift_encode(this.ckw_get()[index_c].trim());
                            if (_c.length > 0) {
                                nst++;
                                this.KW.push(_a + " " + _b + " " + _c);
                                this.replaceMultiKW(this.rePlaceMulti,nst,_a,_b,_c)
                                for (let index_d = 0;index_d < this.dkw_get().length;index_d++) {
                                    let _d = lift_encode(this.dkw_get()[index_d].trim());
                                    if (_d.length > 0) {
                                        nst++;
                                        this.KW.push(_a + " " + _b + " " + _c + " " + _d);
                                        this.replaceMultiKW(this.rePlaceMulti,nst,_a,_b,_c,_d)
                                        for (let index_e = 0;index_e < this.ekw_get().length;index_e++) {
                                            let _e = lift_encode(this.ekw_get()[index_e].trim());
                                            if (_e.length > 0) {
                                                nst++;
                                                this.KW.push(_a + " " + _b + " " + _c + " " + _d + " " + _e);
                                                this.replaceMultiKW(this.rePlaceMulti,nst,_a,_b,_c,_d,_e)
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        var t = dochange.replace('___LIFTCHANGE___', this.rePlaceMulti_Done.join(""))
        $("#resultsmulti").val(unReplaceLIFT(t))
        $("#results").val(lift_decode(LIFT_APP.KW.join("\n")));
        var text = $("#resultsmulti").val();
        var filename = "LIFT_POST_GEN_" + new Date().getTime() + ".xml";
        try {
            text
        }
        catch (e) {
        }
        finally {
            download(filename, text);
        }
    },
    replaceMultiKW: function (rePlaceMulti,nst,_a,_b,_c,_d,_e) {
        var gena = _a ? _a+ ' ' : '';
        var genb = _b ? _b+ ' ' : '';
        var genc = _c ? _c+ ' ' : '';
        var gend = _d ? _d+ ' ' : '';
        var gene = _e ? _e+ ' ' : '';
        var genfull = (_a || _b || _c || _d || _e) ? (gena+genb+genc+gend+gene) : '';
        var id = makeid(5);
        var result = rePlaceMulti.match(/<item>(.*?)<\/item>/gi).map(function (val) { return val; });
        var pls = result[0].replace(/(___REPLACE___|___replace___)/gi, (genfull).trim())
        .replace(/(___REPLACE_A___|___replace_a___)/gi, (gena).trim())
        .replace(/(___REPLACE_B___|___replace_b___)/gi, (genb).trim())
        .replace(/(___REPLACE_C___|___replace_c___)/gi, (genc).trim())
        .replace(/(___REPLACE_D___|___replace_d___)/gi, (gend).trim())
        .replace(/(___REPLACE_E___|___replace_e___)/gi, (gene).trim()).trim()
        this.rePlaceMulti_Done.push(pls.replace(/<wp:post_id>(.*?)<\/wp:post_id>/gi, '<wp:post_id>'+id+'</wp:post_id>'))
    }
};

LIFT_APP.init();
