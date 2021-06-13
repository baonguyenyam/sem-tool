var triggerTabList = [].slice.call(document.querySelectorAll('#qrtab a'))
triggerTabList.forEach(function (triggerEl) {
	triggerEl.addEventListener('shown.bs.tab', function (event) {
		event.preventDefault()
		let dm = $(event.target).attr('data-bs-target')
		$(dm).find('input[type="text"], input[type="tel"], input[type="email"], textarea').val('')
		$('#inputText').val('')
		$('#inputAmount').val('')
		$('#inputNetwork').val('')
		$('#inputCall').val('')
	})
})

var img1 = '/qrcode.php?s=qr&sf=40&sy=40&wq=0&pl=0&pr=0&pt=0&ts=15&th=15&pb=0&d='
var img2 = '/barcode.php?s=dmtx&sf=70&sy=70&wq=0&pl=0&pr=0&pt=0&ts=15&th=15&pb=0&d='
var img3 = '/barcode.php?s=code-128&sf=12&sy=6&wq=0&pl=0&pr=0&pt=0&pb=0&ts=0&th=10&d='
var img4 = '/barcode.php?s=code-39&sf=4&sy=1&wq=0&pl=0&pr=0&pt=0&ts=5&th=16&pb=18&d='

$('#qrgenbtn').on('click', function () {
	if ($('#inputText').val().length > 0) {
		var vText = $('#inputText').val().trim();
		$('#imgqr-1').attr('src', img1 + vText)
		$('#imgqr-2').attr('src', img2 + vText)
		$('#imgqr-3').attr('src', img3 + vText)
		$('#imgqr-4').attr('src', img4 + vText)
	}
	if ($('#inputNetwork').val().length > 0) {
		var vWifi = 'WIFI:' +
			'T:' + $('input[name="inlineRadioNWOptionsNW"]:checked', '#frmchange').val().trim() + ';' +
			'S:' + $('#inputNetwork').val().trim() + ';' +
			'P:' + $('#inputPassword').val().trim() + ';' +
			'H:;';
		$('#imgqr-1').attr('src', img1 + vWifi)
		$('#imgqr-2').attr('src', img2 + vWifi)
		$('#imgqr-3').attr('src', img3 + vWifi)
		$('#imgqr-4').attr('src', img4 + $('#inputNetwork').val().trim())
	}
	if ($('#inputAmount').val().length > 0) {
		var vBit = '' + $('input[name="inlineRadioOptions"]:checked', '#frmchange').val().trim() + ':' +
			'' + $('#inputReceiver').val().trim() + '' +
			'?amount=' + $('#inputAmount').val().trim();
		$('#imgqr-1').attr('src', img1 + vBit)
		$('#imgqr-2').attr('src', img2 + vBit)
		$('#imgqr-3').attr('src', img3 + vBit)
		$('#imgqr-4').attr('src', img4 + $('input[name="inlineRadioOptions"]:checked', '#frmchange').val().trim())
	}
	if ($('#inputCall').val().length > 0) {
		var vTel = 'tel:' +
			'' + $('#inputCall').val().trim();
		$('#imgqr-1').attr('src', img1 + vTel)
		$('#imgqr-2').attr('src', img2 + vTel)
		$('#imgqr-3').attr('src', img3 + vTel)
		$('#imgqr-4').attr('src', img4 + $('#inputCall').val().trim())
		console.log(vTel)
	}
	if ($('#inputFullname').val().length > 0) {
		var vCard = 'BEGIN:VCARD' +
			'VERSION:3.0' +
			'N:' + $('#inputFullname').val().trim() +
			'FN:' + $('#inputFullname').val().trim() +
			'URL:' + $('#inputWebsite').val().trim() +
			'EMAIL:' + $('#inputEmail').val().trim() +
			'TEL;TYPE=voice,work,pref:' + $('#inputMobile').val().trim() +
			'ADR;TYPE=intl,work,postal,parcel:;;' + $('#inputAddress').val().trim() +
			'END:VCARD';
		$('#imgqr-1').attr('src', img1 + vCard)
		$('#imgqr-2').attr('src', img2 + vCard)
		$('#imgqr-3').attr('src', img3 + vCard)
		$('#imgqr-4').attr('src', img4 + $('#inputFullname').val().trim())
		console.log(vCard)
	}
})
$('.clicktosave').on('click', function() {
	var link = document.createElement('a');
		link.href = $(this).attr('src');  // use realtive url 
		link.download = 'QR-CODE-'+makeid(5)+'.jpg';
		document.body.appendChild(link);
		link.click();
})