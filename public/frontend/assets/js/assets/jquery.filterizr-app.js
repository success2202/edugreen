$(document).ready(function () {
	"use strict";
	// Filterizr JS
	$('.filter-container').filterizr();
	//Filter Controls
	$('.course-filter li').on('click', function (e) {
		$('.course-filter li').removeClass('active');
		$(this).addClass('active');
	});
	
});