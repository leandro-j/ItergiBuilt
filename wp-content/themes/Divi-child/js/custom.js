jQuery(document).ready(function() {
 
	jQuery("#owl-demo").owlCarousel({
	navigation : true,
	nav : true,
	dots: false,
	loop:true,
	items:7,
	margin:40,
	autoplay:false,
	smartSpeed:600,
	responsiveClass:true,
    responsive:{
        320:{
            items:1,
            nav:true
        },
		484:{
            items:2,
            nav:true
        },
        640:{
            items:3,
            nav:true
        },
		768:{
            items:4,
            nav:true
        },
        1024:{
            items:5,
            nav:true
        },
		1100:{
			items:6,
			nav:true
		},
		1200:{
			items:7,
			nav:true
		}
    }
	});

	jQuery(".owl-prev").html('');
	jQuery(".owl-next").html('');

	jQuery("body").on('click','#main-header .sub-menu-toggle', function () {       
		jQuery(this).toggleClass('popped');
    });
	

	jQuery('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
		jQuery('.et_pb_toggle_title').click(function(){
			var $toggle = jQuery(this).closest('.et_pb_toggle');
			if (!$toggle.hasClass('et_pb_accordion_toggling')) {
				var $accordion = $toggle.closest('.et_pb_accordion');
				if ($toggle.hasClass('et_pb_toggle_open')) {
					$accordion.addClass('et_pb_accordion_toggling');
					$toggle.find('.et_pb_toggle_content').slideToggle(700, function() { 
					$toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close'); 
				});
			}
			setTimeout(function(){ 
				$accordion.removeClass('et_pb_accordion_toggling'); 
			}, 750);
		}
	});
	

});

jQuery(window).load(function(){
	jQuery("body").find('li.menu-item-has-children > a').after('<span class="sub-menu-toggle"></span>');
	
	
	var distance = jQuery('.scroll_sticky,.main-menu').offset().top,
	$window = jQuery(window);
	jQuery(window).scroll(function(){			
		if ( $window.scrollTop() >= distance  ) {
			jQuery('.scroll_sticky,.main-menu').addClass('fixed-header');
		} else {
			jQuery('.scroll_sticky,.main-menu').removeClass('fixed-header');
		}			
	});
	//jQuery("body #main-header .mobile_nav #mobile_menu li.menu-item-has-children > a").next().append('<span class="arrow"><i></i></span>');
   // jQuery("body #main-header .mobile_nav #mobile_menu > li.menu-item-has-children > .sub-menu > .menu-item-has-children > a").next().append('<span class="arrow"><i class="fa fa-chevron-down"></i></span>');
});

