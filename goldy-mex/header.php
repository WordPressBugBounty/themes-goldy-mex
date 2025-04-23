<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goldy-mex
 */

global $goldy_mex_default, $goldy_mex_themetype;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php

if($goldy_mex_themetype['pluginactive']=='yes'){
	$body_class_added='slivery_active';
}else{
	$body_class_added='slivery_notactive';
}

?>
<body <?php body_class($body_class_added); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'goldy-mex' ); ?></a>
		<header id="masthead" class="site-header <?php echo esc_attr(get_theme_mod( 'goldy_mex_header_layout'));?>">
			<div class="goldy-reload-content">
			    <div class="loading-overlay">
			        <img src="<?php echo esc_attr(get_theme_mod('goldy_loader_image', get_theme_file_uri('assets/images/loader.gif'))) ?>">
			    </div>
			</div>
			<?php if ( is_plugin_active('slivery-extender/slivery-extender.php') ) {?>
			<div class="top_bar_info">
				<?php
					goldy_mex_social_section();
				?>
			</div>
			<?php } ?>
			<div class="main_site_header">
				<?php 	
					do_action('goldy_main_header_loop',$goldy_mex_default);
				?>
			</div>
		</header><!-- #masthead -->	
			
		<?php if($goldy_mex_themetype['pluginactive']=='yes'){?>
	<?php echo esc_attr(goldy_mex_breadcrumb_sections());}
	
	if ( is_front_page() ) {

			if ( is_plugin_active('slivery-extender/slivery-extender.php') ) {
				?>
				<div class="theme_section_info">
					<?php 
						$goldy_mex_diseble = get_theme_mod( 'goldy_mex_diseble' );
						$goldy_mex_diseble_array =  explode(",",$goldy_mex_diseble);

						$glodly_ordring = get_theme_mod( 'globalddd_ordering' );
						$glodly_sortable =  explode(",",$glodly_ordring);

						/*$orderarr = array('goldy_mex_featuredimage_slider','goldy_mex_our_portfolio_section','goldy_mex_widget_section','goldy_mex_about_section','goldy_mex_featured_section','goldy_mex_appointment_section','goldy_mex_our_team_section','goldy_mex_our_testimonial_section','goldy_mex_our_sponsors_section','goldy_mex_services_section');*/
						
						$orderarr = $goldy_mex_themetype['global_ordering_default'];

						$orderarr = apply_filters('goldy_mex_order_settings', $orderarr);
						$global_ordering_array = get_theme_mod( 'global_ordering',$orderarr );
						?>
						<?php
						if(!empty($glodly_ordring)){
							foreach ($glodly_sortable as $glodly_sortables => $glodly_sortable_value) { 
								if(!in_array( $glodly_sortable_value, $goldy_mex_diseble_array)){
									call_user_func($glodly_sortable_value);
								}		
							}
						}elseif(!empty($global_ordering_array)){
							foreach ($global_ordering_array as $global_ordering_arraydd) { 
								if(!in_array( $global_ordering_arraydd, $goldy_mex_diseble_array)){
									call_user_func($global_ordering_arraydd);
								}		
							}
						}
							
					?>
				</div>
				<?php
		}else { ?>
			<div class="theme_section_info">
				<?php 
					$goldy_mex_diseble = get_theme_mod( 'goldy_mex_diseble' );
					$goldy_mex_diseble_array =  explode(",",$goldy_mex_diseble);

					$glodly_ordring = get_theme_mod( 'globalddd_ordering' );
					$glodly_sortable =  explode(",",$glodly_ordring);

					$orderarr = $goldy_mex_themetype['global_ordering_default'];
					// $orderarr = array('goldy_mex_featuredimage_slider','goldy_mex_featured_section','goldy_mex_our_sponsors_section');
					
					$orderarr = apply_filters('goldy_mex_order_settings', $orderarr);
					$global_ordering_array = get_theme_mod( 'global_ordering',$orderarr );
					?>
					<?php
						if(!empty($glodly_ordring)){
							foreach ($glodly_sortable as $glodly_sortables => $glodly_sortable_value) { 
								if(!in_array( $glodly_sortable_value, $goldy_mex_diseble_array)){
									call_user_func($glodly_sortable_value);
								}		
							}
						}elseif(!empty($global_ordering_array)){
							foreach ($global_ordering_array as $global_ordering_arraydd) { 
								if(!in_array( $global_ordering_arraydd, $goldy_mex_diseble_array)){
									call_user_func($global_ordering_arraydd);
								}		
							}
						}
					?>
			</div>
			<?php
		}
	}

?>
	<div class="goldy_mex_container_data">
		<?php
		if(get_post_meta(get_the_ID(),'sidebar_select',true)){
			?>
			<div class="goldy_mex_container_info <?php echo esc_attr(get_post_meta(get_the_ID(),'sidebar_select',true));?> <?php echo esc_attr(get_theme_mod( 'goldy_mex_container_blog_layout','grid_view'));?> <?php echo esc_attr(get_theme_mod( 'goldy_mex_container_page_layout','content_boxed'));?>">
				<?php
		}else{
		?>
		<div class="goldy_mex_container_info <?php echo esc_attr(get_theme_mod( 'sidebar_post_layout'.get_post_type(),'right_sidebar'));?> <?php echo esc_attr(get_theme_mod( 'goldy_mex_container_blog_layout','grid_view'));?> <?php echo esc_attr(get_theme_mod( 'goldy_mex_container_page_layout','content_boxed'));?>">
<?php }