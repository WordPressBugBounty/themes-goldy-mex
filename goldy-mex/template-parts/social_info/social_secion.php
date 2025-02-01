<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */
global $goldy_mex_default;
// $number = get_theme_mod( 'silvary_contact_info_number',$goldy_mex_default);
// echo "<pre>";
// print_r($number);
// echo "</pre>";
?>
<div class="header_topbar_info goldy_mob_topbar_info">
<?php
if ( is_plugin_active('slivery-extender/slivery-extender.php') ) {?>
	<?php  
		do_action("goldy_header_topbar_loop",$goldy_mex_default);
	?>
	
	
<?php } ?>
</div>