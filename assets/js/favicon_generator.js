$('#getfrmSubmit').on('submit', function () {
	var name = $('#filePreview').get(0).files[0];
	if (!name) {
		alert('Please upload favicon')
		return false;
	}
})
function loadfilePreview() {
	$('#faviboxres .rv').removeClass('d-none');
	$('#faviboxres .tv').addClass('d-none');
	if(LIFT_APP.code) {
		LIFT_APP.code.toTextArea()
	}
	var myFavicon = '<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">\n'+
	'<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">\n'+
	'<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">\n'+
	'<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">\n'+
	'<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">\n'+
	'<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">\n'+
	'<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">\n'+
	'<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">\n'+
	'<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">\n'+
	'<link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">\n'+
	'<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">\n'+
	'<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">\n'+
	'<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">\n'+
	'<link rel="manifest" href="/favicon/manifest.json">\n'+
	'<meta name="msapplication-config" content="/favicon/browserconfig.xml" />\n'+
	'<meta name="msapplication-TileColor" content="'+$('#sitecolor').val().trim()+'">\n'+
	'<meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">\n'+
	'<meta name="theme-color" content="'+$('#sitecolor').val().trim()+'">';
	var gFile = $('#filePreview').get(0).files[0];
	if (gFile) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#favicon-preview .faicon').css({
				'background-image': 'url('+e.target.result+')'
			});
			$('#favicon-preview-icon .imgfavi').attr('src', e.target.result)
		}
		reader.readAsDataURL(gFile);
		$('#favisresult').val(myFavicon);
	} else {
		alert('Please upload favicon')
	}
}