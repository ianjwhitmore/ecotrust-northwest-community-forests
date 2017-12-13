//  Theme Custom jquery file, 

      // Created on   : 04/06/2017. 
      // Theme        : ollo - Charity bootstrap template.
      // Category     : Charity.
      // Author       : @Unifytheme.
      // Designed By  : @Unifytheme.
      // Developed By : @Unifytheme.

(function($) { 
"use strict";

//------like end-----
	 var bunch_theme = {   
	   count: 0,
	   likeit: function(options, selector)
	   {
		options.action = '_bunch_ajax_callback';
		
		if( $(selector).data('_bunch_like_it') === true ){
		 bunch_theme.msg( 'You have already done this job', 'error' );
		 return;
		}
		
		$(selector).data('_bunch_like_it', true );
	
		bunch_theme.loading(true);
		
		$.ajax({
		 url: ajaxurl,
		 type: 'POST',
		 data:options,
		 dataType:"json",
		 success: function(res){
	
		  try{
		   var newjason = res;
	
		   if( newjason.code === 'fail'){
			$(selector).data('_bunch_like_it', false );
			bunch_theme.loading(false);
			bunch_theme.msg( newjason.msg, 'error' );
		   }else if( newjason.code === 'success' ){
			//$('a[data-id="'+options.data_id+'"]').html( '<i class="fa fa-heart-o"></i> '+newjason.value );
			bunch_theme.loading(false);
			$(selector).data('_bunch_like_it', true );
			bunch_theme.msg( newjason.msg, 'success' );
		   }
		   
		  }
		  catch(e){
		   bunch_theme.loading(false);
		   $(selector).data('_bunch_like_it', false );
		   bunch_theme.msg( 'There was an error with request '+e.message, 'error' );
		   
		  }
		 }
		});
	   },
	   loading: function( show ){
		if( $('.ajax-loading' ).length === 0 ) {
		 $('body').append('<div class="ajax-loading" style="display:none;"></div>');
		}
		
		if( show === true ){
		 $('.ajax-loading').show('slow');
		}
		if( show === false ){
		 $('.ajax-loading').hide('slow');
		}
	   },
	   
	   msg: function( msg, type ){
		if( $('#pop' ).length === 0 ) {
		 $('body').append('<div style="display: none;" id="pop"><div class="pop"><div class="alert"><p></p></div></div></div>');
		}
		if( type === 'error' ) {
		 type = 'danger';
		}
		var alert_type = 'alert-' + type;
		
		$('#pop > .pop p').html( msg );
		$('#pop > .pop > .alert').addClass(alert_type);
		
		$('#pop').slideDown('slow').delay(5000).fadeOut('slow', function(){
		 $('#pop .pop .alert').removeClass(alert_type);
		});
		
		
	   },
	   
	  };
  
 //------like end-----


// Prealoder
 function prealoader () {
   if ($('#loader').length) {
     $('#loader').fadeOut(); // will first fade out the loading animation
     $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
     $('body').delay(350).css({'overflow':'visible'});
  };
 }



// WOW animation 
function wowAnimation () {
  if($('.wow').length) {
    var wow = new WOW(
    {
      boxClass:     'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset:       80,          // distance to the element when triggering the animation (default is 0)
      mobile:       true,       // trigger animations on mobile devices (default is true)
      live:         true,       // act on asynchronously loaded content (default is true)
    }
  );
  wow.init();
  }
}



// placeholder remove
function removePlaceholder () {
  if ($("input,textarea").length) {
    $("input,textarea").each(
            function(){
                $(this).data('holder',$(this).attr('placeholder'));
                $(this).on('focusin', function() {
                    $(this).attr('placeholder','');
                });
                $(this).on('focusout', function() {
                    $(this).attr('placeholder',$(this).data('holder'));
                });
                
        });
  }
}



// Theme Search Box 
function searchBox () {
  var search = $("#search-button"),
      mainSearch = $("#searchWrapper"),
      close = $("#close-button");
  if(search.length) {
    search.on('click', function(){
      mainSearch.addClass('show-box');
    });
    close.on('click', function() {
      mainSearch.removeClass('show-box');
    });
  }
}


// Main Menu Function 
function themeMenu () {
  var menu= $("#mega-menu-holder");
  if(menu.length) {
    menu.slimmenu({
      resizeWidth: '991',
      animSpeed:'medium',
      indentChildren: true,
    });
  }
}


// Fancybox 
function FancypopUp () {
  var popBox = $(".fancybox");
  if (popBox.length) {
      popBox.fancybox({
      openEffect  : 'elastic',
        closeEffect : 'elastic',
         helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(0, 0, 0, 0.6)'
                }
            }
        }
    });
  };
}


// Counter function
function CounterNumberChanger () {
  var timer = $('.timer');
  if(timer.length) {
    timer.appear(function () {
      timer.countTo();
    })
  }
}


// RoundCircle Progress
function roundCircleProgress () {
  var rounderContainer = $('.piechart');
  if (rounderContainer.length) {
    rounderContainer.each(function () {
      var Self = $(this);
      var value = Self.data('value');
      var size = Self.parent().width();
      var color = Self.data('border-color');

      Self.find('span').each(function () {
        var expertCount = $(this);
        expertCount.appear(function () {
          expertCount.countTo({
            from: 0,
            to: value*100,
            speed: 2000
          });
        });

      });
      Self.appear(function () {         
        Self.circleProgress({
          value: value,
          size: 80,
          thickness: 8,
          emptyFill: 'rgba(243,243,243,1)',
          animation: {
            duration: 2000
          },
          fill: {
            color: color
          }
        });
      });
    });
  };
}


// Partner Logo Footer 
function partnersLogo () {
  var pSlider = $ ("#partner-logo");
  if(pSlider.length) {
     pSlider.owlCarousel({
        loop:true,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:4000,
        autoplaySpeed:900,
        lazyLoad:true,
        dragEndSpeed:1000,
        responsive:{
            0:{
                items:2
            },
            700:{
                items:3
            },
            1200:{
                items:4
            }
        }
    })
  }
}



// Progress Bar
function bootstrapProgress () {
  var smartskill = $ ('.skills');
  if(smartskill.length) {
      smartskill.skill();
  }
}


// Charity Cause SLider
function causeSlider () {
  var cSlider = $ (".similer-casue-slider");
  if(cSlider.length) {
     cSlider.owlCarousel({
        loop:true,
        nav:true,
        navText: ["",""],
        dots:false,
        autoplay:true,
        autoplayTimeout:9000,
        autoplaySpeed:1000,
        lazyLoad:true,
        dragEndSpeed:1000,
        navSpeed:1500,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    })
  }
}


// Donation amount 
function donateAmount () {
  if($('.donate-price').length) {
    $(".donate-price").on('click', function () {
      var text = $(this).text();
      $(".donate-amount-handelar").val(text);
      });
  }
}

// Product Slider
function productSlider () {
  var nSlider = $ (".related-product-slider");
  if(nSlider.length) {
      nSlider.owlCarousel({
        loop:true,
        nav:true,
        navText: ["",""],
        dots:false,
        autoplay:true,
        autoplayTimeout:5000,
        smartSpeed:1300,
        lazyLoad:true,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            400:{
                items:2
            },
            992:{
                items:3
            }
        }
    })
  }
}


// shop price ranger
function priceRanger () {
  if ($('.price-ranger').length) {
    $( '.price-ranger #slider-range' ).slider({
      range: true,
      min: 0,
      max: 1200,
      values: [ 99, 1035 ],
      slide: function( event, ui ) {
        $( '.price-ranger .ranger-min-max-block .min' ).val( '$' + ui.values[ 0 ] );
        $( '.price-ranger .ranger-min-max-block .max' ).val( '$' + ui.values[ 1 ] );
      }
    });
      $( '.price-ranger .ranger-min-max-block .min' ).val( '$' + $( '.price-ranger #slider-range' ).slider( 'values', 0 ) );
    $( '.price-ranger .ranger-min-max-block .max' ).val( '$' + $( '.price-ranger #slider-range' ).slider( 'values', 1 ) );        
  };  
}


// Scroll to top
function scrollToTop () {
  var scrollTop = $ (".scroll-top")
  if (scrollTop.length) {

    //Check to see if the window is top if not then display button
    $(window).on('scroll', function (){
      if ($(this).scrollTop() > 200) {
        scrollTop.fadeIn();
      } else {
        scrollTop.fadeOut();
      }
    });
    
    //Click event to scroll to top
      scrollTop.on('click', function() {
      $('html, body').animate({scrollTop : 0},1500);
      return false;
    });
  }
}

// Remove HTML Margin
function removeHtmlMargin() {
  $('html').css('margin-top','0px !important');
  $('html').addClass('no-margin-top');
}

//Contact Form Validation
function contactFormValidation () {
  var activeform = $(".form-validation");
  if(activeform.length){
      activeform.validate({ // initialize the plugin
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          message: {
            required: true
          },
          phone: {
            required: true
          }
        },
      submitHandler: function(form) {
                $(form).ajaxSubmit({
                    success: function() {
                        $('.form-validation :input').attr('disabled', 'disabled');
                        activeform.fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#alert-success').fadeIn();
                        });
                    },
                    error: function() {
                        activeform.fadeTo( "slow", 1, function() {
                            $('#alert-error').fadeIn();
                        });
                    }
                });
            }
        });
  }
}

// Close suddess Alret
function closeSuccessAlert () {
  var closeButton = $ (".closeAlert");
  if(closeButton.length) {
      closeButton.on('click', function(){
        $(".alert-wrapper").fadeOut();
      });
      closeButton.on('click', function(){
        $(".alert-wrapper").fadeOut();
      })
  }
}


// Sticky header
function stickyHeader () {
  var sticky = $('.charity-header'),
      scroll = $(window).scrollTop();

  if (sticky.length) {
    if (scroll >= 190) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
    
  };
}



// Accordion panel
function themeAccrodion () {
  if ($('.theme-accordion > .panel').length) {
    $('.theme-accordion > .panel').on('show.bs.collapse', function (e) {
          var heading = $(this).find('.panel-heading');
          heading.addClass("active-panel");
          
    });
    
    $('.theme-accordion > .panel').on('hidden.bs.collapse', function (e) {
        var heading = $(this).find('.panel-heading');
          heading.removeClass("active-panel");
          //setProgressBar(heading.get(0).id);
    });

    $('.panel-heading a').on('click',function(e){
        if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
            e.stopPropagation();
        }
    });

  };
}

// Mixitup gallery
function mixitupGallery () {
  if ($("#mixitUp-item").length) {
    $("#mixitUp-item").mixItUp()
  };
}

// Event Slider
function eventSlider () {
  var nSlider = $ (".related-event-slider");
  if(nSlider.length) {
      nSlider.owlCarousel({
        loop:true,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:5000,
        smartSpeed:1300,
        lazyLoad:true,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            }
        }
    });
  }
}

// DOM ready function
jQuery(document).on('ready', function() {
	(function ($) {
	 removePlaceholder ();
     searchBox ();
     themeMenu ();
     wowAnimation ();
     FancypopUp ();
     CounterNumberChanger ();
     partnersLogo ();
     bootstrapProgress ();
     causeSlider ();
     donateAmount ();
     productSlider ();
     priceRanger ();
     scrollToTop ();
     contactFormValidation ();
     closeSuccessAlert ();
     themeAccrodion ();
     mixitupGallery ();
	 removeHtmlMargin ();
	 eventSlider ();
  })(jQuery);
});


// Window load function
jQuery(window).on('load', function () {
   (function ($) {
		  prealoader ();
      roundCircleProgress ();
	  removeHtmlMargin ();
  })(jQuery);
 });
 
$('.jolly_like_it').click(function(e) {
	   
	 e.preventDefault();
	 
	 var opt = {subaction:'likeit', data_id:$(this).attr('data-id')};
	 bunch_theme.likeit( opt, this );
	 
	 return false;
});/**like end*/


// Window scroll function
jQuery(window).on('scroll', function () {
  (function ($) {
    stickyHeader ();
  })(jQuery);
});
})(window.jQuery);