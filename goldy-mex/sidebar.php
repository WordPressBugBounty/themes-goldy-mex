<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goldy-mex
 */

if ( ! is_active_sidebar( 'goldy_mex_sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'goldy_mex_sidebar-1' ); ?>
</aside><!-- #secondary -->
