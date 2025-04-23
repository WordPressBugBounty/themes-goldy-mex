<?php

if ( ! function_exists( 'goldy_mex_breadcrumb_title' ) ) {
	function goldy_mex_breadcrumb_title() {
		
		if ( is_home() || is_front_page()):
			
			single_post_title();
			
		elseif ( is_day() ) : 
										
			printf( esc_html( 'Daily Archives: %s', 'experoner' ), get_the_date() );
		
		elseif ( is_month() ) :
		
			printf( esc_html( 'Monthly Archives: %s', 'experoner' ), (get_the_date( 'F Y' ) ));
			
		elseif ( is_year() ) :
		
			printf( esc_html( 'Yearly Archives: %s', 'experoner' ), (get_the_date( 'Y' ) ) );
			
		elseif ( is_category() ) :
		
			printf( esc_html( 'Category Archives: %s', 'experoner' ), (single_cat_title( '', false ) ));

		elseif ( is_tag() ) :
		
			printf( esc_html( 'Tag Archives: %s', 'experoner' ), (single_tag_title( '', false ) ));
			
		elseif ( is_404() ) :

			printf( esc_html( 'Error 404', 'experoner' ));
			
		elseif ( is_author() ) :
		
			printf( esc_html( 'Author: %s', 'experoner' ), (get_the_author( '', false ) ));			
			
		elseif ( class_exists( 'woocommerce' ) ) : 
			
			if ( is_shop() ) {
				woocommerce_page_title();
			}
			
			elseif ( is_cart() ) {
				the_title();
			}
			
			elseif ( is_checkout() ) {
				the_title();
			}
			
			else {
				the_title();
			}
		else :
				the_title();
				
		endif;
	}
}

if ( ! function_exists( 'goldy_mex_breadcrumb_sections' ) ) :
	function goldy_mex_breadcrumb_sections( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/breadcrumb' );
	}
endif;
if ( ! function_exists( 'goldy_mex_featuredimage_slider' ) ) :
	function goldy_mex_featuredimage_slider( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/featured_slider' );
	}
endif;
if ( ! function_exists( 'goldy_mex_featured_section' ) ) :
	function goldy_mex_featured_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/featured_section' );
	}
endif;
if ( ! function_exists( 'goldy_mex_about_section' ) ) :
	function goldy_mex_about_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/about_section' );
	}
endif;
if ( ! function_exists( 'goldy_mex_our_portfolio_section' ) ) :
	function goldy_mex_our_portfolio_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/our_portfolio' );
	}
endif;
if ( ! function_exists( 'goldy_mex_appointment_section' ) ) :
	function goldy_mex_appointment_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/book_an_appointment' );
	}
endif;
if ( ! function_exists( 'goldy_mex_our_team_section' ) ) :
	function goldy_mex_our_team_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/our_team' );
	}
endif;
if ( ! function_exists( 'goldy_mex_our_testimonial_section' ) ) :
	function goldy_mex_our_testimonial_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/our_testimonial' );
	}
endif;
if ( ! function_exists( 'goldy_mex_social_section' ) ) :
	function goldy_mex_social_section( $selector = 'header' ) {
		get_template_part( 'template-parts/social_info/social_secion' );
	}
endif;
if ( ! function_exists( 'goldy_mex_our_sponsors_section' ) ) :
	function goldy_mex_our_sponsors_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/our_sponsors' );
	}
endif;
if ( ! function_exists( 'goldy_mex_services_section' ) ) :
	function goldy_mex_services_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/services_section' );
	}
endif;
if ( ! function_exists( 'goldy_mex_widget_section' ) ) :
	function goldy_mex_widget_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/widget_section' );
	}
endif;
if ( ! function_exists( 'goldy_mex_funfact_section_section' ) ) :
	function goldy_mex_funfact_section_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/funfact_section' );
	}
endif;


// drag and drop pro version


if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}



/**
 * The custom control class
 */
	
class goldy_mex_recommand_about_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-about-active';

	public $text = '';

	public $reg_url = '';

	public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-about-active'] = 'goldy_mex_recommand_about_activ_section';
	return $controls;

} );


class goldy_mex_recommand_appoinment_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-appoinment-active';

	public $text = '';

	public $reg_url = '';

    public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-appoinment-active'] = 'goldy_mex_recommand_appoinment_activ_section';
	return $controls;

} );

class goldy_mex_recommand_portfolio_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-portfolio-active';

	public $text = '';

	public $reg_url = '';

    public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-portfolio-active'] = 'goldy_mex_recommand_portfolio_activ_section';
	return $controls;

} );

class goldy_mex_recommand_our_team_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-ourteam-active';

	public $text = '';

	public $reg_url = '';

    public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-ourteam-active'] = 'goldy_mex_recommand_our_team_activ_section';
	return $controls;

} );

class goldy_mex_recommand_our_testminial_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-ourtestminial-active';

	public $text = '';

	public $reg_url = '';

	public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-ourtestminial-active'] = 'goldy_mex_recommand_our_testminial_activ_section';
	return $controls;

} );

class goldy_mex_recommand_our_services_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-ourservices-active';

	public $text = '';

	public $reg_url = '';

    public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-ourservices-active'] = 'goldy_mex_recommand_our_services_activ_section';
	return $controls;

} );

class goldy_mex_recommand_breadcrumb_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-breadcrumb-active';

	public $text = '';

	public $reg_url = '';

    public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-breadcrumb-active'] = 'goldy_mex_recommand_breadcrumb_activ_section';
	return $controls;

} );

class goldy_mex_recommand_ordering_activ_section extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-ordering-active';

	public $text = '';

	public $reg_url = '';

    public $goldy_name = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_name'] = $this->goldy_name;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="custom-action">
			<div class="silvery_custom_message">
				<h2><?php echo esc_html('Recommand Plugin','goldy-mex'); ?></h2>
				<h4 class="customize-control-title"><?php echo esc_html( 'Install and activate Slivery Extender plugin for taking full advantage of all the features this theme has to offer ', 'goldy-mex' );?><?php echo $this->goldy_name; ?>
				</h4>
			</div>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a data-slug="slivery-extender" class="button button-secondary alignright button_pro activate-now button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html( $this->text ); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-ordering-active'] = 'goldy_mex_recommand_ordering_activ_section';
	return $controls;

} );

class goldy_drag_drop_option_control extends Kirki\Control\Base {

	public $type = 'goldy-mex-gp-upsell-drag-drop-option';

	public $text = '';

	public $reg_url = '';

    public $goldy_label = '';

    public function json() {
        $json = parent::json();
        $json['text'] = $this->text;
        $json['reg_url'] = esc_url($this->reg_url);
        $json['goldy_label'] = $this->goldy_label;
        return $json;
    }

	public function render_content() { ?>
		
		<div class="goldy-custom-action">
			<label for="pro-message" class="customize-control-title title_pro"><?php echo esc_html( $this->text ); ?><?php echo $this->goldy_label; ?> </label>
        	<p class="plugin-card-slivery-extender action_button ">
            	<a class="button button-secondary alignright button_pro button button-primary" href="<?php echo esc_url($this->reg_url);?>"><?php echo esc_html('Premium version'); ?></a>
            </p>
        </div>
		<?php
	}
}

// Register our custom control with Kirki.
add_filter( 'kirki_control_types', function( $controls ) {
	$controls['goldy-mex-gp-upsell-drag-drop-option'] = 'goldy_drag_drop_option_control';
	return $controls;

} );