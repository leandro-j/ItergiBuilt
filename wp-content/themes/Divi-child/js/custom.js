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
	
});

jQuery(window).load(function(){
	jQuery("body").find('li.menu-item-has-children > a').after('<span class="sub-menu-toggle"></span>');
	
	//jQuery("body #main-header .mobile_nav #mobile_menu li.menu-item-has-children > a").next().append('<span class="arrow"><i></i></span>');
   // jQuery("body #main-header .mobile_nav #mobile_menu > li.menu-item-has-children > .sub-menu > .menu-item-has-children > a").next().append('<span class="arrow"><i class="fa fa-chevron-down"></i></span>');
});

