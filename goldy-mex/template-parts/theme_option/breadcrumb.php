<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */

if(get_theme_mod('goldy_mex_display_breadcrumb_section',true) != ''){
	goldy_mex_breadcrumb_slider();
}elseif(get_post_type()){	
	if(get_post_meta(get_the_ID(),'goldy_mex_breadcrumb_select',true) == 'yes'){
		goldy_mex_breadcrumb_slider();
	}
}