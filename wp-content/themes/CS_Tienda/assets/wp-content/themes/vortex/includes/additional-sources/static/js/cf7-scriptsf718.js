(function($){

	"use strict";

	$(document).ready(function() {

		$('div.wpcf7 form.wpcf7-form br').addClass('hide');

		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap input[type=text]').addClass('form-control');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap input[type=email]').addClass('form-control');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap input[type=url]').addClass('form-control');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap input[type=tel]').addClass('form-control');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap input[type=number]').addClass('form-control');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap input[type=date]').addClass('form-control');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap select').addClass('form-control');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap textarea').addClass('form-control').attr('rows', '7');

		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap').addClass('form-group');
		$('div.wpcf7 form.wpcf7-form span[class*=acceptance]').addClass('checkbox');

		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap span.wpcf7-checkbox span.wpcf7-list-item').addClass('checkbox');
		$('div.wpcf7 form.wpcf7-form span.wpcf7-form-control-wrap span.wpcf7-radio span.wpcf7-list-item').addClass('radio');

		$('div.wpcf7 form.wpcf7-form input[type=submit]').addClass('btn btn-brand');

	});

})(jQuery);
