<?php

/**
 * Theme filters.
 */

namespace App;

/* Add "… Continued" to the excerpt */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'tb'));
});

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

/* Disable adding p tag to descriptions */
remove_filter('term_description', 'wpautop');
