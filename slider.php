<?php
/**
 * @package Slider
 * @version 1.0.0
 */
/*
Plugin Name: Fusion Slider
Plugin URI: #
Description: A very simple plugin to experience slider.
Author: Hzziq Khatri
Version: 1.0.0
Author URI: https://glorexTech.con/
*/

function enqueue_fusion_slider_plugin_assets() {
   
        // Enqueue the CSS file for Fusion Slider
        wp_enqueue_style( 'fusion-slider-css', plugin_dir_url( __FILE__ ) . '/assets/css/fusion-slider.css', array(), '1.0.0', 'all' );

        // Enqueue the JS file for Fusion Slider
        wp_enqueue_script( 'fusion-slider-js', plugin_dir_url( __FILE__ ) . '/assets/js/fusion-slider.js', array(), '1.0.0', true );
    
}
add_action( 'wp_enqueue_scripts', 'enqueue_fusion_slider_plugin_assets' );


add_shortcode('fusion_home_slider', 'funt_fusion_home_slider');


// Define the shortcode function

function funt_fusion_home_slider() {
    ob_start(); // Start output buffering

    // HTML content
    
      require_once( plugin_dir_path( __FILE__ ) . '/templates/viewSlide.php' );
   
    // Return the buffered content
   
    return ob_get_clean();
}

function slider_create_acf_fields() {

    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key' => 'group_home_carousel',
            'title' => 'Home Carousel',
            'fields' => array(
                array(
                    'key' => 'field_home_carousel',
                    'label' => 'Home Carousel',
                    'name' => 'home_carousel',
                    'type' => 'flexible_content',
                    'layouts' => array(
                        'layout_slider' => array(
                            'key' => 'layout_slider',
                            'name' => 'Fusion-slider',
                            'label' => 'Image Slider with text & cta',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_image',
                                    'label' => 'Image carousel',
                                    'name' => 'image_list',
                                    'type' => 'repeater',
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'image_list_title',
                                            'label' => 'Title',
                                            'name' => 'text',
                                            'type' => 'text',
                                        ),
                                        array(
                                            'key' => 'image_list_text',
                                            'label' => 'Description',
                                            'name' => 'description',
                                            'type' => 'text',
                                        ),
                                        array(
                                            'key' => 'image_banner_image',
                                            'label' => 'Image Banner',
                                            'name' => 'image_thumbnail',
                                            'type' => 'image',
                                            'return_format' => 'url',
                                            'library' => 'all',
                                            'preview_size' => 'medium',
                                        ),
                                        array(
                                            'key' => 'image_cta',
                                            'label' => 'CTA',
                                            'name' => 'cta',
                                            'type' => 'link',
                                            'return_format' => 'array',
                                        ),
                                    ),
                                    'layout' => 'table',
                                    'button_label' => 'Add Row',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
        ));
    }
}

add_action('init', 'slider_create_acf_fields');
