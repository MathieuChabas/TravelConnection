<?php

class TravelConnectionTheme {

    function __construct() {
        // Register action/filter callbacks
        add_action('after_setup_theme', array($this, 'init'));
        add_filter('excerpt_length', array($this, 'custom_excerpt_length'));

    }

    /**
     * Theme setup
     */
    function init() {
        // Register navigation menus
        register_nav_menus(
            array(
                'header-menu' => __('Header Menu', 'travelconnection')
            )
        );
        wp_enqueue_style('boostrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null );
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null , true );
    }

    /**
     * Filter callbacks
     * ----------------
     */

    /**
     * Customize post excerpt length
     *
     * @return int The new excerpt length in words
     */
    function custom_excerpt_length () {
        return 100;
    }

    /**
     * Utility methods
     * ---------------
     */

    /**
     * Get the category id from a category name
     *
     * @param string $cat_name The category name
     * @return int The category ID
     */
    function get_category_id ($cat_name) {
        $term = get_term_by('name', $cat_name, 'category');
        return $term->term_id;
    }
}

// Instantiate theme
$TravelConnectionTheme = new TravelConnectionTheme();
