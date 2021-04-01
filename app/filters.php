<?php

/**
 * Theme filters.
 */

namespace App;

/* Add nothing to the excerpt */
add_filter('excerpt_more', function() {
    return '';
});

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

/* Disable adding p tag to descriptions */
remove_filter('term_description', 'wpautop');
