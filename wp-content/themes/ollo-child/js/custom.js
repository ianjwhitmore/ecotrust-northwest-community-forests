//  Custom jquery file


(function($) { 
	
	
	$(window).load(function(){
		
		$('.single-tribe_events .theme-inner-banner .container h2').html('&nbsp;').css('display','block');	
		$('.post-type-archive-tribe_events .theme-inner-banner .container h2').html('&nbsp;').css('display','block');
		
		$('body.category').addClass('kingcomposer');
		
		$('body.single-post a[target]').append('<i class="fa fa-external-link" aria-hidden="true"></i>');
		
	});



	// Window load function
	$(document).on('ready', function() {


			$('a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			
					if (target.length) {			
						$('html, body').animate({
						scrollTop: target.offset().top - 90 }, 1600);
						return false;
						}
					}
				});
			});
			
			$(window).load(function(){
				function goToByScroll(id){
					$("html, body").animate({scrollTop: $("#"+id).offset().top - 90 }, 1600);
				}
			
				if(window.location.hash != '') {
					goToByScroll(window.location.hash.substr(1));
				}
			});




		/*
	Hash-link smooth scrolling
	------------------------------- */

/*

		function scrollToX(x, callback) {

			// Allow scroll events to stop animation
			timeout = setTimeout(function() { container.on(scrollEvents, scrollStop); }, 0);

			// Animate
			container.stop().animate({ 'scrollTop': x }, 800, function() {
				callback();
				scrollStop();
			});
		}

		function scrollStop() {
			container.stop();

			// Complete, don't track scroll events
			container.off(scrollEvents, scrollStop);

			// Stop scroll stop timeout
			clearTimeout(timeout);
		}

		function hashchange() {
			if (!location.hash)
				return;

			// Find corresponding link
			var link = $('a[href^="' + location.hash + '"]'),
				target;

			// Does it match a hash link?
			if (link.is(hashLinks)) {
				link = link.first();
				target = $(location.hash);

				// Wait then click again
				if (target.length && (!target.is(':hidden') || target.is('.lightbox'))) {
					setTimeout(function() { link.click(); }, 600);
				}
			}
		}

		function click(event) {

			var hash = this.hash,
				target = $(hash),
				transform, transformY;

			// Does the target exist and isn't fixed
			if (target.length && target.css('position') !== 'fixed') {

				// Fetch CSS transform
				transform = target.css('transform').replace(/[^0-9\-.,]/g, '').split(','),
				transformY = $.isArray(transform)? transform[13] || transform[5] : 0;

				// Scroll to position
				scrollToX(Math.round(target.offset().top - transformY), function() {
					location.hash = hash;
				});

				event.preventDefault();
			}
		}

		var container = $('html, body'),
			hashLinks = $('a[href^="#"]'),
			timeout;

		// Use these events to cancel an scroll in progress
		var scrollEvents = 'scroll mousedown DOMMouseScroll mousewheel keyup touchstart MSPointerMove pointermove';

		// Smooth-scroll hash links
		$(document).on('click', hashLinks.selector, click);

		// Listen for hash change
		$(window).on('hashchange', hashchange);
		hashchange();

		
		
*/
		




})(window.jQuery);