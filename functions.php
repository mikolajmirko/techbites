<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'tb'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Run The Theme
|--------------------------------------------------------------------------
|
| Once we have the theme booted, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

require_once __DIR__ . '/bootstrap/app.php';


/**
 * Custom dynamic search
 */
function data_search_fetch() {
    $s = esc_attr($_POST['keyword']);

    if (!empty($s)) {
        global $sublanguage;
        $the_query = new WP_Query(
            array(
                's' => $s,
                'posts_per_page' => 5,
                'post_type' => 'post',
                'category__not_in' => array(7)
            )
        );
        if($the_query->have_posts()) :
            while($the_query->have_posts()): $the_query->the_post();
                if(!empty($sublanguage->get_post_field_translation(get_post(), 'post_title', $sublanguage->current_language))) :
                    ?>
                        <a class="block truncate w-full mt-2 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent" href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a>
                    <?php
                endif;
            endwhile;
            wp_reset_postdata();
        endif;
    }
    wp_die();
}
add_action('wp_ajax_nopriv_data_search_fetch', 'data_search_fetch');

/**
 * Custom login stylea
 */
function custom_login_page() {
?>
    <style type="text/css">
        body.login {
            background-color: #3F3D56;
        }
        body.login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/public/images/logo.svg);
            width: 300px;
            background-size: 300px 60px;
            background-repeat: no-repeat;
        	padding-bottom: 0px;
        }
        body.login div#login form#loginform {
            border-radius: 0.5rem;
            background-color: white;
            border: 0 none;
            box-shadow: rgb(255, 255, 255) 0px 0px 0px 0px, rgba(10, 10, 10, 0.05) 0px 0px 0px 1px, rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
        }
        body.login div#login p#backtoblog a, body.login div#login p#nav a, .privacy-policy-link, .privacy-policy-link:focus, .privacy-policy-link:hover {
            color: white;
        }
        body.login div#login form#loginform p.submit input#wp-submit {
            background-color: #2D69FF;
            border-radius: 0.5rem;
            padding: 0.25rem 1rem;
            font-weight: bold;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'custom_login_page');


/**
 * Custom login link and name
 */
function my_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title() {
    return 'TechBites';
}
add_filter('login_headertitle', 'my_login_logo_url_title');
