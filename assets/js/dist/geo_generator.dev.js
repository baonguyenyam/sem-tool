"use strict";

if ($('#geostate').length > 0) {
  $.ajax({
    url: './assets/statecode.json',
    type: 'GET',
    success: function success(json) {
      var tmp = '';

      for (var key in json) {
        if (Object.hasOwnProperty.call(json, key)) {
          tmp += '<option value="' + key + '">' + json[key] + '</option>';
        }
      }

      $('#geostate').html(tmp);
    },
    error: function error() {}
  });
}

$('#geogenerator').on('click', function () {
  if (LIFT_APP.code) {
    LIFT_APP.code.toTextArea();
  }

  var url = $('#geoaddress').val().trim();
  var name = $('#geowebname').val().trim();
  var email = $('#geoemail').val().trim();
  var phone = $('#geophone').val().trim();
  var fax = $('#geofax').val().trim();
  var code = $('#geostate').val().trim();

  if (!url || url.length < 1) {
    alert('Please enter address');
    return false;
  } else {
    $.ajax({
      url: 'https://nominatim.openstreetmap.org/search?q=' + encodeURIComponent(url) + '&format=json&json_callback=&addressdetails=1&limit=1',
      type: 'GET',
      success: function success(json) {
        console.log(json);
        var tmp = '<!--//\n' + '╦  ╦╔═╗╔╦╗  ╔═╗┬─┐┌─┐┌─┐┌┬┐┬┌─┐┌┐┌┌─┐\n' + '║  ║╠╣  ║   ║  ├┬┘├┤ ├─┤ │ ││ ││││└─┐\n' + '╩═╝╩╚   ╩   ╚═╝┴└─└─┘┴ ┴ ┴ ┴└─┘┘└┘└─┘\n' + '//-->\n' + '<meta name="DC.title" content="' + name + '" />\n' + '<meta name="geo.region" content="' + json[0].address.country_code.toUpperCase() + '-' + code + '" />\n' + '<meta name="geo.placename" content="' + json[0].address.city + '" />\n' + '<meta name="geo.position" content="' + json[0].lat + ';' + json[0].lon + '" />\n' + '<meta name="address" content="' + json[0].display_name + '" />\n' + '<meta name="ICBM" content="' + json[0].lat + ', ' + json[0].lon + '" />\n' + '<meta name="og:country-name" content="USA" />\n' + '<meta name="og:latitude" content="' + json[0].lat + '" />\n' + '<meta name="og:longitude" content="' + json[0].lon + '" />\n' + '<meta name="og:street-address" content="' + url + '" />\n' + '<meta name="og:locality" content="' + json[0].address.city + '" />\n' + '<meta name="og:region" content="' + code + '" />\n' + '<meta name="og:postal-code" content="' + json[0].address.postcode + '" />\n' + '<meta name="og:email" content="' + email + '">\n' + '<meta name="og:phone_number" content="' + phone + '">\n' + '<meta name="og:fax_number" content="' + fax + '">\n' + '<meta name="og:country-name" content="USA" />';
        $('#geosource').val(tmp);
        LIFT_APP.code = CodeMirror.fromTextArea(document.getElementById("geosource"), {
          mode: "text/html",
          lineNumbers: true,
          styleActiveLine: true,
          matchBrackets: true,
          smartIndent: true,
          indentWithTabs: true
        });
        LIFT_APP.code.setOption("theme", 'monokai');
      },
      error: function error() {}
    });
  }
});