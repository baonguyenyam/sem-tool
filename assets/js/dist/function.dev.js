"use strict";

function lift_encode(str) {
  return unescape(encodeURIComponent(str));
}

function lift_decode(str) {
  return decodeURIComponent(escape(str));
}

function download(filename, text) {
  var element = document.createElement('a');
  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
  element.setAttribute('download', filename);
  element.style.display = 'none';
  document.body.appendChild(element);
  element.click();
  document.body.removeChild(element);
}

function makeid(length) {
  var result = [];
  var characters = '123456789';
  var charactersLength = characters.length;

  for (var i = 0; i < length; i++) {
    result.push(characters.charAt(Math.floor(Math.random() * charactersLength)));
  }

  return result.join('');
}

function replaceLIFT(str) {
  return str.toString().replace(/"/gi, "&#34;").replace(/'/gi, "&#39;").replace(/\n/gi, '').replace(/>\s+</g, "><").replace(/\n/g, "").replace(/[\t ]+\</g, "<").replace(/\>[\t ]+\</g, "><").replace(/\>[\t ]+$/g, ">");
}

function unReplaceLIFT(str) {
  return str.toString().replace(/&#34;/gi, "\"").replace(/&#39;/gi, "'");
}

function resultHTMLValidate(key, string) {
  return '<div class="list-group-item d-flex justify-content-between"><strong>' + key + '</strong> ' + string + '</div>';
}

function loadCSVFileAsText() {
  if (document.getElementById("fileCSVToLoad").value) {
    var fileCSVToLoad = document.getElementById("fileCSVToLoad").files[0];
    var fileReader = new FileReader();

    fileReader.onload = function (fileLoadedEvent) {
      var textFromFileLoaded = fileLoadedEvent.target.result;
      document.getElementById("csvsource").value = textFromFileLoaded;
      LIFT_APP.code = CodeMirror.fromTextArea(document.getElementById("csvsource"), {
        mode: "text/x-textile",
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        smartIndent: true,
        indentWithTabs: true
      });
      LIFT_APP.code.setOption("theme", 'monokai');
      var getFirstValue = LIFT_APP.code.getValue().replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n");
      var getFirstValueValue = getFirstValue[0].split(",");
      var buildLit = '';

      for (var index = 0; index < getFirstValueValue.length; index++) {
        buildLit += '<option value="' + index + '">' + getFirstValueValue[index] + '</option>';
      }

      $('#readCSVTable').removeClass('d-none');
      $('#readCSVTable #fkw').append(buildLit);
      $('#readCSVTable #furl').append(buildLit);
    };

    fileReader.readAsText(fileCSVToLoad, "UTF-8");
  } else {
    alert('Please upload file');
  }
}

function loadFileAsText() {
  if (document.getElementById("fileToLoad").value) {
    var fileToLoad = document.getElementById("fileToLoad").files[0];
    var fileReader = new FileReader();

    fileReader.onload = function (fileLoadedEvent) {
      var textFromFileLoaded = fileLoadedEvent.target.result;
      document.getElementById("source").value = textFromFileLoaded;
      localStorage.removeItem('myLIFT_Replace');
      localStorage.setItem('myLIFT_Replace', textFromFileLoaded);
      LIFT_APP.code = CodeMirror.fromTextArea(document.getElementById("source"), {
        mode: "text/html",
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        smartIndent: true,
        indentWithTabs: true
      });
      LIFT_APP.code.setOption("theme", 'monokai');
    };

    fileReader.readAsText(fileToLoad, "UTF-8");
  } else {
    alert('Please upload file');
  }
}

function extractHostname(url) {
  var hostname;

  if (url.indexOf("//") > -1) {
    hostname = url.split('/')[2];
  } else {
    hostname = url.split('/')[0];
  }

  hostname = hostname.split(':')[0];
  hostname = hostname.split('?')[0];
  return hostname;
}

function extractRootDomain(url) {
  var domain = extractHostname(url),
      splitArr = domain.split('.'),
      arrLen = splitArr.length;

  if (arrLen > 2) {
    domain = splitArr[arrLen - 2] + '.' + splitArr[arrLen - 1];

    if (splitArr[arrLen - 2].length == 2 && splitArr[arrLen - 1].length == 2) {
      domain = splitArr[arrLen - 3] + '.' + domain;
    }
  }

  return domain;
}

function Validate() {
  var password = document.getElementById("txtPassword").value;
  var confirmPassword = document.getElementById("txtConfirmPassword").value;

  if (password != confirmPassword) {
    alert("The password does not match");
    return false;
  }

  if (password.length < 3 || confirmPassword.length < 3) {
    alert("Your Password is too short");
    return false;
  }

  return true;
}

function generatePassword() {
  var length = 6,
      charset = "0123456789",
      retVal = "";

  for (var i = 0, n = charset.length; i < length; ++i) {
    retVal += charset.charAt(Math.floor(Math.random() * n));
  }

  return retVal;
}