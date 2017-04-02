<?php

class TravelConnectionTheme {

    function __construct() {
        // Register action/filter callbacks
        add_action('after_setup_theme', array($this, 'init'));
        add_filter('excerpt_length', array($this, 'custom_excerpt_length'));
        add_filter( 'body_class', array($this, 'add_slug_body_class'));
        add_action('after_setup_theme', array($this, 'remove_admin_bar'));
        // Register sidebars
        add_action( 'widgets_init', array($this, 'travelconnection_widgets_init') );
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
        add_theme_support( 'post-thumbnails' );
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), null );
        wp_enqueue_style('boostrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null );
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), null );

        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null , true );
    }

    //Page Slug Body Class

    function add_slug_body_class( $classes ) {
        global $post;
        if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
        }
        return $classes;
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

    function remove_admin_bar() {
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(false);
        }
    }

    function travelconnection_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Widget Area', 'travelconnection' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'travelconnection' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
}

// Instantiate theme
$TravelConnectionTheme = new TravelConnectionTheme();
