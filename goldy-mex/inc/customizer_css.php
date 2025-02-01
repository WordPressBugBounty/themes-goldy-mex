<?php
function goldy_mex_customize_css(){
	if(get_theme_mod( 'goldy_enable_animation',true ) == ''){
    	?>
		<style>	
		.wow{
	        animation-name: none !important;
	    }
		</style>
		<?php
    }
    if(get_theme_mod('goldy_enable_loader_option',false) == ''){
    	?>
		<style>	
			.goldy-reload-content {
				display: none;
			}
		</style>
		<?php
    }
    if(get_theme_mod('footer_bg_section')){
    	?>
		<style>	
		footer#colophon.site-footer {			
    		background:url(<?php echo  esc_attr(get_theme_mod('footer_bg_section'));?>) rgb(0 0 0 / 0.75) !important;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }
    if(get_theme_mod( 'goldy_mex_container_containe',true ) == ''){
    	?>
		<style type="text/css">
	    	.blog .goldy_mex_container_data {
			    display: none;
			}
	    </style>
        <?php
    }  
    if(get_theme_mod( 'goldy_mex_container_description',true ) == ''){
    	?>
		<style type="text/css">
	    	.blog article .entry-content {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'goldy_mex_container_date',true ) == ''){
    	?>
		<style type="text/css">
	    	span.posted-on {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'goldy_mex_container_authore',false ) == ''){
    	?>
		<style type="text/css">
			span.byline {
				display: none;
			}
		 </style>
        <?php
    }
    if(get_theme_mod( 'goldy_mex_container_category',true ) == ''){
    	?>
		<style type="text/css">
			span.cat-links {
				display: none;
			}
		 </style>
        <?php
    } 
    if(get_theme_mod( 'goldy_mex_container_comments',false ) == ''){
    	?>
		<style type="text/css">
			span.comments-link {
				display: none;
			}
		 </style>
        <?php
    }   
    if(get_theme_mod( 'display_sticky_header',true )== ''){
    	?>
		<style type="text/css">
			.main_site_header.is-sticky-menu {
			    display: none;
			    background-color: #F66C5E;
			    color: #ffffff;
			}
		 </style>
        <?php
    }   
    if(get_theme_mod( 'silvery_sidebar_post_width'.get_post_type(),'30')){
    	$secondary_width = get_theme_mod('silvery_sidebar_post_width'.get_post_type(),'30');
		$primary_width   = absint( 100 - $secondary_width );
		?>
		<style type="text/css">
			aside.widget-area{
				width: <?php echo esc_attr($secondary_width);?>%;
			}
			main#primary{
				width: <?php echo esc_attr($primary_width);?>%;
				background: #eeeeee;
			}
		</style>
		<?php
	}
	
	?>
		<style type="text/css">
			.top_bar_info .header_topbar_info .header_logo .site-title a {
			    color: <?php echo esc_attr(get_theme_mod('header1_top_bar_sitetitle_color','#214462')); ?>;
			}
			.main_site_header .sub-menu a:hover {
			    transform: translateX(8px);
			    transition-duration: 0.3s;
			}

		</style>
		<?php
	
	if(get_theme_mod( 'goldy_mex_header_width_layout','content_width') == 'content_width'){
		?>
		<style type="text/css">
			.header_info {
				max-width: <?php echo esc_attr(get_theme_mod('goldy_mex_header_container_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'goldy_mex_top_bar_width_layout','content_width') == 'content_width'){
		?>
		<style type="text/css">
			.header_topbar_info {
				max-width: <?php echo esc_attr(get_theme_mod('goldy_mex_top_bar_container_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'goldy_mex_container_page_layout','content_boxed') == 'content_boxed'){
		?>
		<style type="text/css">
			.main_container {
			    padding: 10px;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'goldy_mex_breadcrumb_bg_image')){
		?>
		<style type="text/css">
			.breadcrumb_info{
				background: url(<?php echo esc_attr(get_theme_mod('goldy_mex_breadcrumb_bg_image'))?>) rgb(0 0 0 / 0.75);
			}
		</style>
		<?php
	}
	if(get_post_meta(get_the_ID(),'goldy_mex_breadcrumb_select',true)=='no'){
		?>
		<style>			
			.breadcrumb_info{
			    display: none;
			}	   
		</style>
		<?php
	}
	if(get_theme_mod( 'display_scroll_button',true) == ''){
		?>
		<style>			
			.scrolling-btn {
    			display: none;
			}	   
		</style>
		<?php
	}
	if(get_theme_mod('featuredimage_slider_enable','disable') == 'disable'){
		?>
		<style>			
			.featured-section_data {
			    /*margin-top: 1.25rem;*/
    		}   
		</style>
		<?php
	}		
	if(get_theme_mod('our_testimonial_background_image')){
    	?>
		<style>	
		.our_testimonial_section {			
    		background:url(<?php echo  esc_attr(get_theme_mod('our_testimonial_background_image'));?>) rgb(0 0 0 / 0.75) !important;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }
    if(get_theme_mod('goldy_mex_our_sponsors_background_image')){
    	?>
		<style>	
		.our_sponsors_section {			
    		background:url(<?php echo  esc_attr(get_theme_mod('goldy_mex_our_sponsors_background_image'));?>) rgb(0 0 0 / 0.75) !important;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }
    if(get_theme_mod('goldy_mex_our_services_background_image')){
    	?>
		<style>	
		.services_section {			
    		background:url(<?php echo  esc_attr(get_theme_mod('goldy_mex_our_services_background_image'));?>) rgb(0 0 0 / 0.75) !important;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }
    if(get_theme_mod('goldy_mex_container_page_layout','content_boxed') == 'boxed_layout'){
    	?>
		<style>	
    	.call_button_info, .breadcrumb_data, .goldy_mex_container_info.boxed_layout, .goldy_mex_container_info.content_boxed, .featured_section_info, .about_data, .our_portfolio_data, .our_team_info, .our_testimonial_info, .our_services_info, .our_sponsors_info, .widget_section, .goldy_mex_widget_section, .services_section_info, .fitness_class_data, .pricing_plan_section_info, .goldy_funfact_section_info {
		    max-width: <?php echo esc_attr(get_theme_mod('goldy_mex_container_width','1100')); ?>px;
		    margin-left: auto;
		    margin-right: auto;
		}
		</style>
		<?php
    }
    if(get_theme_mod('goldy_mex_container_page_layout','content_boxed') == 'content_boxed'){
    	?>
		<style>	
    	.call_button_info, .breadcrumb_data, .goldy_mex_container_info.boxed_layout, .goldy_mex_container_info.content_boxed, .featured_section_info, .our_portfolio_data, .our_team_info, .our_testimonial_info, .our_services_info .widget_section, .goldy_mex_widget_section, .services_section_info, .fitness_class_data, .pricing_plan_section_info, .goldy_funfact_section_info {
		    max-width: <?php echo esc_attr(get_theme_mod('goldy_mex_container_width','1100')); ?>px;
		    margin-left: auto;
		    margin-right: auto;
		}
		</style>
		<?php
    }
    if(get_theme_mod('goldy_mex_footer_width_layout','content_width')=='content_width'){
		?>
		<style>
			footer#colophon .site-info, footer#colophon .container_footer {
			    max-width: <?php echo esc_attr(get_theme_mod('goldy_mex_footer_container_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
    if(get_theme_mod('about_bg_image','')){
    	?>
		<style>	
    		.about_section_info{
    			background:url(<?php echo  esc_attr(get_theme_mod('about_bg_image'));?>) rgb(0 0 0 / 0.75);
    			background-position: <?php echo esc_attr(get_theme_mod('goldy_mex_about_bg_position','center center')); ?>;
	    		background-size: <?php echo esc_attr(get_theme_mod('goldy_mex_about_bg_size','cover')); ?>;
	    		background-attachment: <?php echo esc_attr(get_theme_mod('goldy_mex_about_bg_attachment','fixed')); ?>;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }
    if(get_theme_mod('featured_section_bg_image','')){
    	?>
		<style>	
    		.featured-section_data{
    			background:url(<?php echo  esc_attr(get_theme_mod('featured_section_bg_image'));?>) rgb(0 0 0 / 0.75) !important;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }
    if(get_theme_mod('our_portfolio_bg_image','')){
    	?>
		<style>	
    		.our_portfolio_info{
    			background:url(<?php echo  esc_attr(get_theme_mod('our_portfolio_bg_image'));?>) rgb(0 0 0 / 0.75) !important;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }
    if(get_theme_mod('our_team_bg_image','')){
    	?>
		<style>	
    		.our_team_section{
    			background:url(<?php echo  esc_attr(get_theme_mod('our_team_bg_image'));?>) rgb(0 0 0 / 68%) !important;
	    		background-blend-mode: multiply;
    		}
		</style>
		<?php
    }
  	if(get_theme_mod('goldy_funfact_section_bg_image')){
  		$goldy_funfact_section_bg_color=esc_attr(get_theme_mod('goldy_funfact_section_bg_color'));
  		if($goldy_funfact_section_bg_color==''){
  			$goldy_funfact_section_bg_color = 'rgba(10, 10, 10, 0.7)';
  		}
    	?>
		<style>	
		.goldy_mex_funfact_section {			
    		background:url(<?php echo  esc_attr(get_theme_mod('goldy_funfact_section_bg_image'));?>)  <?php echo esc_attr($goldy_funfact_section_bg_color);?>!important;
    		background-blend-mode: multiply;
		}
		</style>
		<?php
    }
	?>
	<style>	
		.goldy_mex_container_info.no_sidebar main#primary{
			width: auto;
		}
		.blog main.site-main.content_boxed .main_containor.grid_view article{
			background: <?php echo esc_attr(get_theme_mod('goldy_mex_content_boxed_bg_color','#ffffff')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('goldy_mex_content_boxed_border_radius','8')); ?>px;
		}
		.blog main#primary {
		    background: none;
		    border-radius: none;
		}
		.call_menu_btn{
			background-color: <?php echo esc_attr(get_theme_mod('goldy_mex_callmenu_btn_bg_color','#ffffff')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('goldy_mex_callmenu_btn_color','#273641')); ?> !important;
		    border: 2px solid <?php echo esc_attr(get_theme_mod('goldy_mex_call_btn_border_color','#273641')); ?>;
		}
		.call_menu_btn:hover {
			background-color: <?php echo esc_attr(get_theme_mod('goldy_mex_callmenu_btn_bghover_color','#273641')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('goldy_mex_call_btn_texthover_color','#ffffff')); ?> !important;
		}
		aside.widget-area section h2, aside.widget-area section h1, aside.widget-area section h3, label.wp-block-search__label {
			padding: 10px;
			margin: 0px;
		}			
		button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled {

			padding: 8px 15px;
		    position: relative;
		    overflow: hidden;
		    font-size: 15px;
		    font-weight: 500;
		    z-index: 99;
		    display: inline-block;
		}
		/*button:hover, input[type="button"]:hover , input[type="reset"]:hover , input[type="submit"]:hover , .wp-block-search .wp-block-search__button:hover, .nav-previous a:hover, .buttons:hover, .nav-next a:hover, .woocommerce a.button:hover, .woocommerce button:hover, .woocommerce .single-product button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt.disabled:hover {		

		    border: none;
		}*/
		/*button::before, input[type="button"]::before, input[type="reset"]::before, input[type="submit"]::before, .wp-block-search .wp-block-search__button::before, .wp-block-search .wp-block-search__button::after, .nav-previous a::before, .nav-next a::before,.buttons::before, .buttons::after ,.woocommerce a.button::before, .woocommerce button::before, .woocommerce .single-product button::before, .woocommerce button.button.alt::before, .woocommerce a.button.alt::before,.woocommerce button.button.alt.disabled::before {

			border-color: #fdb1aa !important;
		}*/

		.featured_content{
			    display: grid;
			    grid-template-columns: repeat(<?php echo esc_attr(get_theme_mod('featured_section_item_limit','3'));?>, 1fr);
			    grid-column-gap :<?php echo esc_attr(get_theme_mod('featured_section_item_limit','20'));?>px !important;
		}

		.main_containor.grid_view{
			    display: grid;
			    grid-template-columns: repeat(<?php echo esc_attr(get_theme_mod('goldy_mex_container_grid_view_col','3'));?>, 1fr);
			    grid-column-gap :<?php echo esc_attr(get_theme_mod('goldy_mex_container_grid_view_col_gap','20'));?>px !important;
		}

		.featured_section_info .featured_content .featured-thumbnail i {
		    transition: all .5s ease 0s;
		}
		
		/*--------------------------------------------------------------
		# featured slider
		--------------------------------------------------------------*/
		
		
		.featured_slider_image .owl-nav button:before{
			content: unset !important; 
		}

		/*--------------------------------------------------------------
		# featured section #273641
		--------------------------------------------------------------*/
		.featured-section_data .section-featured-wrep:hover i { 
    		transform: rotate(360deg);
		}
		/*--------------------------------------------------------------
		# about section
		--------------------------------------------------------------*/

		.about_section_info .about_main_discription p{
			line-height: 160%;
		}

		/*--------------------------------------------------------------
		# our testimonial
		--------------------------------------------------------------*/

		.our_testimonial_section .our_testimonial_info .testinomial_owl_slider .our_testimonial_data_info{
		    padding: 30px;
		    /*padding-right: 70px;
    		padding-left: 70px;*/
		}
		.our_testimonial_section .owl-nav button:before{
			content: unset !important; 
		}
		.our_testimonial_section .testinomial_owl_slider .testimonials_title h3{		
			margin: 0;
    		margin-bottom: 5px;
    		font-size: 20px;
    		font-weight: 600;
		}
		.our_testimonial_section .testinomial_owl_slider .testimonials_title h4{	
			margin: 0;
    		margin-bottom: 5px;
    		font-size: 16px;
		    padding-left: 12px;
		    margin-left: 12px;
		    line-height: 1.2;
		    border-left: 1px solid rgba(0,0,0,.4);
		}

		/*--------------------------------------------------------------
		# footer 
		--------------------------------------------------------------*/
	
	</style>
	<?php
	if (!class_exists('WooCommerce'))  return;
    //if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if(is_product() || is_shop() || is_cart() || is_checkout()){
			if(empty(get_post_meta(get_the_ID(),'sidebar_select',true))){
		        ?>
		        <style> 
			        aside.widget-area{
			            display: none;
			        }
			        main#primary {
					    width: 100% !important;
					}
		        </style>
		        <?php
		    }
	    }
	//}
}
add_action( 'wp_head', 'goldy_mex_customize_css');