(function($) {
  var IS_IOS = /iphone|ipad/i.test(navigator.userAgent);
  $.fn.nodoubletapzoom = function() {
    if (IS_IOS)
      $(this).bind('touchstart', function preventZoom(e) {
        var t2 = e.timeStamp
          , t1 = $(this).data('lastTouch') || t2
          , dt = t2 - t1
          , fingers = e.originalEvent.touches.length;
        $(this).data('lastTouch', t2);
        if (!dt || dt > 500 || fingers > 1) return; // not double-tap
 
        e.preventDefault(); // double tap - prevent the zoom
        // also synthesize click events we just swallowed up
        //$(this).trigger('click').trigger('click');
      });
  };
})(jQuery);

$(document).ready(function() {
	
	$('.pager').addClass('clearfix');

	MBP.hideUrlBarOnLoad;
	
	$('.keypad-button').mousedown(function() { $(this).addClass("pressed"); });
	$('.keypad-button').mouseup(function() { $(this).removeClass("pressed"); });
	
	$('.keypad-button').nodoubletapzoom();
	
	new MBP.fastButton(document.getElementById('1-button'), function() { 
		addCode('1');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('2-button'), function() { 
		addCode('2');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('3-button'), function() { 
		addCode('3');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('4-button'), function() { 
		addCode('4');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('5-button'), function() { 
		addCode('5');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('6-button'), function() { 
		addCode('6');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('7-button'), function() { 
		addCode('7');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('8-button'), function() { 
		addCode('8');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('9-button'), function() { 
		addCode('9');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('0-button'), function() { 
		addCode('0');
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('clear-button'), function() { 
		emptyCode();
		$(this).addClass('pressed');
	});
	new MBP.fastButton(document.getElementById('go-button'), function() { 
		submitForm();
		$(this).addClass('pressed');
	});
	
	$('.key-show-hide').click(function() { 
		if ($('#keypad-wrapper').hasClass('hidden')) {
			MBP.hideUrlBar();
			
			// Show the keypad
			$('#keypad-wrapper').removeClass('hidden');
			
			// Change the show/hide button
			$('.key-show-hide').addClass('x');
			$('.key-show-hide').removeClass('pad');
			
		}
		else {
			
			// Hide the keypad
			$('#keypad-wrapper').addClass('hidden');
			
			// Change the show/hide button
			$('.key-show-hide').addClass('pad');
			$('.key-show-hide').removeClass('x');
			
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

function addCode(key){ 
	$('#keypad-display').val($('#keypad-display').val() + key);
}	
function submitForm(){ 
	var code = document.getElementById('keypad-display').value;
	window.location.href = "/tours/stop/" + code;
}
function emptyCode(){ $('#keypad-display').val(''); }

window.addEventListener("load",function() {
   setTimeout(function(){
    window.scrollTo(0, 0);
    }, 0);
 });

	
