<?php
/*
Plugin Name: SCM Events Engine
Description: Allows clients to create and manage events and publish them to Facebook.
Version: 0.2.0
Author: Screechy Cat Media
Author URI: https://screechycatmedia.com
*/

// Register Custom Post Type for Events
function scm_events_engine_register_event_post_type() {
    $labels = array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'menu_name' => 'Events',
        'name_admin_bar' => 'Event',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Event',
        'new_item' => 'New Event',
        'edit_item' => 'Edit Event',
        'view_item' => 'View Event',
        'all_items' => 'All Events',
        'search_items' => 'Search Events',
        'not_found' => 'No events found.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'),
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    );

    register_post_type('scm_event', $args);
}
add_action('init', 'scm_events_engine_register_event_post_type');

// Placeholder: Push event to Facebook on publish
function scm_events_engine_push_to_facebook($post_ID, $post) {
    if ($post->post_type !== 'scm_event' || $post->post_status !== 'publish') return;

    // Future: Add API logic here to push event to Facebook Page
    error_log("Event {$post_ID} would be pushed to Facebook here.");
}
add_action('publish_post', 'scm_events_engine_push_to_facebook', 10, 2);
add_action('publish_scm_event', 'scm_events_engine_push_to_facebook', 10, 2);
