<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */
global $goldy_mex_default;

$our_portfolio  = get_theme_mod( 'goldy_mex_our_portfolio_content',$goldy_mex_default['options']['goldy_mex_our_portfolio_content']);

if(empty($our_portfolio)){
	$our_portfolio  = $goldy_mex_default['options']['goldy_mex_our_portfolio_content'];
}
// $our_portfolio = json_decode( $our_portfolio );
	?>
	<div class="our_portfolio_info" id="our_portfolio_info">
		<div class="our_portfolio_data scroll-element js-scroll fade-in-bottom">
			<?php if(get_theme_mod('goldy_mex_our_portfolio_main_title',$goldy_mex_default['options']['goldy_mex_our_portfolio_main_title'])){
				?>
				<div class="goldy_mex_our_portfolio_main_title heading_main_title wow fadeInUp">
					<h2><?php echo esc_html(get_theme_mod('goldy_mex_our_portfolio_main_title',$goldy_mex_default['options']['goldy_mex_our_portfolio_main_title']));?></h2>
					<span class="separator"></span>
				</div>
				<?php
			} 
			?>
			<div class="our_portfolio_main_disc wow fadeInUp">
				<p><?php echo wp_kses_post(get_theme_mod( 'goldy_mex_our_portfolio_desc',$goldy_mex_default['options']['goldy_mex_our_portfolio_desc']));?></p>
			</div>		
			<div class="wrappers our_portfolio_section wow fadeInLeft">
				<?php 
					foreach ( $our_portfolio as $info_item ) { 
					// echo "<pre>";
					// print_r($info_item);
					// echo "<pre>";
						?>
						<div class="parent our_portfolio_caption">
							<div class="child our_portfolio_image">
								<div class="our_portfolio_container">
									<?php 
										do_action('goldy_our_portfolio_loop',$info_item);
									?>
								</div>
							</div>					
						</div>
						<?php
					}
				//}
				?>
			</div>				
		</div>
	</div>