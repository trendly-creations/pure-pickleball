jQuery(document).ready(function($) {

    "use strict";
	
	jQuery('div#gallery_sec').parent().parent().parent().removeClass().addClass('gallery-sec');
	jQuery('div#gallery_style_6').parent().parent().parent().removeClass().addClass('no-space');
    jQuery('.sidebar-tabs').parent().removeClass('widget');
    jQuery('.darked').parent().addClass('dark');
    $('.multimedia-tabs .nav li').click(function() {
        $('.multimedia-tabs .nav li').removeClass('active');
    })

    $('.author-tab-carousal li').click(function() {
            $('.author-tab-carousal li').removeClass('active');
        })
        // responsive header
    $(".responsive-header > span").click(function() {
        $(this).next('ul').slideToggle();
        $(".responsive-header > ul > li > ul").slideUp();
        $(".responsive-header > ul > li > ul > li > ul").slideUp();
        $(".responsive-header > ul > li").removeClass('opened');
        $(".responsive-header > ul > li > ul > li").removeClass('opened');
    });

    $('.responsive-header ul li a').next('ul').parent().addClass('no-link')
    $('.no-link > a').click(function() {
        return false;
    });

    var height = $(".header-style4, .header-style1").height();
    var author = $('div').hasClass('author_bio');
    / FIXED Menu APPEARS ON SCROLL DOWN /
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 30) {
			jQuery(".fix-header").addClass("sticky");
			var clas = jQuery('header').hasClass('sticky');
			if( clas == true )
			{
				jQuery(".header-style4, .header-style1").next("section, div, header").css({
					"margin-top": height
				});
				if( author == true )
				{	jQuery('div.author_bio').css({
						"margin-top": height
					});
				}
			}
        } else {
            $(".fix-header").removeClass("sticky");
			jQuery('div.author_bio').css({
				"margin-top": '0'
			});
			jQuery(".header-style4, .header-style1").next("section, div, header").css({
				"margin-top": '0'
			});
        }
    });

    $(".responsive-header > ul > li > a").click(function() {
        $(".responsive-header > ul > li > ul").slideUp();
        $(".responsive-header > ul > li").removeClass('opened');
        $(this).next('ul').slideDown();
        $(this).next('ul').parent().toggleClass('opened');
    });
    $(".responsive-header > ul > li > ul > li a").click(function() {
        $(".responsive-header > ul > li > ul > li > ul").slideUp();
        $(".responsive-header > ul > li > ul > li").removeClass('opened');
        $(this).next('ul').slideDown();
        $(this).next('ul').parent().toggleClass('opened');
    });
    // end responsive header

    jQuery('body img').each(function() {
        var title = jQuery(this).prop('src');
        var name = title.replace(/^.*\/|\.png$/g, '');
        if (name == 'featured-image-vertical-300x418.jpg') {
            jQuery(this).parent('div').addClass('verticle-img');
        }
    });

    jQuery('.post-desc img').each(function() {
        var title = jQuery(this).attr('title');
        if (title == 'Image Alignment 1200x400') {
            jQuery(this).parent('div').attr('style', '');
            jQuery(this).parent('div').addClass('big_img');
        }
    });

    jQuery('li.li_no_img').parent().parent().parent().parent().addClass('no-image');
    /*** Are You Attending  ***/
    jQuery(".are-you-attending > a").click(function() {
        jQuery(".attending-form").slideToggle();
        jQuery(".attending-form").toggleClass('animated rollIn');
    });

    jQuery('#tab_content > div').eq(0).addClass('fade in active');
    jQuery('ul#tab_contents > li').eq(0).addClass('active');

    $('.multimedia-tabs .nav li').click(function() {
        $('.multimedia-tabs .nav li').removeClass('active');
    })

});

function simple_carousel(selector) {
    jQuery('.' + selector).owlCarousel({
        autoPlay: true,
        stopOnHover: true,
        goToFirstSpeed: 500,
        slideSpeed: 500,
        singleItem: true,
        autoHeight: true,
        transitionStyle: "fade",
        navigation: true,
        pagination: false
    });
}

function carousel(selector) {
    var get_col = jQuery('div#' + selector).parent('div').parent('div').attr('class');
    var col = jQuery.trim(get_col);
    if (col == 'col-md-12 column' || col == 'col-md-11 column') {
        jQuery('div#' + selector).owlCarousel({
            autoPlay: false,
            rewindSpeed: 3000,
            slideSpeed: 2000,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            itemsMobile: [479, 1],
            navigation: true,
        });
    } else if (col == 'col-md-10 column' || col == 'col-md-9 column' || col == 'col-md-8 column') {
        jQuery('div#' + selector).owlCarousel({
            autoPlay: false,
            rewindSpeed: 3000,
            slideSpeed: 2000,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            itemsMobile: [479, 1],
            navigation: true,
        });
    } else if (col == 'col-md-6 column' || col == 'col-md-4 column') {
        jQuery('div#' + selector).owlCarousel({
            autoPlay: false,
            rewindSpeed: 3000,
            slideSpeed: 2000,
            items: 2,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            itemsMobile: [479, 1],
            navigation: true,
        });
    } else if (col == 'col-md-3 column' || col == 'col-md-2 column' || col == 'col-md-1 column') {
        jQuery('div#' + selector).owlCarousel({
            autoPlay: false,
            rewindSpeed: 3000,
            slideSpeed: 2000,
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1],
            itemsMobile: [479, 1],
            navigation: true,
        });
    }
}

function masonery(selector) {
    jQuery(function() {
        var $portfolio = jQuery('#' + selector);
        $portfolio.isotope({
            masonry: {
                columnWidth: 2
            }
        });
    });
}

function masonery2(selector) {
    jQuery(function() {
        var $portfolio = jQuery('.' + selector);
        $portfolio.isotope({
            masonry: {
                columnWidth: 2
            }
        });
    });
}

function pagination_masonery(selector, posts_per_page, sort_by, sorting_order, style, id) {
    jQuery(document).ready(function() {
        var sel = "" + selector + "";
        jQuery(sel).each(function() {
            jQuery('a').attr('href', 'javascript:void(0)');
            jQuery('a').click(function() {
                var current = jQuery(selector).find('span').text().replace('…', '');
                var txt = jQuery(this).text();
                if (txt == 'Next') {
                    txt = ++current;
                } else if (txt == 'Previous') {
                    txt = --current;
                }
                var data = 'id=' + txt + '&number=' + posts_per_page + '&sort=' + sort_by + '&order=' + sorting_order + '&style=' + style + '&action=sh_pagineation_masonery';
                jQuery.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(res) {
                        jQuery('#masonary-blog').empty();
                        jQuery('#masonary-blog').append(res);
                    },
                });
                return false;
            });
            return false;
        });
    });
}

jQuery(window).ready(function() {
    /*** prettyPhoto ***/
    if (jQuery("a[data-rel^='prettyPhoto'], a[rel^='prettyPhoto']").length !== 0) {
        jQuery("a[data-rel^='prettyPhoto'], a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'normal',
            slideshow: 3000,
            autoplay_slideshow: false
        });
    }
});

function display_tweets(tweets) {
    var statusHTML = "";
    jQuery.each(tweets, function(i, tweet) {
        //let's check to make sure we actually have a tweet
        if (tweet.text !== undefined) {
            var username = tweet.user.screen_name;
            //clean things up a bit
            var status = tweet.text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
                return '<a href="' + url + '">' + url + '</a>';
            }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
                return reply.charAt(0) + '<a href="http://twitter.com/' + reply.substring(1) + '">' + reply.substring(1) + '</a>';
            });
            statusHTML = '<li><p>' + status + '<br /> <a href="http://twitter.com/' + username + '/statuses/' + tweet.id_str + '">' + (tweet.created_at) + '</a></p></li>';
            jQuery('.tweet-loader').remove();
            jQuery('.tweets-slides').append(statusHTML);
        }
    });
}


function like_dislike(postid){
		jQuery('a#like_dislike').click(function(){
			var check = jQuery('body a#like_dislike').parent().attr('class');	
			if( check == 'liked' ){
				jQuery(this).parent().addClass('active');
				var data = {
					'action': 'sh_like',
					'postid': postid
				};
				jQuery.post(ajaxurl, data, function(responce) {
					jQuery('a#like_dislike span').empty();
					jQuery('a#like_dislike span').html(responce);
				});
				
				}else{					
					jQuery(this).parent().removeClass('active');
				var data = {
					'action': 'sh_dis_like',
					'postid': postid
				};
				jQuery.post(ajaxurl, data, function(responce) {
					jQuery('a#like_dislike span').empty();
					jQuery('a#like_dislike span').html(responce);
				});
				}
				
			});
	
}

/*jQuery(document).ready(function($) {
	$(function() {
		var $sidebar   = $("aside .fixed-sidebar"), 
			$window    = $(window),
			offset     = $sidebar.offset(),
			topPadding = 15;
	
		$window.scroll(function() {
			if ($window.scrollTop() > offset.top) {
				$($sidebar).addClass('fixed');
				jQuery("aside .fixed-sidebar").css({
					"top": topPadding
				});
			} else {
				$sidebar.stop().animate({
					marginTop: 0
				});
				$($sidebar).removeClass('fixed');
			}
		});
		
	});
});*/