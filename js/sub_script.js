$(document).ready(function() {
	$('.keypad-form').hide();
	$('.keypad-wrapper').removeClass('hidden');
	$('.pager').addClass('clearfix');
	if ($('body').hasClass('logged-in')) {
		$('.resource-body').hide();
		$('.body-expander').addClass('closed');
		$('.body-expander').removeClass('open');
	}

	MBP.hideUrlBarOnLoad;

	$('.show-hide--code').click(function() {
		if ($(this).hasClass('collapsed')) {
			$('.keypad-form').slideDown("slow");
			$(this).addClass('expanded');
			$(this).removeClass('collapsed');
			$(this).attr('alt','Hide Stop Code Field');
			$(this).attr('title','Hide Stop Code Field');
		}
		else {
			$('.keypad-form').slideUp("slow");
			$(this).addClass('collapsed');
			$(this).removeClass('expanded');
			$(this).attr('alt','Show Stop Code Field');
			$(this).attr('title','Show Stop Code Field');
		}	
	});
	$('.show-hide--menu').click(function() {
		if ($(this).hasClass('collapsed')) {
			$('.region-header').addClass("expanded");
			$(this).addClass('expanded');
			$(this).removeClass('collapsed');
			$(this).attr('alt','Hide Main Menu');
			$(this).attr('title','Hide Main Menu');
		}
		else {
			$('.region-header').removeClass("expanded");
			$(this).addClass('collapsed');
			$(this).removeClass('expanded');
			$(this).attr('alt','Show Main Menu');
			$(this).attr('title','Show Main Menu');
		}	
	});
	$('.body-expander').click(function() {
		$('.resource-body').toggle();
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

	
