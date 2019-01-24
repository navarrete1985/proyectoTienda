(function($){

	"use strict";

	$(document).ready(function() {

		// Change the style of the header if the slider has only one slide, which has a dark style.
		var header       = $('.header');
		var single_slide = $('.single-slide');
		if ( single_slide.length >= 0 ) {
			if ( single_slide.hasClass('bg-dark') ) {
				header.addClass('header-light');
			}
		}

		// Changing the scroll restriction to add a class to the header line on mobile devices.
		$(window).scroll(function() {
			if ( $(window).width() < 992 ) {
				if ( header.hasClass('header-small') ) {
					header.removeClass('header-small');
				}
			}
		}).scroll();

	});

})(jQuery);
