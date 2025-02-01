<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */
global $goldy_mex_default;
if(empty(get_theme_mod( 'goldy_mex_funfact_section_content')) && !is_plugin_active('slivery-extender/slivery-extender.php')){?>
<?php
}else{
$goldy_mex_funfact_section = Kirki::get_option( 'goldy_mex_funfact_section_content' );
if(empty($goldy_mex_funfact_section)){
    $goldy_mex_funfact_section  = Kirki::get_option( 'goldy_mex_funfact_section_content' );
}
?>
<div class="goldy_mex_funfact_section">
	<div class="goldy_funfact_section_info">
		<?php if(!empty(Kirki::get_option( 'goldy_funfact_section_main_title' ))) { ?>
			<div class="funfact_section_title heading_main_title wow fadeInUp">
				<h2><?php echo esc_html(Kirki::get_option( 'goldy_funfact_section_main_title' )); ?></h2>
			</div>
		<?php } ?>	
		<?php if(!empty(Kirki::get_option( 'goldy_funfact_section_description' ))) { ?>
		<div class="funfact_section_discription wow fadeInUp">
			<p><?php echo wp_kses_post(Kirki::get_option('goldy_funfact_section_description' )); ?></p>
		</div>
		<?php } ?>	
		<div class="goldy_mex_funfact_section_data">
			<div class="funfact_content_inner">
				<?php 
					foreach ( $goldy_mex_funfact_section as $info_item ) { 
						do_action('goldy_funfact_section_loop',$info_item);
					}
				?>
			</div>
		</div>
	</div>
</div>	
<?php  }