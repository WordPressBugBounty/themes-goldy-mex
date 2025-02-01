<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goldy-mex
 */
global $goldy_mex_default;

?>
    <div class="services_section">
        <div class="services_section_info">
            <?php do_action('goldy_our_services_section_data', $goldy_mex_default); ?>
        </div>
    </div>