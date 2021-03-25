<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-single',
        'partials.banner'
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'title' => $this->title(),
            'is_translated' => $this->is_translated()
        ];
    }

    /**
     * Returns true if post has a translation in current language
     *
     * @return bool
     */
    public function is_translated() {
        global $sublanguage;
        return is_single() ? empty($sublanguage->get_post_field_translation(get_post(), 'post_title', $sublanguage->current_language)) : true;
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Bites', 'tb');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(
                __('Search Results for %s', 'tb'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Page not found', 'tb');
        }

        return get_the_title();
    }
}
