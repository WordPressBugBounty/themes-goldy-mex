<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy-mex
 */

get_header();

?>

	<main id="primary" class="site-main <?php echo esc_attr(get_theme_mod('goldy_mex_container_page_layout','content_boxed')); 

?>">
		<?php if(get_theme_mod('goldy_mex_blog_title','Blog')){ ?>
			<div class="blog_main_title heading_main_title wow fadeInUp">
				<h2><?php echo esc_html(get_theme_mod('goldy_mex_blog_title','Blog')); ?></h2>
			</div>
		<?php } ?>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			<div class="main_containor <?php echo esc_attr(get_theme_mod('goldy_mex_container_blog_layout','grid_view')); ?>">
				<?php	
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
			</div>
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
