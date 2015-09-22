<?php
/*
Plugin Name: Testimonials Reviews
Plugin URI: http://github.com/tysonchamp/
Description: Declares a plugin that will create a custom post type displaying reviews.
Version: 1.0
Author: Tyson
Author URI: http://fb.com/tysonchampno1
License: GPLv3
*/

// initialization phase every time a page is generated.
add_action( 'init', 'create_testimonial_reviews' );

function create_testimonial_reviews() {
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => 'Testimonials',
                'singular_name' => 'Testimonials',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Testimonials',
                'edit' => 'Edit',
                'edit_item' => 'Edit Testimonials',
                'new_item' => 'New Testimonials',
                'view' => 'View',
                'view_item' => 'View Testimonials',
                'search_items' => 'Search Testimonials',
                'not_found' => 'No Movie Testimonials',
                'not_found_in_trash' => 'No Testimonials found in Trash',
                'parent' => 'Parent Testimonials'
            ),

            'description',
            'public' => true,
            'menu_position' => 5,
            'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions' ),
            'show_in_admin_bar' => true,
            'taxonomies' => array( '' ),
            'has_archive' => true
        )
    );
}

?>

<?php 

// Register a Function to Force the Dedicated Template
add_filter( 'template_include', 'include_template_function', 1 );

function include_template_function( $template_path ) {
    if ( get_post_type() == 'testimonials' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'testimonial_reviews_template.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/testimonial_reviews_template.php';
            }
        }
    }
    return $template_path;
}

?>
