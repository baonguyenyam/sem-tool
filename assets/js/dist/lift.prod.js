"use strict";var LIFT_APP={KW:[],rePlaceMulti:"",rePlaceMulti_Done:[],code:null,init:function(){$(function(){$('[data-toggle="tooltip"]').tooltip()})},__a_kw:$("#a_kw"),__b_kw:$("#b_kw"),__c_kw:$("#c_kw"),__d_kw:$("#d_kw"),__e_kw:$("#e_kw"),akw_get:function(){return this.__a_kw.val().trim().split(",")},bkw_get:function(){return this.__b_kw.val().trim().split(",")},ckw_get:function(){return this.__c_kw.val().trim().split(",")},dkw_get:function(){return this.__d_kw.val().trim().split(",")},ekw_get:function(){return this.__e_kw.val().trim().split(",")},gen:function(){for(var t=0;t<this.akw_get().length;t++){var e=lift_encode(this.akw_get()[t].trim());if(0<e.length)for(var _=0;_<this.bkw_get().length;_++){var i=lift_encode(this.bkw_get()[_].trim());if(0<i.length){this.KW.push(e+" "+i);for(var l=0;l<this.ckw_get().length;l++){var r=lift_encode(this.ckw_get()[l].trim());if(0<r.length){this.KW.push(e+" "+i+" "+r);for(var a=0;a<this.dkw_get().length;a++){var n=lift_encode(this.dkw_get()[a].trim());if(0<n.length){this.KW.push(e+" "+i+" "+r+" "+n);for(var s=0;s<this.ekw_get().length;s++){var h=lift_encode(this.ekw_get()[s].trim());0<h.length&&this.KW.push(e+" "+i+" "+r+" "+n+" "+h)}}}}}}}}$("#results").text(lift_decode(LIFT_APP.KW.join("\n"))),$("#boxresult .rs").removeClass("d-none"),$("#boxresult .rv").hide(),$("#number").text(LIFT_APP.KW.length)},genmulti:function(){this.rePlaceMulti=replaceLIFT(LIFT_APP.code.getValue());for(var t=this.rePlaceMulti.replace(/<item>(.*?)<\/item>/gi,"___LIFTCHANGE___"),e=0,_=0;_<this.akw_get().length;_++){var i=lift_encode(this.akw_get()[_].trim());if(0<i.length)for(var l=0;l<this.bkw_get().length;l++){var r=lift_encode(this.bkw_get()[l].trim());if(0<r.length){e++,this.KW.push(i+" "+r),this.replaceMultiKW(this.rePlaceMulti,e,i,r);for(var a=0;a<this.ckw_get().length;a++){var n=lift_encode(this.ckw_get()[a].trim());if(0<n.length){e++,this.KW.push(i+" "+r+" "+n),this.replaceMultiKW(this.rePlaceMulti,e,i,r,n);for(var s=0;s<this.dkw_get().length;s++){var h=lift_encode(this.dkw_get()[s].trim());if(0<h.length){e++,this.KW.push(i+" "+r+" "+n+" "+h),this.replaceMultiKW(this.rePlaceMulti,e,i,r,n,h);for(var c=0;c<this.ekw_get().length;c++){var g=lift_encode(this.ekw_get()[c].trim());0<g.length&&(e++,this.KW.push(i+" "+r+" "+n+" "+h+" "+g),this.replaceMultiKW(this.rePlaceMulti,e,i,r,n,h,g))}}}}}}}}var o=t.replace("___LIFTCHANGE___",this.rePlaceMulti_Done.join(""));$("#resultsmulti").val(unReplaceLIFT(o)),$("#results").val(lift_decode(LIFT_APP.KW.join("\n")));var u=$("#resultsmulti").val(),p="LIFT_POST_GEN_"+(new Date).getTime()+".xml";download(p,u)},replaceMultiKW:function(t,e,_,i,l,r,a){var n=_?_+" ":"",s=i?i+" ":"",h=l?l+" ":"",c=r?r+" ":"",g=a?a+" ":"",o=_||i||l||r||a?n+s+h+c+g:"",u=makeid(5),p=t.match(/<item>(.*?)<\/item>/gi).map(function(t){return t})[0].replace(/(___REPLACE___|___replace___)/gi,o.trim()).replace(/(___REPLACE_A___|___replace_a___)/gi,n.trim()).replace(/(___REPLACE_B___|___replace_b___)/gi,s.trim()).replace(/(___REPLACE_C___|___replace_c___)/gi,h.trim()).replace(/(___REPLACE_D___|___replace_d___)/gi,c.trim()).replace(/(___REPLACE_E___|___replace_e___)/gi,g.trim()).trim();this.rePlaceMulti_Done.push(p.replace(/<wp:post_id>(.*?)<\/wp:post_id>/gi,"<wp:post_id>"+u+"</wp:post_id>"))}};LIFT_APP.init();