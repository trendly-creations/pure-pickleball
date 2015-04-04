(function(jQuery) {
 "use strict"
	
// OWL Carousel
	jQuery("#owl-testimonial").owlCarousel({
		items : 1,
		lazyLoad : true,
		navigation : false,
		autoPlay: true
    });

	jQuery("#owl-testimonial-widget, #owl-blog").owlCarousel({
		items : 1,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		autoPlay: false
    });
	
	
	
	jQuery("#owl_blog_three_line, #owl_portfolio_two_line, #owl_blog_two_line").owlCarousel({
		items : 2,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		autoPlay: true
    });
	
	jQuery("#owl_shop_carousel.owl-carousel4, #owl_shop_carousel.owl-carousel4, #owl_bestselling_carousel").owlCarousel({
		items : 4,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		autoPlay: false
    });

	jQuery("#owl_shop_carousel, #owl_shop_carousel_1").owlCarousel({
		items : 3,
		lazyLoad : true,
		navigation : true,
		pagination : false,
		autoPlay: false
    });
	
	
	
	jQuery("#services").owlCarousel({
		items : 3,
		lazyLoad : true,
		navigation : false,
		pagination : true,
		autoPlay: false
    });
	
	jQuery("#brands").owlCarousel({
		items : 6,
		lazyLoad : true,
		navigation : false,
		pagination : true,
		autoPlay: true
    });
	
	jQuery(".buddy_carousel").owlCarousel({
		items : 9,
		lazyLoad : true,
		navigation : false,
		pagination : true,
		autoPlay: true
    });
	

	jQuery('.buddy_tooltip').popover({
		container: '.buddy_carousel, .buddy_members'
	});
		
// Parallax
	jQuery(window).bind('body', function() {
		parallaxInit();
	});
	function parallaxInit() {
		jQuery('#one-parallax').parallax("30%", 0.1);
		jQuery('#two-parallax').parallax("30%", 0.1);
		jQuery('#three-parallax').parallax("30%", 0.1);
		jQuery('#four-parallax').parallax("30%", 0.4);
		jQuery('#five-parallax').parallax("30%", 0.4);
		jQuery('#six-parallax').parallax("30%", 0.4);
		jQuery('#seven-parallax').parallax("30%", 0.4);
	}

 
// Fun Facts
	function count(jQuerythis){
		var current = parseInt(jQuerythis.html(), 10);
		current = current + 1; /* Where 50 is increment */
		
		jQuerythis.html(++current);
			if(current > jQuerythis.data('count')){
				jQuerythis.html(jQuerythis.data('count'));
			} else {    
				setTimeout(function(){count(jQuerythis)}, 50);
			}
		}        
		
		jQuery(".stat-count").each(function() {
		  jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
		  jQuery(this).html('0');
		  count(jQuery(this));
	});
	
// WOW
	new WOW(
		{ offset: 300 }
	).init();
		
// DM Top
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 1) {
			jQuery('.dmtop').css({bottom:"25px"});
		} else {
			jQuery('.dmtop').css({bottom:"-100px"});
		}
	});
	jQuery('.dmtop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
	
// Rotate Text
	jQuery(".rotate").textrotator({
		animation: "flipUp",
		speed: 2300
	});


	
// TOOLTIP
    jQuery('.social-icons, .bs-example-tooltips, .tooltips').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
    })
	
// Accordion Toggle Items
   var iconOpen = 'fa fa-minus',
        iconClose = 'fa fa-plus';

    jQuery(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function (e) {
        var jQuerytarget = jQuery(e.target)
          jQuerytarget.siblings('.accordion-heading')
          .find('em').toggleClass(iconOpen + ' ' + iconClose);
          if(e.type == 'show')
              jQuerytarget.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
          if(e.type == 'hide')
              jQuery(this).find('.accordion-toggle').not(jQuerytarget).removeClass('active');
    });

// Target your .container, .wrapper, .post, etc.
    jQuery("body").fitVids();




// Change click function on the featured products to navigate to 
    jQuery(".cms-jollyany-home .shop_item").click(function (e){
    	e.preventDefault();
    	var title = jQuery(this).find('.shop_title a');
    	window.location = title.attr('href');
    });
	
})(jQuery);
