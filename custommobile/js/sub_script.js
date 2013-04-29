$(document).ready(function() {
	
	/* On page load housekeeping -------------------------------------------------------*/
	
	// Hide URL bar on load
	setTimeout(function(){
    	window.scrollTo(0, 0);
    }, 0);
	
	// Turn on JS styling
	$('body').removeClass('no-js');
	$('#no-js--code-link').removeAttr("href");
	
	// Remove default size from video player so it can be styled by sub_style.css
	$('.video-js').attr('style','');
	$('.video-js').attr('width','auto');
	$('.video-js').attr('height','auto');
	
	// Hide drop-down menu and keypad
	$('.keypad-form').hide();
	$('.main-nav-menu').hide();
	
	// Make the keypad drop-down visible
	$('#keypad-wrapper').removeClass('hidden');
	
	// Too lazy to add this in the pager template, so I put it here
	$('.pager').addClass('clearfix');
	
	// Expand advanced search options for docents
	$('.search-advanced').removeClass('collapsed');
	
	// Set initial values in search and code fields
	$('#edit-search-block-form--2').attr('value','Search');
	$('#edit-search-block-form--2').addClass('form-initial');
	$('.keypad-display').attr('value','00000');
	
	// Give all resource content types the 'resource-page' class
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
	
	/* Interactive functions  ----------------------------------------------------------*/
	
	// Empty fields with initial values on click
	$('#edit-search-block-form--2').click(function() {
		var input = '#edit-search-block-form--2';
		form_click(input);
	});
	$('.keypad-display').click(function() {
		var input = '.keypad-display';
		form_click(input);
	});
	
	// Hide and show the Enter Code box
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
	
	// Hide and show the main menu
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
	
	/*  When using in-page navigation, this connects 'inter-nav' links with their associated
		HTML elements. Links with the 'inter-nav' class should have IDs that match their
		associated blocks. Those blocks should have the class 'level--[linkID]' */
	$(".inter-nav").click(function() {
		var current_id = $(this).attr('id');
		new_id = '.level--' + current_id;
		$('html, body').animate({
			scrollTop: $(new_id).offset().top
		}, 1000);
	});
	
	// Special 'inter-nav' link for scrolling back to the top of the page
	$(".inter-nav-top").click(function() {
	   $('html, body').animate({scrollTop:0}, 1000);
		return false;
	});

});

$(window).load(function() {
	/* Some more housekeeping for styling the video player. Hides the placeholder image
	   on click. */
	$('.vjs-big-play-button').click(function() {
		$('.video-js').removeClass('video-initial');
		$('#video-placeholder-image').hide();
	});
	$('.video-js').click(function() {
		$(this).removeClass('video-initial');
		$('#video-placeholder-image').hide();
	});
});

// Little function for clearing initial values out of fields
function form_click(input) {
	if ($(input).hasClass('form-initial')) {
		$(input).attr('value', '');
		$(input).addClass('clicked').removeClass('form-initial');
	}
}