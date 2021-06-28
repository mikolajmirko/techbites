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
        'partials.entry-meta',
        'partials.content',
        'partials.content-single',
        'partials.banner',
        'components.post-card'
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
            'is_translated' => $this->is_translated(),
            'read_time' => $this->read_time()
        ];
    }

    /**
     * Returns true if post has a translation in current language
     *
     * @return bool
     */
    public function is_translated() {
        global $sublanguage;
        if(!is_home() && !is_404() && !is_category()) {
            return empty($sublanguage->get_post_field_translation(get_post(), 'post_title', $sublanguage->current_language));
        } else {
            return false;
        }
    }

    /**
     * Returns read time in minutes
     *
     * @return string
     */
    public function read_time() {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $readingtime = ceil($word_count / 180);
        $total = $readingtime . ' ' . _n('minute', 'minutes', $readingtime, 'tb');
        return $total;
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
