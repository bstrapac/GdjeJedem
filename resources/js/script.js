(function($) {
$(document).ready(function() {
	$('.section_about').css({
		"display": "none"
	});
	$('.cjenik').on('click', () => {
		$('.section_about').css({
			"display": "none"
		});
		$('.section_jela').css({
			"display": "block"
		});
	});
	$('.about').on('click', () => {
		$('.section_about').css({
			"display": "block"
		});
		$('.section_jela').css({
			"display": "none"
		});
	});
	})
})(jQuery);