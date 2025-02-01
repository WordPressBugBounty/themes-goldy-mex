<?php
/**
 * goldy-mex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package goldy-mex
 */


include_once( 'inc/kirki/kirki.php' );

add_action('init',"goldy_mex_load_files",99);
function goldy_mex_load_files(){

    if (! function_exists( 'Kirki' )) {
        return;
    }
    
    include_once( 'template-parts/kirki_sections/silvery_global.php' );
    include_once( 'template-parts/kirki_sections/silvery_featured_slider.php' );
    include_once( 'template-parts/kirki_sections/silvery_featured_section.php' );
    include_once( 'template-parts/kirki_sections/silvery_our_sponsors.php' );
    include_once( 'template-parts/kirki_sections/silvery_our_portfolio.php' );
    include_once( 'template-parts/kirki_sections/silvery_about_section.php' );
    include_once( 'template-parts/kirki_sections/silvery_book_an_appoinment.php' );
    include_once( 'template-parts/kirki_sections/silvery_our_team.php' );
    include_once( 'template-parts/kirki_sections/silvery_our_testmonial.php' );
    include_once( 'template-parts/kirki_sections/silvery_our_services.php' );
    include_once( 'template-parts/kirki_sections/silvery_breadcrumb_section.php' );
    include_once( 'template-parts/kirki_sections/silvery_home_page_ordering.php' );
    include_once( 'template-parts/kirki_sections/silvery_funfact_section.php' );
}

// Send Appoinment on Email
function goldy_mex_contant_appoinment(){
 	
 	$admin_emails = get_theme_mod( 'goldy_mex_book_an_appoinment_admin_email' );
 	$appointment_name = $_POST['appointment_name'];
	$appointment_email = $_POST['appointment_email'];
	$appointment_monumber = $_POST['appointment_monumber'];
	$appointment_query = $_POST['appointment_query'];
	$to = $appointment_email;
	$subject = "Thank you for Submission.";
	$content = "Name : ".$appointment_name."\r\n";
	$content .= "Email : ".$appointment_email."\r\n";
	$content .= "Number : ".$appointment_monumber."\r\n";
	$content .= "Query : ".$appointment_query;
	$admin_email = get_option( 'admin_email' );
 	wp_mail($to, $subject, $content);
 	if(!empty($admin_emails)) {
	 	wp_mail($admin_emails, $subject, $content);
	}
 	exit;
 }
add_action( 'wp_ajax_contant_appoinment', 'goldy_mex_contant_appoinment');
add_action( 'wp_ajax_nopriv_contant_appoinment', 'goldy_mex_contant_appoinment' );

if ( ! defined( '_GOLDY_MEX_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_GOLDY_MEX_VERSION', '1.0.0' );
}


if ( ! function_exists( 'goldy_mex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function goldy_mex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on goldy-mex, use a find and replace
		 * to change 'goldy-mex' to the name of your theme in all the template files.
		 */
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_editor_style( 'css/editor-style.css' );

		load_theme_textdomain( 'goldy-mex', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'goldy-mex' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'goldy_mex_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'goldy_mex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $goldy_mex_content_width
 */
function goldy_mex_content_width() {
	$GLOBALS['goldy_mex_content_width'] = apply_filters( 'goldy_mex_content_width', 640 );
}
add_action( 'after_setup_theme', 'goldy_mex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function goldy_mex_widgets_init() {
	register_sidebar(
      	array(
         	'name'          => esc_html__( 'Widget Section', 'goldy-mex'),
         	'id'            => 'goldy-mex-widget-section',
         	'description'   => esc_html__( 'Add widgets here.', 'goldy-mex' ),
         	'before_widget' => '<section id="%1$s" class="widget %2$s">',
         	'after_widget'  => '</section>',
         	'before_title'  => '<h2 class="widget-title">',
         	'after_title'   => '</h2>',
      	)
   	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'goldy-mex' ),
			'id'            => 'goldy_mex_sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer1', 'goldy-mex' ),
			'id'            => 'goldy_mex_footer1',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer2', 'goldy-mex' ),
			'id'            => 'goldy_mex_footer2',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer3', 'goldy-mex' ),
			'id'            => 'goldy_mex_footer3',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer4', 'goldy-mex' ),
			'id'            => 'goldy_mex_footer4',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'goldy_mex_widgets_init' );


function goldy_mex_wpdocs_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 600, 350, true );
}
add_action( 'after_setup_theme', 'goldy_mex_wpdocs_setup_theme' );


// Add custom meta box
add_action("add_meta_boxes", "goldy_mex_add_sidebar_meta_box");
function goldy_mex_add_sidebar_meta_box()
{
	$post_types = get_post_type();
    add_meta_box("goldy-mex-meta-box", esc_html__( "Select Layout Option", 'goldy-mex' ),"goldy_mex_sidebar_meta_box_markup", $post_types, "normal", "high", null);
}
function goldy_mex_sidebar_meta_box_markup($object){
	?>
	<table class="admin_sidebar_select">
		<tr><td><label><h2 class="custom_meta"><?php echo esc_html__( 'Breadcrumb', 'goldy-mex' );?></h2></label></td></tr>
	   	<tr>
	   		<td>
	   			<label for="goldy_mex_breadcrumb_select">
	   				<input type="radio" name="goldy_mex_breadcrumb_select" id="goldy_mex_breadcrumb_select" value="yes" <?php if(get_post_meta($object->ID,'goldy_mex_breadcrumb_select',true)=='yes'){echo "checked";}?>><?php echo esc_html__( 'Yes', 'goldy-mex' );?> 
	   				<input type="radio" name="goldy_mex_breadcrumb_select" id="goldy_mex_breadcrumb_select" value="no" <?php if(get_post_meta($object->ID,'goldy_mex_breadcrumb_select',true)=='no'){echo "checked";}?>><?php echo esc_html__( 'No', 'goldy-mex' );?>
	   			</label>
	   		</td>
	   	</tr>
	   	<tr><td><label><h2 class="custom_meta">Sidebar</h2></label></td></tr>
   		<tr>
	   		<td>
	   			<label for="no_sidebar">		   				
	   				<input type="radio" name="sidebar_select" id="no_sidebar" class="no_sidebar" value="no_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='no_sidebar'){echo "checked";}?>>
		   				<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/full.png' ?>">
		   			</input>
	   			</label>
	   			<label for="left_sidebar">
	   				<input type="radio" name="sidebar_select" id="left_sidebar" class="left_sidebar" value="left_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='left_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/left.png' ?>">
	   				</input>
	   			</label>
	   			<label for="right_sidebar">			   				
	   				<input type="radio" name="sidebar_select" id="right_sidebar" class="right_sidebar" value="right_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='right_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/right.png' ?>">
	   				</input>
	   			</label>			
	   		</td>
	   	</tr>
	</table>
	<?php
}
add_action( 'save_post','goldy_mex_save_sidebar_meta_box_data');
function goldy_mex_save_sidebar_meta_box_data( $post_id ) {
	if(isset($_REQUEST['goldy_mex_breadcrumb_select'])){
		$goldy_mex_breadcrumb_select = filter_var(wp_unslash($_REQUEST['goldy_mex_breadcrumb_select']),FILTER_SANITIZE_STRING);
		update_post_meta($post_id,'goldy_mex_breadcrumb_select',$goldy_mex_breadcrumb_select);
	}
	if(isset($_REQUEST['sidebar_select'])){
		$sidebar_select = filter_var(wp_unslash($_REQUEST['sidebar_select']),FILTER_SANITIZE_STRING);
		update_post_meta($post_id,'sidebar_select',$sidebar_select);
	}
}

function goldy_mex_breadcrumb_slider(){
	?>
	<div class="breadcrumb_info">
		<div class="breadcrumb_data">
			<section id="breadcrumb-section" class="breadcrumb-area breadcrumb-centerc">
				<div class="breadcrumb-content">
					<div class="breadcrumb-heading">
						<h1><?php  goldy_mex_breadcrumb_title();	?></h1>
					</div>
					<ol class="breadcrumb-list">
						<li>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'goldy-mex' );?></a>
							<?php echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;"; ?>
						</li>
						<li>
							<?php goldy_mex_breadcrumb_title();?>
						</li>
					</ol>
				</div> 
			</section>
		</div>		
	</div>
	<?php
}
/**
 * Enqueue scripts and styles.
 */
function goldy_mex_scripts() {
	wp_enqueue_script('jquery', false, array(), false, false);
	wp_enqueue_style( 'goldy-mex-style', get_stylesheet_uri(), array(), _GOLDY_MEX_VERSION );
	wp_style_add_data( 'goldy-mex-style', 'rtl', 'replace' );
	wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), _GOLDY_MEX_VERSION, true);
	wp_enqueue_script( 'goldy-mex-navigation', get_template_directory_uri() . '/assets/js/goldy-mex-navigation.js', array(), _GOLDY_MEX_VERSION, true );
		wp_localize_script( 'goldy-mex-navigation', 'aboutdata', 
				array(
					'about_sec' => esc_attr(get_theme_mod('goldy_mex_diseble')),
				)
     	);
	wp_enqueue_script( 'goldy-mex-wow-min', get_template_directory_uri() . '/assets/js/goldy-mex-wow.min.js', array(), _GOLDY_MEX_VERSION, true );	
	wp_enqueue_script( 'goldy-mex-owl_slider', get_template_directory_uri() . '/assets/js/goldy-mex-owl_slider.js', array(), _GOLDY_MEX_VERSION, true );	
	wp_enqueue_script( 'goldy-mex-owl-carousel-min', get_template_directory_uri() . '/assets/js/goldy-mex-owl.carousel.js', array(), _GOLDY_MEX_VERSION, true );	
	wp_enqueue_script( 'goldy-mex-appoinment', get_template_directory_uri() . '/assets/js/goldy-mex-appoinment.js', array(), _GOLDY_MEX_VERSION, true );
    $goldy_mex_passarray =  array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'goldy_mex_book_an_appointment_enable_captcha' => get_theme_mod( 'goldy_mex_book_an_appointment_enable_captcha' ),
    );
    wp_localize_script( 'goldy-mex-appoinment', 'goldy_mex_appoinment', $goldy_mex_passarray);
	wp_enqueue_style( 'goldy-mex-theme-css', esc_url(get_template_directory_uri()).'/assets/css/goldy-mex-theme.css' , array(), _GOLDY_MEX_VERSION );
	wp_enqueue_style( 'goldy-mex-fontawesome-css', esc_url(get_template_directory_uri()).'/assets/fontawesome/css/goldy-mex-font-awesome.css' , array(), _GOLDY_MEX_VERSION );
	wp_enqueue_style( 'goldy-mex-owl-carousel-min-css', esc_url(get_template_directory_uri()).'/assets/css/goldy-mex-owl.carousel.min.css' , array(), _GOLDY_MEX_VERSION );
	wp_enqueue_style( 'goldy-mex-owl-carousel_theme-min-css', esc_url(get_template_directory_uri()).'/assets/css/goldy-mex-owl.theme.min.css' , array(), _GOLDY_MEX_VERSION );
	wp_enqueue_style( 'goldy-mex-wow-animate-css', esc_url(get_template_directory_uri()).'/assets/css/goldy-mex-animate.css' , array(), _GOLDY_MEX_VERSION );
	wp_enqueue_style( 'goldy-mex-wow-animate-min-css', esc_url(get_template_directory_uri()).'/assets/css/goldy-mex-animate.min.css' , array(), _GOLDY_MEX_VERSION );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'goldy_mex_scripts' );

function goldy_mex_admin_script_style() {
	wp_enqueue_style( 'goldy-mex-admin_site-css', esc_url(get_template_directory_uri()).'/assets/css/goldy-mex-admin_site.css' , array(), _GOLDY_MEX_VERSION );
	if (is_plugin_active('slivery-extender/slivery-extender.php') ) {
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'goldy_mex_custom_controls_js',  get_template_directory_uri() . '/assets/js/goldy-mex-customizer-rep.js', array( 'jquery' ), _GOLDY_MEX_VERSION );
	}
    wp_enqueue_script('goldy_mex_admin-js',  get_template_directory_uri() . '/install-recommended-plugins/goldy-mex-admin.js', array( 'jquery' ), false, false );
}
add_action('admin_enqueue_scripts', 'goldy_mex_admin_script_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/customizer-control.php';

require get_template_directory() . '/inc/customizer_css.php';

require get_parent_theme_file_path( '/inc/about.php' );

require get_template_directory() . '/install-recommended-plugins/index.php';

require get_template_directory() . '/inc/customizer-options/goldy_mex_recommended_plugin.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}


function goldy_mex_main_js() {
    wp_enqueue_script( 'main-js', get_theme_file_uri( '/assets/js/goldy-mex-owl_slider.js' ), array(), '1.0', true );
    // Localize the script with new data and pass php variables to JS.
    $main_js_data = array(
        /* FOR LATER USE. */
        'goldy_mex_img_autoplay' => esc_attr(get_theme_mod('silvery_featured_slider_autoplay', 'true')),
        'goldy_mex_img_autoplayspped' => esc_attr(get_theme_mod('silvery_featured_slider_autoplay_speed','1000')),
        'goldy_mex_img_autoplaytime' => esc_attr(get_theme_mod('silvery_featured_slider_autoplay_timeout','5000')),

        'goldy_mex_testimonial_autoplay' => esc_attr(get_theme_mod('goldy_mex_our_testimonial_slider_autoplay', 'true')),
        'goldy_mex_testimonial_autoplayspped' => esc_attr(get_theme_mod('goldy_mex_our_testimonial_slider_autoplay_speed','1000')),
        'goldy_mex_testimonial_autoplaytime' => esc_attr(get_theme_mod('goldy_mex_our_testimonial_autoplay_timeout','5000')),

        'goldy_mex_sponsors_autoplay' => esc_attr(get_theme_mod('goldy_mex_our_sponsors_slider_autoplay', 'true')),
        'goldy_mex_sponsors_autoplayspped' => esc_attr(get_theme_mod('goldy_mex_our_sponsors_slider_autoplay_speed','1000')),
        'goldy_mex_sponsors_autoplaytime' => esc_attr(get_theme_mod('goldy_mex_our_sponsors_autoplay_timeout','5000')),


    );
    wp_localize_script( 'main-js', 'main_vars', $main_js_data );
}
add_action( 'wp_enqueue_scripts', 'goldy_mex_main_js' );

global $goldy_mex_default;
$goldy_mex_default = [
	'options' => [
		'goldy_mex_opening_time' => 'Mon - Sat: 8.00 - 18.00',
		'goldy_mex_contact_info_number' => '04463235323',
		'goldy_mex_email_info_number'  => 'info@example.com',
		'goldy_mex_display_social_icon'  => true,
		'goldy_mex_social_icon_section_content'=> [
			[
				'icon_value'     => 'fa-facebook',
				'link_url'           => '#',			
			],
			[
				'icon_value'     => 'fa-twitter',
				'link_url'           => '#',				
			],
			[
				'icon_value'     => 'fa-linkedin',
				'link_url'           => '#',				
			],
			[
				'icon_value'     => 'fa-instagram',
				'link_url'           => '#',				
			],
		], 
		'goldy_mex_featuredimage_slider'=> [
			[

				'title'    => esc_html__('New Skills', 'goldy-mex'),
				'text'    => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text.', 'goldy-mex'),	
				'link_url'    => esc_html__('#', 'goldy-mex'),
				'link_text'   => esc_html__( 'Button', 'goldy-mex' ),	
			],
		],
		'goldy_mex_featured_section_main_title' => esc_html__('Featured Section', 'goldy-mex' ),
		'goldy_mex_featured_section_description' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'goldy-mex' ),
		'goldy_mex_featured_section_content'=> [
			[
				'icon_value'    => 'fa-cloud',
				'title'    => esc_html__( 'Featured title 1', 'goldy-mex' ),
				'text'    => esc_html__( 'this is featured.', 'goldy-mex' ),	
				'link_url'    => esc_html__('#', 'goldy-mex'),
			],
			[
				'icon_value'    => 'fa-facebook',
				'title'    =>  esc_html__( 'Featured title 2', 'goldy-mex' ),
				'text'    =>  esc_html__( 'this is featured.', 'goldy-mex' ),	
				'link_url'    => esc_html__('#', 'goldy-mex'),
			],
			[
				'icon_value'    => 'fa-twitter',
				'title'    => esc_html__( 'Featured title 3', 'goldy-mex' ),
				'text'    => esc_html__( 'this is featured.', 'goldy-mex' ),
				'link_url'    => esc_html__('#', 'goldy-mex'),	
			],
		], 
		'goldy_mex_our_portfolio_main_title' => esc_html__('Our Portfolio', 'goldy-mex' ),
		'goldy_mex_our_portfolio_desc' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'goldy-mex' ),
		'goldy_mex_our_portfolio_content' =>  [
			[
				'image'  => '',
				'title'           => esc_html__( 'Free Consulting', 'goldy-mex' ),
				'text'        => esc_html__( 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sapien, Sit Sed Accumsan.', 'goldy-mex' ),
				'link_url'           => esc_html__('#', 'goldy-mex'),				
			],
			[
				'image'  => '',
				'title'           => esc_html__( 'Best Analysis', 'goldy-mex' ),
				'text'        => esc_html__( 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sapien, Sit Sed Accumsan.', 'goldy-mex' ),
				'link_url'           => esc_html__('#', 'goldy-mex'),			
			],
			[
				'image'  => '',
				'title'       => esc_html__( 'Successes Reports', 'goldy-mex' ),
				'text'        => esc_html__( 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sapien, Sit Sed Accumsan.', 'goldy-mex' ),
				'link_url'           => esc_html__('#', 'goldy-mex'),				
			],
		],
		'goldy_mex_about_main_title' => esc_html__('About Us', 'goldy-mex' ),
		'goldy_mex_about_section_layout_title' => esc_html__('Hi, I Am Samantha!', 'goldy-mex' ),
		'goldy_mex_about_section_layout_subheading' => esc_html__('Owner/Founder, Executive Coach', 'goldy-mex' ),
		'goldy_mex_about_section_layout_desc' => esc_html__('Yes, I Know My Stuff! And Throughout Our Coaching Time, You Will Develop The Tools And Confidence To Take Action. My Way Of Coaching Is To Empower You In Becoming The Leader You Want To Be. You Are Unique And So Your Coaching Should Be Too.', 'goldy-mex' ),
		'goldy_mex_about_section_layout_btn' => esc_html__('Read More', 'goldy-mex' ),
		'goldy_mex_about_section_layout_btn_link' => esc_html__('#', 'goldy-mex' ),
		'goldy_mex_book_an_appoinment_main_title' => esc_html__('Book an Appointment', 'goldy-mex' ),
		'goldy_mex_book_an_appoinment_name_ph' => esc_html__('Enter Your Name', 'goldy-mex' ),
		'goldy_mex_book_an_appoinment_email_ph' => esc_html__('Enter Your Email', 'goldy-mex' ),
		'goldy_mex_book_an_appoinment_number_ph' => esc_html__('Your Moblie Number', 'goldy-mex' ),
		'goldy_mex_book_an_appoinment_query_ph' => esc_html__('Your Query', 'goldy-mex' ),
		'goldy_mex_book_an_appoinment_btn_text' => esc_html__('Submit', 'goldy-mex' ),

		'goldy_mex_our_team_main_title' => esc_html__('Our Team', 'goldy-mex' ),
		'goldy_mex_our_team_desc' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'goldy-mex' ),
		'goldy_mex_our_team_content' =>  [
			[
				'title'          => esc_html__( 'Rizon Pet', 'goldy-mex' ),
				'subtitle'       => esc_html__( 'Project Manager', 'goldy-mex' ),
				'link_url'           => esc_html__('#', 'goldy-mex'),				
			],
			[
				'title'          => esc_html__( 'Glenn Maxwell', 'goldy-mex' ),
				'subtitle'       => esc_html__( 'Project Manager', 'goldy-mex' ),
				'link_url'           => esc_html__('#', 'goldy-mex'),					
			],
			[
				'title'          => esc_html__( 'Aaron Finch', 'goldy-mex' ),
				'subtitle'       => esc_html__( 'Manager And Director', 'goldy-mex' ),
				'link_url'           => esc_html__('#', 'goldy-mex'),					
			],
			[
				'title'          => esc_html__( 'Christiana Ena', 'goldy-mex' ),
				'subtitle'       => esc_html__( 'Project Manager', 'goldy-mex' ),
				'link_url'           => esc_html__('#', 'goldy-mex'),					
			],
		],
		'our_testimonial_main_title'  => esc_html__('Our Testimonial', 'goldy-mex' ),
		'our_testimonial_desc'  => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'goldy-mex' ),
		'our_testimonial_content' => [
			[
				'image'    => '',
				'title'    => esc_html__( 'Rizon Pet', 'goldy-mex' ),
				'subtitle'    => esc_html__( 'Project Manager', 'goldy-mex' ),
				'text'    => esc_html__( 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.', 'goldy-mex' ),
			],
			[
				'image'    => '',
				'title'    => esc_html__( 'Glenn Maxwell', 'goldy-mex' ),
				'subtitle'    => esc_html__( 'Project Manager', 'goldy-mex' ),
				'text'    => esc_html__( 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.', 'goldy-mex' ),
			],
			[
				'image'    => '',
				'title'    => esc_html__( 'Aaron Finch', 'goldy-mex' ),
				'subtitle'    => esc_html__( 'Project Manager', 'goldy-mex' ),
				'text'    => esc_html__( 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.', 'goldy-mex' ),
			],
		],
		'goldy_mex_our_sponsors_main_title' => esc_html__('Our Sponsors', 'goldy-mex' ),
		'goldy_mex_our_sponsors_section_content'=> [
			[		
				'link_url' => esc_html__('#', 'goldy-mex'),
				'image'    => '',
			],
			[
				'link_url' => esc_html__('#', 'goldy-mex'),
				'image'    => '',
			],
			[
				'link_url' => esc_html__('#', 'goldy-mex'),
				'image'    => '',
			],
		],
		'goldy_mex_our_services_main_title' => esc_html__('Our Services', 'goldy-mex' ),
		'goldy_mex_our_services_first_widget_title' => esc_html__('New Skills', 'goldy-mex' ),
		'goldy_mex_our_services_first_widget_desc' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.', 'goldy-mex' ),
		'goldy_mex_our_services_second_widget_title' => esc_html__('23 Hours Services', 'goldy-mex' ),
		'goldy_mex_our_services_second_widget_desc' => esc_html__(' when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'goldy-mex' ),
		'goldy_mex_our_services_third_widget_title' => esc_html__('opening Hours', 'goldy-mex' ),
		'goldy_mex_our_services_third_widget_desc1' => esc_html__('Monday-Friday', 'goldy-mex' ),
		'goldy_mex_our_services_third_widget_desc2' => esc_html__('9:00AM To 11:00PM', 'goldy-mex' ),
		'goldy_mex_our_services_third_widget_desc3' => esc_html__('Saturday', 'goldy-mex' ),
		'goldy_mex_our_services_third_widget_desc4' => esc_html__('10:00AM To 9:00PM', 'goldy-mex' ),
		'goldy_mex_our_services_third_widget_desc5' => esc_html__('Sunday', 'goldy-mex' ),
		'goldy_mex_our_services_third_widget_desc6' => esc_html__('10:00AM To 5:00PM', 'goldy-mex' ),
	],
	];

add_theme_support( 'starter-content',$goldy_mex_default);


add_action("init","goldy_mex_theme_limit_set",10);
function goldy_mex_theme_limit_set(){
	global $goldy_mex_themetype;

	if (is_plugin_active('slivery-extender/slivery-extender.php') ) {
		// appoinment captcha
		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => 'goldy_mex_book_an_appointment_enable_captcha',
				'label'       => esc_html__( 'Enable Captcha', 'goldy-mex' ),
				'description' => esc_html__( 'Only Support reCAPTCHA v2 (Im not a robot tickbox)', 'goldy-mex' ),
				'section'     => 'book_an_appoinment_section',
				'default'     => 'off',
				'choices'     => [
					'on'  => esc_html__( 'Enable', 'goldy-mex' ),
					'off' => esc_html__( 'Disable', 'goldy-mex' ),
				],
				'priority'	  => 65,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'goldy_book_an_appointment_form_captcha_site_key',
				'label'    => esc_html__( 'Add Site Key', 'goldy-mex' ),
				'section'  => 'book_an_appoinment_section',
				'priority' => 70,
			]
		);
	}

	$goldy_mex_themetype['themtypeis']='normal';
	if (is_plugin_active('slivery-extender/slivery-extender.php') ) {
		$goldy_mex_themetype['pluginactive']="yes";
	}else{
		$goldy_mex_themetype['pluginactive']="no";
	}

	$goldy_mex_themetype['recommended_plugins_name'] = 'goldy_mex';
	$goldy_mex_themetype['goldy_documentation_Upsell_Section']= "https://www.inverstheme.com/goldy-mex-documentation/";
	$goldy_mex_themetype['pro_section_custom_control']= "https://www.inverstheme.com/theme/goldy-mex-pro/";
	$goldy_mex_themetype['_sidebar_heading_bg_color']= "#273641";
	$goldy_mex_themetype['_sidebar_heading_text_color']= "#ffffff";

	$goldy_mex_themetype['_menu_active_color']= "#f6ad15";
	$goldy_mex_themetype['_menu_active_color_element']= "header#masthead.site-header .current-menu-ancestor > a, header#masthead.site-header .current-menu-item > a, header#masthead.site-header .current_page_item > a, footer#colophon .current-menu-item > a, .current_page_item > a";
	$goldy_mex_themetype['desk_submenu_bg_color']= "#ffffff";
	$goldy_mex_themetype['desk_submenu_bg_color_element']= ".main-navigation .nav-menu ul.sub-menu, .main-navigation .nav-menu ul.children";
	$goldy_mex_themetype['mob_nav_menu_bg_color']= "#273641";
	$goldy_mex_themetype['mob_nav_menu_bg_color_element']= ".mobile_menu";
	$goldy_mex_themetype['mob_sub_menu_bg_color']= "#957b45";
	$goldy_mex_themetype['mob_sub_menu_bg_color_element']= ".main-navigation .sub-menu li, .main-navigation ul ul ul.toggled-on li";
	$goldy_mex_themetype['header_top_bar_bg_color']= "#f6ad15";
	$goldy_mex_themetype['header_top_bar_bg_color_element']= ".top_bar_info";
	$goldy_mex_themetype['header_text_color']= "#000000";
	$goldy_mex_themetype['header_text_color_element']= ".main_site_header, header#masthead p.site-description";
	$goldy_mex_themetype['header_bg_color']= "#ffffff";
	$goldy_mex_themetype['header_bg_color_element']= ".main_site_header";
	$goldy_mex_themetype['mob_nav_menu_activ_color']= "#cb9b31";
	$goldy_mex_themetype['mob_nav_menu_activ_color_element']= "header#masthead.site-header .current-menu-ancestor > a, header#masthead.site-header .current-menu-item > a, header#masthead.site-header .current_page_item > a";
	$goldy_mex_themetype['mob_menu_link_color']= "#ffffff";
	$goldy_mex_themetype['mob_menu_link_color_element']= ".mobile_menu #primary-menu li a";
	$goldy_mex_themetype['container_bg_color']= "#f9f3f2";
	$goldy_mex_themetype['container_text_color']= "#000000";
	$goldy_mex_themetype['_boxed_layout_bg_color']= "#ffffff";
	$goldy_mex_themetype['_content_boxed_bg_color']= "#ffffff";
	$goldy_mex_themetype['link_color']= "#000000";
	$goldy_mex_themetype['link_color_element']= ".main_site_header a";
	$goldy_mex_themetype['link_hover_color']= "#f6ad15";
	$goldy_mex_themetype['link_hover_color_element']= "#masthead .main_site_header a:hover";
	$goldy_mex_themetype['silvery_social_icon_color']= "#214462";
	$goldy_mex_themetype['silvery_social_icon_color_element']= "header#masthead a.social_icon";
	$goldy_mex_themetype['silvery_social_icon_bg_color']= "#f6ad15";
	$goldy_mex_themetype['silvery_social_icon_bg_color_element']= ".social_icon i";
	$goldy_mex_themetype['silvery_social_icon_hover_color']= "#ffffff";
	$goldy_mex_themetype['silvery_social_icon_hover_color_element']= "header#masthead a.social_icon:hover";
	$goldy_mex_themetype['silvery_social_icon_hover_bg_color']= "#f6ad15";
	$goldy_mex_themetype['silvery_social_icon_hover_bg_color_element']= ".social_icon i:hover";
	$goldy_mex_themetype['button_bg_color']= "#f6ad15";
	$goldy_mex_themetype['button_bg_color_element']= 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled';
	$goldy_mex_themetype['_button_bg_hover_color']= "#ffffff";
	$goldy_mex_themetype['_button_bg_hover_color_element']= 'button::before, input[type="button"]::before, input[type="reset"]::before, input[type="submit"]::before, input[type="submit"]::after, .wp-block-search .wp-block-search__button::before, .wp-block-search .wp-block-search__button::after, .nav-previous a::before, .nav-previous a::after, .nav-next a::before, .nav-next a::after, .buttons::before, .buttons::after ,.woocommerce a.button::before, .woocommerce button::before, .woocommerce .single-product button::before, .woocommerce button.button.alt::before, .woocommerce a.button.alt::before,.woocommerce button.button.alt.disabled::before';
	$goldy_mex_themetype['_button_text_color']= "#ffffff";
	$goldy_mex_themetype['_button_text_color_element']= 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled';
	$goldy_mex_themetype['_button_texthover_color']= "#ffffff";
	$goldy_mex_themetype['_button_texthover_color_element']= 'button:hover, input[type="button"]:hover , input[type="reset"]:hover , input[type="submit"]:hover , .wp-block-search .wp-block-search__button:hover, .nav-previous a:hover, .buttons:hover, .nav-next a:hover, .woocommerce a.button:hover, .woocommerce button:hover, .woocommerce .single-product button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt.disabled:hover';
	$goldy_mex_themetype['_button_border_radius']= "4px";
	$goldy_mex_themetype['_button_border_color']= "#f6ad15";
	$goldy_mex_themetype['_button_border_color_element']= 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled';
	$goldy_mex_themetype['_scroll_button_bg_color']= "#f6ad15";
	$goldy_mex_themetype['_scroll_button_color']= "#ffffff";
	$goldy_mex_themetype['_scroll_button_bg_hover_color']= "#ffffff";
	$goldy_mex_themetype['_scroll_button_text_hover_color']= "#f6ad15";
	$goldy_mex_themetype['silvery_featured_slider_text_color']= "#ffffff";
	$goldy_mex_themetype['silvery_featured_slider_arrow_text_color']= "#ffffff";
	$goldy_mex_themetype['silvery_featured_slider_arrow_bg_color']= "#f6ad15";
	$goldy_mex_themetype['silvery_featured_slider_arrow_text_hover_color']= "#f6ad15";
	$goldy_mex_themetype['silvery_featured_slider_arrow_bg_hover_color']= "#ffffff";
	$goldy_mex_themetype['featured_section_bg_color']= "#ffffff";
	$goldy_mex_themetype['featured_section_text_color']= "#333333";
	$goldy_mex_themetype['featured_section_contain_bg_color']= "#ffffff";
	$goldy_mex_themetype['featured_section_contain_bg_color_element']= ".section-featured-wrep";
	$goldy_mex_themetype['featured_section_bg_hover_color']= "#f07c70";
	$goldy_mex_themetype['featured_section_bg_hover_color_element']= ".section-featured-wrep:hover";
	$goldy_mex_themetype['featured_section_contain_text_color']= "#273641";
	$goldy_mex_themetype['featured_section_contain_text_color_element']= ".section-featured-wrep, .section-featured-wrep:hover";
	$goldy_mex_themetype['featured_section_icon_color']= "#f6ad15";
	$goldy_mex_themetype['featured_section_icon_color_element']= ".featured-section_data .featured_content .featured-icon";
	$goldy_mex_themetype['featured_section_icon_hover_color']= "#273641";
	$goldy_mex_themetype['featured_section_icon_hover_color_element']= ".featured-section_data .section-featured-wrep:hover i";
	$goldy_mex_themetype['featured_section_icon_bg_color']= "#fcf5f4";
	$goldy_mex_themetype['featured_section_icon_bg_color_element']= ".featured-section_data .featured_content .featured-icon";
	$goldy_mex_themetype['featured_section_icon_bg_hover_color']= "#fcf5f4";
	$goldy_mex_themetype['featured_section_icon_bg_hover_color_element']= ".section-featured-wrep:hover .featured-icon";
	$goldy_mex_themetype['featured_section_border_color']= "#f10e00";
	$goldy_mex_themetype['featured_section_border_color_background_element']= ".featured-section_data .featured_content .featured-thumbnail:after";
	$goldy_mex_themetype['featured_section_border_color_border_element']= ".section-featured-wrep .fea-brd";
	$goldy_mex_themetype['featured_section_icon_size']= "60px";
	$goldy_mex_themetype['featured_section_item_limit']= "3";
	$goldy_mex_themetype['_book_an_appointment_bg_color']= "#ffffff";
	$goldy_mex_themetype['_book_an_appointment_title_color']= "#404040";
	$goldy_mex_themetype['about_section_bg_color']= "#f0f9fb";
	$goldy_mex_themetype['about_section_bg_color_element']= ".about_section_info";
	$goldy_mex_themetype['about_section_title_text_color']= "#333333";
	$goldy_mex_themetype['our_portfolio_bg_color']= "#f9f9f9";
	$goldy_mex_themetype['our_portfolio_bg_color_element']= ".our_portfolio_info";
	$goldy_mex_themetype['our_portfolio_title_color']= "#333333";
	$goldy_mex_themetype['our_portfolio_text_color']= "#333333";
	$goldy_mex_themetype['our_portfolio_text_color_element']= ".our_portfolio_info";
	$goldy_mex_themetype['our_portfolio_icon_bg_color']= "#ffffff";
	$goldy_mex_themetype['our_portfolio_icon_bg_color_element']= ".our_portfolio_btn a i";
	$goldy_mex_themetype['our_portfolio_icon_color']= "#f6ad15";
	$goldy_mex_themetype['our_portfolio_icon_color_element']= ".our_portfolio_btn a i";
	$goldy_mex_themetype['our_portfolio_border_color']= "#f6ad15";
	$goldy_mex_themetype['our_portfolio_border_color_background_element']= ".our_port_containe .our_portfolio_title i";
	$goldy_mex_themetype['our_portfolio_border_color_color_element']= ".our_port_containe .our_portfolio_title i";
	$goldy_mex_themetype['our_portfolio_border_hover_color']= "#fd6047";
	$goldy_mex_themetype['our_portfolio_border_hover_color_background_element']= ".our_portfolio_info .our_portfolio_caption .our_portfolio_container:hover .our_portfolio_title i";
	$goldy_mex_themetype['our_portfolio_border_hover_color_color_element']= ".our_portfolio_info .our_portfolio_caption .our_portfolio_container:hover .our_portfolio_title i";
	$goldy_mex_themetype['our_portfolio_container_text_color']= "#000000";
	$goldy_mex_themetype['our_portfolio_container_text_color_element']= ".our_portfolio_info .our_portfolio_container";
	$goldy_mex_themetype['our_team_bg_color']= "#f0f9fb";
	$goldy_mex_themetype['our_team_bg_color_element']= ".our_team_section";
	$goldy_mex_themetype['our_team_text_color']= "#333333";
	$goldy_mex_themetype['our_team_text_color_element']= ".our_team_section .our_team_main_title";
	$goldy_mex_themetype['our_team_container_text_hover_color']= "#3686ad";
	$goldy_mex_themetype['our_team_container_text_hover_color_element']= ".our_team_container:hover .our_team_title a, .our_team_container:hover .our_team_headline p";
	$goldy_mex_themetype['our_team_link_color']= "#0a62b2";
	$goldy_mex_themetype['our_team_link_color_element']= ".our_team_icon_contain a";
	$goldy_mex_themetype['our_team_link_hover_color']= "#f6ad15";
	$goldy_mex_themetype['our_team_link_hover_color_element']= ".our_team_icon_contain .our_team_title a:hover";
	$goldy_mex_themetype['our_testimonial_bg_color']= "#f6f6f6";
	$goldy_mex_themetype['our_testimonial_bg_color_element']= ".our_testimonial_section";
	$goldy_mex_themetype['our_testimonial_text_color']= "#333333";
	$goldy_mex_themetype['our_testimonial_text_color_element']= ".our_testimonial_section .testimonial_title h2, .our_testimonial_section .our_testimonial_main_disc p";
	$goldy_mex_themetype['our_testimonial_quote_color']= "#dedddd";
	$goldy_mex_themetype['our_testimonial_quote_color_element']= ".our_testimonial_icon i, .our_testimonial_data_info:before, .our_testimonial_data_info:after";
	$goldy_mex_themetype['our_testimonial_quote_hover_color']= "#eea61b";
	$goldy_mex_themetype['our_testimonial_quote_hover_color_element']= ".our_testimonial_icon i:hover, .testimonials_title h3:hover:before";
    $goldy_mex_themetype['our_testimonial_img_hover_border_color']= "#ffffff";
    $goldy_mex_themetype['our_testimonial_img_hover_border_color_element']= ".image_testimonials img:hover";
    $goldy_mex_themetype['our_testimonial_contain_bg_color']= "#e9e9e9";
    $goldy_mex_themetype['our_testimonial_contain_bg_color_element']= ".our_testimonial_section .our_testimonial_info .testinomial_owl_slider .our_testimonial_data_info";
    $goldy_mex_themetype['our_testimonial_contain_bg_color_border_element']= ".testimonials_data .testinomial_description p:before";
    $goldy_mex_themetype['our_testimonial_contain_description_bg_color']= "#e9e9e9";
    $goldy_mex_themetype['our_testimonial_contain_description_bg_color_element']= ".testinomial_description";
    $goldy_mex_themetype['our_testimonial_container_description_color']= "#000000";
    $goldy_mex_themetype['our_testimonial_container_description_color_element']= ".testinomial_description p";
    $goldy_mex_themetype['our_testimonial_arrow_bg_color']= "#f6ad15";
    $goldy_mex_themetype['our_testimonial_arrow_bg_color_element']= ".our_testimonial_section .testinomial_owl_slider .owl-nav button";
    $goldy_mex_themetype['our_testimonial_arrow_text_color']= "#ffffff";
    $goldy_mex_themetype['our_testimonial_arrow_text_color_element']= ".our_testimonial_section .testinomial_owl_slider .owl-nav button";
    $goldy_mex_themetype['our_testimonial_arrow_text_hover_color']= "#f6ad15";
    $goldy_mex_themetype['our_testimonial_arrow_text_hover_color_element']= ".our_testimonial_section button.owl-prev:hover, .our_testimonial_section button.owl-next:hover";
    $goldy_mex_themetype['our_testimonial_arrow_bg_hover_color']= "#ffffff";
    $goldy_mex_themetype['our_testimonial_arrow_bg_hover_color_element']= ".our_testimonial_section button.owl-prev:hover, .our_testimonial_section button.owl-next:hover";
    $goldy_mex_themetype['our_testimonial_headline_text_color']= "#404040";
    $goldy_mex_themetype['our_testimonial_headline_text_color_element']= ".our_testimonial_section .testinomial_owl_slider .testimonials_title h3";
    $goldy_mex_themetype['our_testimonial_subheadline_text_color']= "#404040";
    $goldy_mex_themetype['our_testimonial_subheadline_text_color_element']= ".our_testimonial_section .testinomial_owl_slider .testimonials_title h4";
    $goldy_mex_themetype['our_sponsors_text_color']= "#000000";
    $goldy_mex_themetype['our_sponsors_text_color_element']= ".our_sponsors_section";
    $goldy_mex_themetype['our_sponsors_bg_color']= "#f0f9fb";
    $goldy_mex_themetype['our_sponsors_bg_color_element']= ".our_sponsors_section";
    $goldy_mex_themetype['our_sponsors_arrow_color']= "#ffffff";
    $goldy_mex_themetype['our_sponsors_arrow_color_element']= ".our_sponsors_section .our_sponsors_contain .owl-nav button";
    $goldy_mex_themetype['our_sponsors_arrow_bg_color']= "#f6ad15";
    $goldy_mex_themetype['our_sponsors_arrow_bg_color_element']= ".our_sponsors_section .our_sponsors_contain .owl-nav button";
    $goldy_mex_themetype['our_sponsors_arrow_text_hover_color']= "#f6ad15";
    $goldy_mex_themetype['our_sponsors_arrow_text_hover_color_element']= ".our_sponsors_section .our_sponsors_contain button.owl-prev:hover, .our_sponsors_section .our_sponsors_contain button.owl-next:hover";
    $goldy_mex_themetype['our_sponsors_arrow_bghover_color']= "#ffffff";
    $goldy_mex_themetype['our_sponsors_arrow_bghover_color_element']= ".our_sponsors_section .our_sponsors_contain button.owl-prev:hover, .our_sponsors_section .our_sponsors_contain button.owl-next:hover";
	$goldy_mex_themetype['our_services_bg_color']= "#F3F4F8";
	$goldy_mex_themetype['our_services_bg_color_element']= ".services_section";
	$goldy_mex_themetype['our_services_first_widget_bg_color']= "#03a0b3";
	$goldy_mex_themetype['our_services_first_widget_bg_color_element']= ".widget_section_one";
	$goldy_mex_themetype['our_services_first_widget_text_color']= "#ffffff";
	$goldy_mex_themetype['our_services_first_widget_text_color_element']= ".widget_section_one";
	$goldy_mex_themetype['our_services_second_widget_bg_color']= "#4f6dcd";
	$goldy_mex_themetype['our_services_second_widget_bg_color_element']= ".widget_section_two";
	$goldy_mex_themetype['our_services_second_widget_text_color']= "#ffffff";
	$goldy_mex_themetype['our_services_second_widget_text_color_element']= ".widget_section_two";
	$goldy_mex_themetype['our_services_third_widget_bg_color']= "#3065b5";
	$goldy_mex_themetype['our_services_third_widget_bg_color_element']= ".widget_section_three";
	$goldy_mex_themetype['our_services_third_widget_text_color']= "#ffffff";
	$goldy_mex_themetype['our_services_third_widget_text_color_element']= ".widget_section_three";
	$goldy_mex_themetype['goldy_funfact_section_icon_size']= "40px";
	$goldy_mex_themetype['goldy_funfact_section_icon_size_element']= ".goldy_mex_funfact_content .goldy-funfact-icon i";
	$goldy_mex_themetype['goldy_funfact_section_bg_color']= "#ffffff";
	$goldy_mex_themetype['goldy_funfact_section_text_color']= "#333333";
	$goldy_mex_themetype['goldy_funfact_section_text_color_element']= ".goldy_mex_funfact_section";
	$goldy_mex_themetype['goldy_funfact_section_contain_bg_color']= "rgba(255, 255, 255, 0.1%)";
	$goldy_mex_themetype['goldy_funfact_section_contain_bg_color_element']= ".goldy_mex_funfact_content";
	$goldy_mex_themetype['goldy_funfact_section_bg_hover_color']= "rgba(255, 255, 255, 0.1%)";
	$goldy_mex_themetype['goldy_funfact_section_bg_hover_color_element']= ".goldy_mex_funfact_content:hover";
	$goldy_mex_themetype['goldy_funfact_section_contain_text_color']= "#333333";
	$goldy_mex_themetype['goldy_funfact_section_contain_text_color_element']= ".goldy_mex_funfact_content";
	$goldy_mex_themetype['goldy_funfact_section_contain_text_hover_color']= "#333333";	
	$goldy_mex_themetype['goldy_funfact_section_contain_text_hover_color_element']= ".goldy_mex_funfact_content:hover";
	$goldy_mex_themetype['goldy_funfact_section_icon_color']= "#f6ad15";
	$goldy_mex_themetype['goldy_funfact_section_icon_color_element']= ".goldy_mex_funfact_content .goldy-funfact-icon i";
	$goldy_mex_themetype['goldy_funfact_section_icon_hover_color']= "#f6ad15";
	$goldy_mex_themetype['goldy_funfact_section_icon_hover_color_element']= ".goldy_mex_funfact_content:hover .goldy-funfact-icon i";
	$goldy_mex_themetype['goldy_funfact_section_border_color']= "#484a60";
	$goldy_mex_themetype['goldy_funfact_section_border_color_element']= ".goldy_mex_funfact_content";
	$goldy_mex_themetype['goldy_funfact_section_border_color_property']= "border-color";
	$goldy_mex_themetype['_footer_bg_color']= "#364558";
	$goldy_mex_themetype['_footer_bg_color_element']= "footer#colophon";
	$goldy_mex_themetype['_footer_text_color']= "#ffffff";
	$goldy_mex_themetype['_footer_text_color_element']= "footer#colophon";
	$goldy_mex_themetype['footer_link_color']= "#e9ebee";
	$goldy_mex_themetype['footer_link_color_element']= "footer#colophon a";
	$goldy_mex_themetype['_footer_link_hover_color']= "#f6ad15";
	$goldy_mex_themetype['_footer_link_hover_color_element']= "footer#colophon a:hover";
	$goldy_mex_themetype['design_underline_color']= "#273641";
	$goldy_mex_themetype['silvary_breadcrumb_bg_color']= "#c8c9cb";
	$goldy_mex_themetype['silvary_breadcrumb_bg_color_element']= ".breadcrumb_info";
	$goldy_mex_themetype['silvary_breadcrumb_text_color']= "#333333";
	$goldy_mex_themetype['silvary_breadcrumb_text_color_element']= ".breadcrumb_info";
	$goldy_mex_themetype['silvary_breadcrumb_link_color']= "#273641";
	$goldy_mex_themetype['silvary_breadcrumb_link_color_element']= "section#breadcrumb-section a";
	$goldy_mex_themetype['goldy_loader_image']= get_theme_file_uri('assets/images/loader.gif');
	$goldy_mex_themetype['goldy_loader_bg_color']= "#ffffff";
	if (is_plugin_active('slivery-extender/slivery-extender.php')) {
		$goldy_mex_themetype['global_ordering_default'] = array(
			'goldy_mex_featuredimage_slider',
			'goldy_mex_our_portfolio_section',
			'goldy_mex_about_section',
			'goldy_mex_featured_section',
			'goldy_mex_appointment_section',
			'goldy_mex_our_team_section',
			'goldy_mex_our_testimonial_section',
			'goldy_mex_our_sponsors_section',
			'goldy_mex_services_section',
			'goldy_mex_funfact_section_section',
			'goldy_mex_widget_section',
		);
	}else{
		$goldy_mex_themetype['global_ordering_default'] = array(
			'goldy_mex_featuredimage_slider',
			'goldy_mex_featured_section',
			'goldy_mex_our_sponsors_section',
			'goldy_mex_funfact_section_section',
		);
	}
}

add_filter('goldy_mex_global_ordering_action','goldy_mex_ordering_callback');
function goldy_mex_ordering_callback($choicarraly){
	// echo "order";
	$choicarraly['goldy_mex_widget_section'] = 'Widget Section';
	$choicarraly['goldy_mex_funfact_section_section'] = 'Funfact Section';
	return $choicarraly;
}

add_action( 'admin_notices', 'goldy_mex_admin_notice_demo_data' );
function goldy_mex_admin_notice_demo_data() {
	if( !empty( $_GET['status'] ) && $_GET['status'] == 'goldy_mex_hide_msg' ){
		update_option( 'goldy_mex_hide_msg', true );
	}

	$status = get_option( 'goldy_mex_hide_msg' );
	if( $status == true ){
		return;
	} 

	$recommended_plugins = apply_filters( 'goldy_mex_plugins', $plugins = array() );
	if( empty( $recommended_plugins ) ){
		return;
	}
	$my_theme = wp_get_theme();
	$theme_name = $my_theme->get( 'Name' );
	$nonce = wp_create_nonce("goldy_mex_install_plugins");
	?>
	 <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="goldy-mex-getting-started-notice clearfix">
            <div class="goldy-mex-theme-screenshot">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'goldy-mex' ); ?>" />
            </div><!-- /.goldy-mex-theme-screenshot -->
            <div class="theme-info-wrapper">
		        <?php 
		        echo '<strong style="font-size: 20px; padding-bottom: 10px; display: block;">';
		        printf(
		        	esc_html__( 'Thank you for installing %1$s', 'goldy-mex' ),
		        	esc_attr($theme_name)
		        ); 
		        echo '</strong>';
		        echo '<p>' . esc_html__( "Install and activate Inverstheme For Theme plugin for taking full advantage of all the features this theme has to offer." , 'goldy-mex' ) . '</p>';
		        ?>

		        <div class="button_wrapper_theme" style="margin-top: 20px;">
			        <a 
			        href="javascript:void(0)" 
			        class="button button-primary button-hero goldy_mex_install_plugins" 
			        data-nonce="<?php echo esc_attr( $nonce ); ?>"
					data-redirect="<?php echo esc_url( admin_url( 'customize.php' )); ?>"
			        >
			        <!-- themes.php?page=tgmpa-install-plugins -->
			        <img class="lodear_img" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/loader1.gif') ?>" style="display: none;">
			        <span><?php esc_html_e( 'Get Started', 'goldy-mex' ) ?></span>
			    	</a>

			        <a 
			        href="<?php echo esc_url( admin_url('/?status=goldy_mex_hide_msg') ); ?>" 
			        class="button button-default button-hero goldy_mex_dismiss" ><?php esc_html_e( 'Close', 'goldy-mex' ) ?></a>
		        </div>
	        </div>   
        </div>
    </div>    
    <?php
}

add_filter( 'goldy_mex_plugins', function(){

	$plugins = array(
		'slivery-extender' => array(
			'slug' => 'slivery-extender/slivery-extender.php',
			'zip' => 'slivery-extender'
		),	
	);
	return $plugins;
});

function goldy_mex_register_block_styles( $block_name, $style_properties ) {
	return WP_Block_Styles_Registry::get_instance()->register( $block_name, $style_properties );
}

function goldy_mex_register_block_patterns( $pattern_name, $pattern_properties ) {
	return WP_Block_Patterns_Registry::get_instance()->register( $pattern_name, $pattern_properties );
}


/**
 * Callback sections.
 */

add_action("goldy_header_topbar_loop",'goldy_mex_header_topbar_loop',5);
function goldy_mex_header_topbar_loop($goldy_mex_default){
?>
	<div class="header_top_bar">
		<?php if(get_theme_mod( 'goldy_mex_opening_time',$goldy_mex_default['options']['goldy_mex_opening_time'])){ ?>
		<?php if(!empty(get_theme_mod( 'goldy_mex_opening_time',$goldy_mex_default['options']['goldy_mex_opening_time']))){ ?>
				<div class="opening_time_data">
					<div class="opening_icon">
						<i class="fa fa-clock-o"></i>
					</div>
					<div class="opening_info">
						<a href="<?php echo esc_html(get_theme_mod( 'goldy_mex_opening_time',$goldy_mex_default['options']['goldy_mex_opening_time'] )); ?>"><p><?php echo esc_html(get_theme_mod( 'goldy_mex_opening_time',$goldy_mex_default['options']['goldy_mex_opening_time'] )); ?></p></a>
					</div>
				</div>
				
		<?php } } ?>
		<?php if(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number'])){ ?>
		<?php if(!empty(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number']))){ ?>
				<div class="contact_data">
					<div class="contact_icon">
						<i class="fa fa-phone"></i>
					</div>
					<div class="contact_info">
						<a href="tel:<?php echo esc_html(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number'] )); ?>"><p><?php echo esc_html(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number'] )); ?></p></a>
					</div>
				</div>
				
		<?php } } 
		if(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] )){
			if(!empty(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] ))){ ?>
			<div class="email_data">
				<div class="email_icon">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="email_info">
					<a href="mailto:<?php echo esc_html(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] )); ?>"><p><?php echo esc_html(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] )); ?></p></a>
				</div>
			</div>
		<?php } 
	}?>
	</div>
	<div class="header_social_icon">
	<?php 
	if(get_theme_mod( 'goldy_mex_display_social_icon',$goldy_mex_default['options']['goldy_mex_display_social_icon']) != ''){ 
		?>
			<div class="social_icon_info">
				<div class="social_data">
					<?php 
					$social_icon_section_content  = get_theme_mod( 'goldy_mex_social_icon_section_content',$goldy_mex_default['options']['goldy_mex_social_icon_section_content']);
					if ( ! empty( $social_icon_section_content ) ) {
						// $social_icon_section_content = json_decode( $social_icon_section_content );
						foreach ( $social_icon_section_content as $info_item ) {
							if(get_theme_mod( 'goldy_mex_social_icon_section_content',$goldy_mex_default['options']['goldy_mex_social_icon_section_content']) != ''){
								if(!empty($info_item['link_url'])){
								?>
								<a class="social_icon" href="<?php echo esc_attr($info_item['link_url']);?>" target="_blank">
									<i class="fa <?php echo esc_attr($info_item['icon_value']);?>"></i>
								</a>
								<?php
								}
							}
						}
					} ?>
				</div>
			</div>
		
		<?php 
		}
	?>
	</div>
	<?php
}


add_action('goldy_main_header_loop','goldy_mex_main_header_loop',5); 
function goldy_mex_main_header_loop($goldy_mex_default){
?>
	<div class="header_info">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
			<div class="header_logo">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				endif;
				$sharp_tian_description = get_bloginfo( 'description', 'display' );
				if ( $sharp_tian_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo esc_html($sharp_tian_description); ?></p>
				<?php endif; ?>
			</div>
		</div><!-- .site-branding -->
		<div class="menu_call_button">
			<div class="call_button_info">
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" id="navbar-toggle" aria-controls="primary-menu" aria-expanded="false">
						<i class="fa fa-bars"></i>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>							
				</nav>
				<div class="mobile_menu main-navigation" id="mobile_primary">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
					<button class="menu-toggle" id="mobilepop"  aria-expanded="false">
						<i class="fa fa-close"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
<?php
}

add_action('goldy_our_portfolio_loop','goldy_mex_our_portfolio_loop',5);
function goldy_mex_our_portfolio_loop($info_item){
?>
<h3><?php echo $info_item['title'];?></h3>
<div class="protfolio_img_main">
	<div class="protfolio_images">
		<?php if(!empty( $info_item['image'])){ ?>
			<img src="<?php echo esc_url($info_item['image']); ?>" alt="The Last of us">
		<?php }else{
			?>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us"> 
			<?php
		} 
		?>
	</div>
</div>
<div class="our_port_containe">
	<div class="our_portfolio_title" >
		<i class="fa fa-window-minimize" aria-hidden="true"></i>
		<p><?php //echo $info_item->subtitle; ?></p>
		<p class="our_portfolio_desc"><?php echo wp_kses_post($info_item['text']); ?></p>
	</div>	
	<div class="our_portfolio_btn">
	<?php if(!empty($info_item['link_url'])){ ?>
		<a href="<?php echo $info_item['link_url']; ?>">
			<i class="fa fa-arrow-right"></i> 
		</a>
	<?php } ?>
	</div>
</div>
<?php
}


add_action('goldy_featured_section_loop','goldy_mex_featured_section_loop',5);
function goldy_mex_featured_section_loop($info_item){
?>
<div class="featured_content_inner">
	<?php if(!empty($info_item['icon_value'])){ ?>
		<div class="featured-icon">
			<i class="fa <?php echo esc_attr($info_item['icon_value'])?>"></i>
		</div>
	<?php } ?>
		<div class="featured-title wow animate__fadeInLeft" data-wow-duration="1s"> 
			<h4>
				<?php echo esc_attr($info_item['title']); ?>
			</h4>
		</div>
	<div class="featured-description wow animate__fadeInLeft" data-wow-duration="2s">
		<p><?php echo wp_kses_post($info_item['text']); ?></p>
	</div>
</div>
<?php
}

add_action('goldy_our_testimonial_loop','goldy_mex_our_testimonial_loop',5);
function goldy_mex_our_testimonial_loop($info_item){
?>
<div class="our_testimonial_data_info">
	<div class="our_testimonial_icon">
  		<i class="fa fa-quote-left"></i>
	</div>
<div class="testimonials_center_border"></div>
	<div class="testimonials_content">
		<div class="testinomial_description">
			<p><?php echo wp_kses_post($info_item['text']) ?></p>
		</div>
		<div class="our_testimonials_container">
			<div class="testimonials_image">
				<div class="image_testimonials">
					<?php
					if(!empty($info_item['image'])){
						?>
						<img src="<?php echo esc_url($info_item['image']);  ?>" alt="">
						<?php
					}else{
						?>
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="">								
						<?php
					}
					?>
				</div>
			</div>
			<div class="testimonials_title">
				<h3><?php echo esc_html($info_item['title']) ?></h3>
				<h4><?php echo  esc_attr($info_item['subtitle']) ?></h4>
			</div>
		</div>
	</div>												
</div>
<?php
}

add_action('goldy_our_team_loop','goldy_mex_our_team_loop',5);
function goldy_mex_our_team_loop($info_item){
?>
<div class="our_team_container_data">
	<div class="out_team_single_img">	
		<div class="our_team_img">
			<div class="out_team_pic">
				<?php
				if(!empty( $info_item['image'])){
					?>
					<img src="<?php echo esc_url($info_item['image']); ?>">
					<?php
				}else{
					?>
					<img class="our_team_main_image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="our_team_icon_contain">
		<div class="our_teams_contain">
			<div class="our_team_title">
				<a href="<?php echo esc_html($info_item['link_url']); ?>">
					<h3><?php echo esc_html($info_item['title']); ?></h3>
				</a>
			</div>
			<div class="our_team_headline">
				<p><?php echo esc_html($info_item['subtitle']);?></p>
			</div>
		</div>
		
	</div>	
</div>
<?php 
}


add_action('goldy_featured_slider_loop','goldy_mex_featured_slider_loop',5);
function goldy_mex_featured_slider_loop($goldy_mex_default){
?>
	<?php
		if(current_user_can('edit_theme_options')){
		
		if(is_plugin_active('slivery-extender/slivery-extender.php')){
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider',$goldy_mex_default['options']['goldy_mex_featuredimage_slider']);
		}else{
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider');
		}
	}else{
		if(is_plugin_active('slivery-extender/slivery-extender.php')){
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider',$goldy_mex_default['options']['goldy_mex_featuredimage_slider']);
		}else{
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider');
		}
	}

	if(empty($featuredimage_slider) && current_user_can('edit_theme_options') ){?>
		<div class="block_data_info wow animate__zoomIn">
			<div class="block_section">
				<div class="block_contant">
					<h3><?php echo __( 'Step 1 - Theme Options', 'goldy-mex' ); ?></h3>
					<p><?php echo __( 'To begin customizing your site go to <strong>Appearance → Customizer</strong> and select <strong>Theme Option</strong>. Use the options to build your site.', 'goldy-mex' ); ?></p>
				</div>
			</div>
			<div class="block_section">
				<div class="block_contant">
					<h3><?php echo __( 'Step 2 - Setup Slider', 'goldy-mex' ); ?></h3>
					<p><?php echo __( 'Go to <strong>Theme Option → Featured Slider</strong>. Simply add an image, title and text to create stunning slides.', 'goldy-mex' ); ?></p>
				</div>
			</div>
			<div class="block_section">
				<div class="block_contant">
					<h3><?php echo __( 'Step 3 - Setup Style', 'goldy-mex' ); ?></h3>
					<p><?php echo __( 'Go to <strong>Theme Option → Featured Slider</strong>. Simply add Text, Arrow Text and Arrow Background Color.', 'goldy-mex' ); ?>'</p>
				</div>
			</div>
		</div>
	<?php
	}else{
	
	if ( ! empty( $featuredimage_slider ) ) {
	// $featuredimage_slider = json_decode( $featuredimage_slider );
	?>
		<div class="featured_slider_image wow animate__zoomIn">
			<div id="owl-demo" class="owl-carousel owl-theme featuredimage_slider">
				<?php	
					foreach ( $featuredimage_slider as $info_item ) {
						?>								
						<div class="item">
							<div class="hentry-inner">
								<div class="post-thumbnail">
									<?php if(!empty($info_item['image'])){ ?>
										<img src="<?php echo esc_url($info_item['image']); ?>" alt="The Last of us">

									<?php }else{
										?>
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
										<?php
									} ?> 
								</div>				
							  	<div class="entry-container wow bounceInDown">
							  		<?php if($info_item['title']){
							  			?>
							  			<header class=" featured_slider_title entry-header">					
										<h1 class="entry-title">
									  		<?php echo esc_attr($info_item['title']); ?>
									  	</h1>
									</header>
							  			<?php
							  		} ?>						
								  	<div class="featured_slider_disc entry-summary"><?php echo wp_kses_post($info_item['text']); ?></div>
								  	<?php if($info_item['link_text'] != ''){ 
								  			if(!empty($info_item['link_url'])) {
								  				if(!empty($info_item['link_text'])) {?>
									  	<div class="image_btn button">
											<a href="<?php echo esc_attr($info_item['link_url']); ?>" class="buttons"><?php echo esc_html($info_item['link_text']); ?></a>
										</div>
									<?php } } }?>
								</div>
							</div>								
						</div>	
						<?php							
					}
				?>
			</div>
		</div>
		<?php
		}
	}
}

add_action('goldy_about_section_data','goldy_mex_about_section_data',5);
function goldy_mex_about_section_data($goldy_mex_default){
?>
	<div class="about_section_container wow animate__fadeInUpBig">
		<div class="about_featured_image scroll-element js-scroll slide-left">
			<div class="about_pic">
				<!-- <div class="about-deep-pink-floating-img about-deep-pink-circle-xl"> </div> -->
				<?php if(get_theme_mod( 'about_section_image')){ ?>
					<img src="<?php echo esc_url(get_theme_mod( 'about_section_image')); ?>" alt="The Last of us">

				<?php }else{
					?>
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
					<?php
				} ?>
			</div>
		</div>
		
		<!-- Layout1 -->
		
		<div class="about_container_data scroll-element js-scroll slide-right">
			<?php
			if(!empty(get_theme_mod( 'goldy_mex_about_main_title',$goldy_mex_default['options']['goldy_mex_about_main_title']))){
				?>
				<div class="goldy_mex_about_main_title heading_main_title">
					<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_about_main_title',$goldy_mex_default['options']['goldy_mex_about_main_title'] )); ?></h2>
					<span class="separator"></span>
				</div>
				<?php
			} 
			?>	
			<div class="entry-header">
				<div class="about_title">
					<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_about_section_layout_title',$goldy_mex_default['options']['goldy_mex_about_section_layout_title'])); ?></h2>
				</div>
				<div class="about_sub_heading">
					<p><?php echo esc_html(get_theme_mod( 'goldy_mex_about_section_layout_subheading',$goldy_mex_default['options']['goldy_mex_about_section_layout_subheading'])); ?></p>
				</div>
				<div class="about_description">
					<p><?php echo wp_kses_post(get_theme_mod( 'goldy_mex_about_section_layout_desc',$goldy_mex_default['options']['goldy_mex_about_section_layout_desc'])); ?></p>
				</div>
				<?php if(!empty(get_theme_mod( 'goldy_mex_about_section_layout_btn_link',$goldy_mex_default['options']['goldy_mex_about_section_layout_btn_link']))){ ?>
				<div class="about_btn">
					<a class="buttons" href="<?php echo esc_attr(get_theme_mod( 'goldy_mex_about_section_layout_btn_link',$goldy_mex_default['options']['goldy_mex_about_section_layout_btn_link'])); ?>"><?php echo esc_html(get_theme_mod( 'goldy_mex_about_section_layout_btn',$goldy_mex_default['options']['goldy_mex_about_section_layout_btn'] )); ?></a>
				</div>
				<?php } ?>
			</div>
		</div>
		<!-- Layout1 -->
	</div>
<?php 
}

add_action('goldy_book_an_appointment_section_data','goldy_mex_book_an_appointment_section_data',5);
function goldy_mex_book_an_appointment_section_data($goldy_mex_default){
?>
	<div class="appointment_data wow animate__zoomIn">
		<div class="appointment_featured_image">
			<div class="appointment_bg_image">
				<?php if(get_theme_mod( 'goldy_mex_book_an_appointment_section_image')){ ?>
					<style>
					.appointment_featured_image {
				   	background-image: url("<?php echo esc_attr(get_theme_mod( 'goldy_mex_book_an_appointment_section_image')); ?>");
				}
					</style>
				<?php }else{ ?>
				<style>
				.appointment_featured_image {
				   	background-image: url("<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg");
				}
			</style>
			<?php } ?>
				<!-- <img src="<?php //echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us"> -->
			</div>
		</div>
		<div class="appointment_fields_data">
			<div class="appointment_main_title">
				<div class="appointment_title heading_main_title">
				<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_main_title',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_main_title'] )); ?></h2>
				<span class="separator"></span>
			</div>
			</div>
			<div class="appointment_field">
			<div class="af_table_data">
				<form method="post" class="appoinment_reset" id="bookan_appoinment">
					<div class="af_input_fields">
						<input type="text" name="appointment_name" id="appointment_name" size="70" class="appointment_name" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_name_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_name_ph'] )); ?>">
					</div>
					<div class="af_input_fields">
						<input type="email" name="appointment_email" id="appointment_email" size="70" class="appointment_email" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_email_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_email_ph'] )); ?>">
					</div>
					<div class="af_input_fields">
						<input type="text" name="appointment_monumber" id="appointment_monumber" size="70" class="appointment_monumber" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_number_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_number_ph'] )); ?>">
					</div>
					<div class="af_input_fields">
						<textarea rows="5" cols="72" name="appointment_query" id="appointment_query" class="appointment_query" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_query_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_query_ph'] )); ?>"></textarea>
					</div>
					<?php if(get_theme_mod( 'goldy_mex_book_an_appointment_enable_captcha' ) == 'on'){ ?>
					<div class="af_input_fields">
						<div class="g-recaptcha" data-sitekey="<?php echo esc_html(get_theme_mod( 'goldy_book_an_appointment_form_captcha_site_key' )); ?>"></div>
					</div>
					<?php } ?>
					<?php if(!empty(get_theme_mod( 'goldy_mex_book_an_appoinment_btn_text',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_btn_text'] ))) { ?>
					<div class="bookan_appoinment_button">
						<a class="buttons" href="" name="submit" id="appoinment_book" class="make_appointment_btn" ><?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_btn_text',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_btn_text'] )); ?></a>
					</div>
					<?php } ?>
				</form>
				<div class="validation_error"></div>
				<div class="email_success"></div>
			</div>
			</div>
		</div>
	</div>
<?php 
}

add_action('goldy_our_services_section_data', 'goldy_mex_our_services_section_data',5);
function goldy_mex_our_services_section_data($goldy_mex_default){
	?>
	<div class="service_data wow fadeInUp">
        <div class="our_services_title heading_main_title">
            <h2><?php echo esc_html(get_theme_mod( 'goldy_mex_our_services_main_title',$goldy_mex_default['options']['goldy_mex_our_services_main_title'] )); ?></h2>
            <span class="separator"></span>
        </div>
    </div>
	<div class="services_main_content wow animate__zoomIn">
		<div class="services_inner_data">
	      <div class="widget_section_one">
	         <div class="widget_inner_data">
	            <div class="sercice_innerdata">
	               <div class="first_widget_heading">
	                  <h3><?php echo esc_html(get_theme_mod( 'goldy_mex_our_services_first_widget_title',$goldy_mex_default['options']['goldy_mex_our_services_first_widget_title'] )); ?></h3>
	                 </div>
	                 	<div class="first_widget_desc">
	                     <p><?php echo wp_kses_post(get_theme_mod('goldy_mex_our_services_first_widget_desc',$goldy_mex_default['options']['goldy_mex_our_services_first_widget_desc'])); ?></p>
	                 	</div>
	             	</div>
	      	</div>
	     	</div>
	      <div class="widget_section_two">
	         <div class="widget_inner_data">
	               <div class="service_hours_data">
	                 	<div class="two_widget_heading">
	                     <h3><?php echo esc_html(get_theme_mod('goldy_mex_our_services_second_widget_title',$goldy_mex_default['options']['goldy_mex_our_services_second_widget_title'])); ?></h3>
	                 	</div>
	                 	<div class="two_widget_desc">
	                     <p><?php echo wp_kses_post(get_theme_mod('goldy_mex_our_services_second_widget_desc',$goldy_mex_default['options']['goldy_mex_our_services_second_widget_desc'])); ?></p>
	                 	</div>
	             	</div>
	         </div>
	     </div>
	     <div class="widget_section_three">
	         <div class="widget_inner_td_data">
	            <div class="timetable_opening">
	              	<div class="tdt_heading">
	                  <h3><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_title',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_title'])); ?></h3>
	              	</div>
	              	<div class="inner_table_data">
	                  <div class="timedate_data">
	                     <p><strong><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc1',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc1'])); ?></strong></p>
	                     <p><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc2',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc2'])); ?></p>
	                  </div>
	                  <div class="timedate_data">
	                     <p><strong><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc3',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc3'])); ?></strong></p>
	                     <p><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc4',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc4'])); ?></p>
	                  </div>
	                  <div class="timedate_data">
	                     <p><strong><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc5',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc5'])); ?></strong></p>
	                     <p><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc6',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc6'])); ?></p>
	                  </div>
	              	</div>
	          	</div>
	         </div>
	     	</div>
	 	</div>
	</div>
	<?php
}

add_action('goldy_funfact_section_loop', 'goldy_mex_funfact_section_data', 5);
function goldy_mex_funfact_section_data($info_item){
	?>
	<div class="goldy_mex_funfact_wrap wow animate__zoomIn" data-wow-duration="1s">
		<div class="goldy_mex_funfact_content">
			<?php if(!empty($info_item['icon_value'])){ ?>
			<div class="goldy-funfact-icon">
				<i class="fa <?php echo esc_attr($info_item['icon_value'])?>"></i>
			</div>
			<?php } ?>
			<div class="goldy-funfact-title"> 
				<h3><?php echo esc_html($info_item['title']); ?></h3>
			</div>
			<div class="goldy-funfact-description">
				<p><?php echo wp_kses_post($info_item['text']); ?></p>
			</div>
		</div>
	</div>
	<?php
}