$(document).ready(function() {
	MBP.hideUrlBarOnLoad;
	$('.keypad-form').hide();
	
	$('.main-nav-menu').hide();
	$('.main-nav-menu').removeClass('invisible');
	
	$('.keypad-wrapper').removeClass('hidden');
	
	$('.pager').addClass('clearfix');
	
	$('.search-advanced').removeClass('collapsed');
	
	if ($('body').hasClass('logged-in')) {
		$('.description--body').hide();
		$('.body-expander').addClass('closed');
		$('.body-expander').removeClass('open');
	}
	if (($('body').hasClass('node-type-tour-audio-stop')) ||
		($('body').hasClass('node-type-tour-video-stop')) ||
		($('body').hasClass('node-type-tour-image-stop')) ||
		($('body').hasClass('node-type-information-stop')) ||
		($('body').hasClass('node-type-poll-stop')) ||
		($('body').hasClass('node-type-geo-stop')) ||
		($('body').hasClass('node-type-website-stop')) ||
		($('body').hasClass('node-type-object-info'))) {
			$('body').addClass('resource-page');
	}
	$('.show-hide--code').click(function() {
		if ($(this).hasClass('collapsed')) {
			$('.keypad-form').slideDown("fast");
			$(this).addClass('expanded');
			$(this).removeClass('collapsed');
			$(this).attr('alt','Hide Stop Code Field');
			$(this).attr('title','Hide Stop Code Field');
		}
		else {
			$('.keypad-form').slideUp("fast");
			$(this).addClass('collapsed');
			$(this).removeClass('expanded');
			$(this).attr('alt','Show Stop Code Field');
			$(this).attr('title','Show Stop Code Field');
		}	
	});
	$('.show-hide--menu').click(function() {
		if ($(this).hasClass('collapsed')) {
			$('.main-nav-menu').slideDown("fast");
			$(this).addClass('expanded');
			$(this).removeClass('collapsed');
			$(this).attr('alt','Hide Main Menu');
			$(this).attr('title','Hide Main Menu');
		}
		else {
			$('.main-nav-menu').slideUp("fast");
			$(this).addClass('collapsed');
			$(this).removeClass('expanded');
			$(this).attr('alt','Show Main Menu');
			$(this).attr('title','Show Main Menu');
		}	
	});
	$('.menu-link--expandable').click(function() {
		if ($(this).hasClass('collapsed')) {
			$(this).next('ul').slideDown('fast');
			$(this).addClass('expanded');
			$(this).removeClass('collapsed');
		}
		else {
			$(this).next('ul').slideUp('fast');
			$(this).addClass('collapsed');
			$(this).removeClass('expanded');
		}
	});
	$('.body-expander').click(function() {
		$('.description--body').toggle();
		if ($('.body-expander').hasClass('open')) {
			$(this).addClass('closed');
			$(this).removeClass('open');
		}
		else {
			$(this).addClass('open');
			$(this).removeClass('closed');
		}
	});
	
	
	$(".inter-nav").click(function() {
		var current_id = $(this).attr('id');
		new_id = '.level--' + current_id;
		$('html, body').animate({
			scrollTop: $(new_id).offset().top
		}, 1000);
	});
	
	$(".inter-nav-top").click(function() {
	   $('html, body').animate({scrollTop:0}, 1000);
		return false;
	});
	
});

window.addEventListener("load",function() {
   setTimeout(function(){
    window.scrollTo(0, 0);
    }, 0);
});

	
