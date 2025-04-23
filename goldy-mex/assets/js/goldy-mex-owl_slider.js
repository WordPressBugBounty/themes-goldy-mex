jQuery(document).ready(function() {
	// console.log("ready !");
	
	if(main_vars.goldy_mex_img_autoplay === 'true'){
		var img_auto=true;		
	}else{
		var img_auto=false;
	}


	var img_autospeed = main_vars.goldy_mex_img_autoplayspped;
	var img_autotime = main_vars.goldy_mex_img_autoplaytime;   
	jQuery('.featuredimage_slider').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
	    	navigation : true, // Show next and prev buttons 
	    	loop: true,	
		    slideSpeed : 300,
		    paginationSpeed : 400,	 
		    items : 1, 
		    itemsDesktop : false,
		    itemsDesktopSmall : false,
		    itemsTablet: false,
		    itemsMobile : false,
		    nav: true,
		    autoplay: img_auto,
	        autoplaySpeed: img_autospeed,
	        autoplayTimeout: img_autotime,
	    	navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		});
	});

	if(main_vars.goldy_mex_testimonial_autoplay === 'true'){
		var auto=true;		
	}else{
		var auto=false;
	}


	var autospeed = main_vars.goldy_mex_testimonial_autoplayspped;   
	var autotime = main_vars.goldy_mex_testimonial_autoplaytime;   

	jQuery('.testinomial_owl_slider').each(function() {
		var dekstopnumber = jQuery(this).attr("desktop-num");
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
		//jQuery('#testinomial_owl_slider').owlCarousel({
	    	navigation : true, // Show next and prev buttons 
	    	loop: true,	
		    slideSpeed : 300,
		    paginationSpeed : 400,	 
		    items : 1, 
		    itemsDesktop : false,
		    itemsDesktopSmall : false,
		    itemsTablet: false,
		    itemsMobile : false,
	    	margin:10,
		    autoplay: auto,
	        autoplaySpeed: autospeed,
	        autoplayTimeout: autotime,
	    	responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:dekstopnumber,
		            nav:false
		        }
		    }
		});	
		
	});

	if(main_vars.goldy_mex_sponsors_autoplay === 'true'){
		var sponsors_auto=true;		
	}else{
		var sponsors_auto=false;
	}


	var sponsors_autospeed = main_vars.goldy_mex_sponsors_autoplayspped;   
	var sponsors_autotime = main_vars.goldy_mex_sponsors_autoplaytime;   
	jQuery('.our_sponsors_demo').each(function() {
		jQuery(this).addClass('owl-loaded owl-drag').owlCarousel({
			//jQuery('#testinomial_owl_slider').owlCarousel({
				navigation : true, // Show next and prev buttons 
				loop: true,	
				slideSpeed : 300,
				paginationSpeed : 400,	 
				items : 4, 
				itemsDesktop : false,
				itemsDesktopSmall : false,
				itemsTablet: false,
				itemsMobile : false,
				margin:10,
			    autoplay: sponsors_auto,
		        autoplaySpeed: sponsors_autospeed,
		        autoplayTimeout: sponsors_autotime,
				responsive:{
					0:{
						items:1,
						nav:true
					},
					600:{
						items:4,
						nav:false
					}
				}
			});	
	});
});
