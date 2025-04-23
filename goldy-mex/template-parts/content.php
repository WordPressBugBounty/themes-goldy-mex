<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog_main_section_info">
	
		<div class="main_container">
			<div class="blog_Feature_image">
				<div class="blog_description_arrow">
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>	
					<a href="<?php echo get_permalink(); ?>"></a>			
				</div>
				<div class="blog_thumbnail_img">
					<div id="custom-bg" >
					     <?php goldy_mex_post_thumbnail(); ?>
					</div>
				</div>
			</div>
			<div class="bolg_main_content">
				<header class="entry-header">
					
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php 
							goldy_mex_posted_on();
							goldy_mex_posted_by();
							goldy_mex_entry_footer();
							?>
						</div>
					<?php endif; ?>
				</header><!-- .entry-header -->	

				<div class="entry-content">
					<?php

					if ( is_search() || ! is_singular() || is_front_page()){
						if(empty(get_theme_mod( 'goldy_mex_excerpt_length', 100 ))){
								the_content();
						}else{
							$content = get_the_excerpt();
							echo substr($content, 0, get_theme_mod( 'goldy_mex_excerpt_length', 100 ))."...";
						}
						
					}else{
						the_content(
							sprintf(
								wp_kses(
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'goldy-mex' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'goldy-mex' ),
								'after'  => '</div>',
							)
						);
					}
					?>
				</div><!-- .entry-content -->

				<?php
					if(get_theme_mod( 'goldy_mex_container_read_more_btn',false) != ''){
					?>
						<div class="read_btn">	
							<a class='read_more buttons btn btn-primary btn-like-icon' href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod( 'goldy_mex_read_more_btn','Continue reading') );?>
							</a>
						</div>
					<?php
					}
				
				?>
			</div>
		</div>
	</div>
	<footer class="entry-footer">
		<?php //goldy_mex_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
