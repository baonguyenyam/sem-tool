$('#robotCraw').on('click', function () {
	var rbbulder = '#robots.txt generator by LIFT Creations\n\n';
	var rbsitemap = ['/sitemap.xml'];
	if ($('#sAll').prop('checked')) {
		rbbulder += 'User-agent: *\n';
		if ($('#inputAllow').val() === 'allow') {
			rbbulder += 'Allow: /\n\n';
		} else {
			rbbulder += 'Disallow: /\n\n';
		}
	} else {
		var numberNotChecked = $('#sRobots .bot :checkbox:checked').length;
		if (numberNotChecked <= 0) {
			alert('Please select User-agent')
			return false
		} else {
			$('#sRobots').find('.bot :checkbox').each(function () {
				if ($(this).prop('checked')) {
					rbbulder += '# by ' + $(this).attr('data-name') + '\n';
					var getbot = $(this).val().split(",");
					for (let index = 0; index < getbot.length; index++) {
						rbbulder += 'User-agent: ' + getbot[index] + '\n';
						if ($('#inputAllow').val() === 'allow') {
							rbbulder += 'Allow: /\n\n';
						} else {
							rbbulder += 'Disallow: /\n\n';
						}
					}
				}
			});
		}
	}
	if ($('#inputDelay').val().length > 0) {
		rbbulder += 'Crawl-delay: ' + $('#inputDelay').val() + '\n\n';
	}
	// SITEMAP 
	if ($('#inputSitemap').val().length > 0) {
		rbsitemap = $('#inputSitemap').val().replace(/^(?:\r\n?|\n|\r|\s*)/gm, '').replace(/\n*$/, '').split("\n")
	}
	for (let index = 0; index < rbsitemap.length; index++) {
		rbbulder += 'Sitemap: ' + rbsitemap[index] + '\n';
	}
	$('#robotsresult').val(rbbulder)
});
$('#sAll').on('click', function () {
	var checkedStatus = this.checked;
	$('#sRobots').find('.bot :checkbox').each(function () {
		$(this).prop('checked', checkedStatus);
	});
});
$('#sRobots .bot :checkbox').each(function () {
	$(this).on('click', function () {
		if (!$(this).prop('checked')) {
			$('#sAll').prop('checked', false);
		}
		var setall = true;
		$('#sRobots').find('.bot :checkbox').each(function () {
			if (!$(this).prop('checked')) {
				setall = false;
			}
		});
		if (setall) {
			$('#sAll').prop('checked', true);
		}
	});
});