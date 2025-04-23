<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */
global $goldy_mex_default;
if(empty(get_theme_mod( 'goldy_mex_featured_section_content')) && !is_plugin_active('slivery-extender/slivery-extender.php')){?>
<?php
}else{
$featured_section  = get_theme_mod( 'goldy_mex_featured_section_content',$goldy_mex_default['options']['goldy_mex_featured_section_content']);
if(empty($featured_section)){
	$featured_section  = $goldy_mex_default['options']['goldy_mex_featured_section_content'];
}
?>
	<div class="featured-section_data">
		<div class="featured_section_info">
			<?php
			if(!empty(get_theme_mod( 'goldy_mex_featured_section_main_title',$goldy_mex_default['options']['goldy_mex_featured_section_main_title'] ))){
				?>
				<div class="featured-section_title heading_main_title wow fadeInUp">
					<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_featured_section_main_title',$goldy_mex_default['options']['goldy_mex_featured_section_main_title'] )); ?></h2>
				</div>
				<?php
			} 
			?>	
			<div class="featured_section_discription wow fadeInUp">
				<p><?php echo wp_kses_post(get_theme_mod('goldy_mex_featured_section_description',$goldy_mex_default['options']['goldy_mex_featured_section_description'] )); ?></p>
			</div>
		    <div id="featured-section" class="featured-section section scroll-element js-scroll fade-in-bottom">
				<div class="card-container featured_content wow animate__slideInUp">
				<?php 
					foreach ( $featured_section as $info_item ) {
						if(!empty($info_item['link_url'])) {
						?>
						<a class="section-featured-wrep" href="<?php echo $info_item['link_url']; ?>">
							<div class="section-featured-content">
								<div class="featured-thumbnail"> 
									<?php 
										do_action('goldy_featured_section_loop',$info_item);
									?>
								</div>
							</div>
						</a>
						<?php
						} 
					}
				?>
				</div>
			</div>
		</div>
	</div>
	<?php
}