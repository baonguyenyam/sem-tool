"use strict";$("#contentgeneratorimport").on("click",function(){var e="";if($("#csvsource").val()||LIFT_APP.code||(e+="Please upload .csv file\n"),e)alert(e);else{var l=null,t="",r="";$("#csvsource").val()&&(l=$("#csvsource").val()),LIFT_APP.code&&(l=LIFT_APP.code.getValue()),l=l.replace(/^(?:\r\n?|\n|\r|\s*)/gm,"").replace(/\n*$/,"").split("\n");for(var a=$("#readCSVTable #fkw").val(),n=$("#readCSVTable #furl").val(),c=0;c<l.length;c++)0<$("#add-title:checkbox:checked").length&&(r+=' title="'+replaceLIFT(l[c].split(",")[a]).trim()+'"'),0<$("#add-nofollow:checkbox:checked").length&&(r+=' rel="nofollow"'),0<$("#add-tab:checkbox:checked").length&&(r+=' target="_blank"'),c<l.length-1?t+='<a href="'+l[c].split(",")[n]+'"'+r+">"+replaceLIFT(l[c].split(",")[a]).trim()+"</a>, ":t+='<a href="'+l[c].split(",")[n]+'"'+r+">"+replaceLIFT(l[c].split(",")[a]).trim()+"</a>";0<t.length&&($("#boxresult .rv").hide(),$("#totalurls").html(t),$("#contentresult").val(t),$("#boxresult .rs").removeClass("d-none"))}}),$("#contentgenerator").on("click",function(){var e="",l=$("#contentkeyword").val().replace(/^(?:\r\n?|\n|\r|\s*)/gm,"").replace(/\n*$/,"").split("\n"),t=$("#contenturls").val().replace(/^(?:\r\n?|\n|\r|\s*)/gm,"").replace(/\n*$/,"").split("\n");if($("#contentkeyword").val()||(e+="Please enter keywords list\n"),$("#contenturls").val()||(e+="Please enter URLs list\n"),l.length!=t.length&&(e+="Something wrong!\n"),e)alert(e);else{for(var r="",a="",n=0;n<l.length;n++)0<$("#add-title:checkbox:checked").length&&(a+=' title="'+replaceLIFT(l[n]).trim()+'"'),0<$("#add-nofollow:checkbox:checked").length&&(a+=' rel="nofollow"'),0<$("#add-tab:checkbox:checked").length&&(a+=' target="_blank"'),n<l.length-1?r+='<a href="'+t[n]+'"'+a+">"+replaceLIFT(l[n]).trim()+"</a>, ":r+='<a href="'+t[n]+'"'+a+">"+replaceLIFT(l[n]).trim()+"</a>";0<r.length&&($("#boxresult .rv").hide(),$("#totalurls").html(r),$("#contentresult").val(r),$("#boxresult .rs").removeClass("d-none"))}});var clipboard=new ClipboardJS("[data-clipboard-target]");clipboard.on("success",function(e){$("#copy_toast").toast("show"),e.clearSelection()});