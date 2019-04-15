jQuery(document).ready(function( $ ) {
	var cijenik = $('.cjenik');
	var about = $('.about');
	$('.section_about').hide();
	cijenik.addClass("active");
	$('.cjenik').on('click', () => {
			$('.section_about').hide();
			$('.section_jela').show();
			cijenik.addClass("active");
			about.removeClass("active");
		});
		$('.about').on('click', () => {
			$('.section_about').show();
			$('.section_jela').hide();
			cijenik.removeClass("active");
			about.addClass("active");
		});
});