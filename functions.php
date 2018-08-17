<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Define case study custom post type
 */

add_action('init','create_custom_post_type_casestudy');

function create_custom_post_type_casestudy() {
    $labels = array(
        'name' => 'Case Studies',
        'singular_name' => 'Case Study',
        'add_new' => 'Add New Case Study',
        'add_new_item' => 'Add New Case Study',
        'edit_item' => 'Edit Case Study',
        'new_item' => 'New Case Study',
        'view_item' => 'View Case Study',
        'search_items' => 'Search Case Studies',
        'not_found' => 'No case studies found',
        'not_found_in_trash' => 'No case studies found in Trash',
        'parent_item_colon' => '',
    );
    
    $args = array(
        'label' => __('Case Studies'),
        'labels' => $labels, // from array above
        'public' => true,
        'can_export' => true,
        'show_ui' => true,
        '_builtin' => false,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-star-empty',
        'hierarchical' => false,
        'rewrite' => array( "slug" => "case-studies" ), // defines URL base
        'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
        'show_in_nav_menus' => true,
        'taxonomies' => array( 'casestudies_category', 'post_tag'), // own categories
        'has_archive' => false
    );

    register_post_type('case_studies', $args); // used as internal identifier
}