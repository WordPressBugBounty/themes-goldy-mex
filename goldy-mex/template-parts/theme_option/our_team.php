<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */
global $goldy_mex_default;
$our_team  = get_theme_mod( 'goldy_mex_our_team_content',$goldy_mex_default['options']['goldy_mex_our_team_content']);
if(empty($our_team)){
	$our_team  = $goldy_mex_default['options']['goldy_mex_our_team_content'];
}
	?>
		<div class="our_team_section">
			<div class="our_team_info scroll-element js-scroll fade-in-bottom">
				<div class="our_team_main_title wow fadeInUp">
					<?php
					if(!empty(get_theme_mod( 'goldy_mex_our_team_main_title',$goldy_mex_default['options']['goldy_mex_our_team_main_title']))){
						?>
					<div class="our_team_tit heading_main_title">
						<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_our_team_main_title',$goldy_mex_default['options']['goldy_mex_our_team_main_title'])); ?></h2>
					</div>
					<?php } ?>
					<div class="our_team_main_disc">
						<p><?php echo wp_kses_post(get_theme_mod( 'goldy_mex_our_team_desc',$goldy_mex_default['options']['goldy_mex_our_team_desc']));?></p>
					</div>
				</div>
				<div class="our_team_data">
					<?php 
					foreach ( $our_team as $info_item ) {
						// echo "<pre>";
						// print_r($info_item);
						// echo "<pre>";
								
						?>
						<div class="our_team_container wow animate__zoomIn" data-wow-duration="1s">	
							<?php 
								do_action('goldy_our_team_loop',$info_item);
							?>
						</div>
						<?php
						} 
					?>
				</div>
			</div>
		</div>