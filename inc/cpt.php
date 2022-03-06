<?php
function jaxjax1_register_custom_post_types() {
    
/**
 * Register Projects CPT
 */
    $labels = array(
        'name'                  => _x( 'Projects', 'post type general name' ),
        'singular_name'         => _x( 'Project', 'post type singular name'),
        'menu_name'             => _x( 'Projects', 'admin menu' ),
        'name_admin_bar'        => _x( 'Project', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Project' ),
        'add_new_item'          => __( 'Add New Project' ),
        'new_item'              => __( 'New Project' ),
        'edit_item'             => __( 'Edit Project' ),
        'view_item'             => __( 'View Project' ),
        'all_items'             => __( 'All Projects' ),
        'search_items'          => __( 'Search Projects' ),
        'parent_item_colon'     => __( 'Parent Projects:' ),
        'not_found'             => __( 'No Projects found.' ),
        'not_found_in_trash'    => __( 'No Projects found in Trash.' ),
        'archives'              => __( 'Project Archives'),
        'insert_into_item'      => __( 'Insert into Project'),
        'uploaded_to_this_item' => __( 'Uploaded to this Project'),
        'filter_item_list'      => __( 'Filter Projects list'),
        'items_list_navigation' => __( 'Projects list navigation'),
        'items_list'            => __( 'Projects list'),
        'featured_image'        => __( 'Project featured image'),
        'set_featured_image'    => __( 'Set Project featured image'),
        'remove_featured_image' => __( 'Remove Project featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 2,
        'menu_icon'          => 'dashicons-media-code',
        'supports'           => array( 'title','thumbnail', 'excerpt'),
    );

    register_post_type( 'lj-project', $args );
}
add_action( 'init', 'jaxjax1_register_custom_post_types' );



/**
 * Register Projects Custom Taxonomy
 */

function jaxjax1_register_taxonomies() {
    $labels = array(
        'name'              => _x( 'Project Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Project Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Project Type' ),
        'all_items'         => __( 'All Project Types' ),
        'parent_item'       => __( 'Project Type Featured' ),
        'parent_item_colon' => __( 'Project Type Featured:' ),
        'edit_item'         => __( 'Edit Project Type' ),
        'update_item'       => __( 'Update Project Type' ),
        'add_new_item'      => __( 'Add New Project Type' ),
        'new_item_name'     => __( 'New Work Project Type' ),
        'menu_name'         => __( 'Project Type' ),
    );
    $args = array(
        'hierarchical'      => false,
        'has_archive'        => true,
        'public'             => true,
        'publicly_queryable' => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title'),
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-type' ),
    );
    register_taxonomy( 'jaxjax1-project-type', array( 'lj-project' ), $args );
}
add_action( 'init', 'jaxjax1_register_taxonomies');

/**
 * Rewrite flush
 */
function jaxjax1_rewrite_flush() {
    jaxjax1_register_custom_post_types();
    jaxjax1_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'jaxjax1_rewrite_flush' );