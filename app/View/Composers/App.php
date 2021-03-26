<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'catalog_page_id' => 90,
            'about_page_id' => 92,
            'category_menu_id' => 32,
            'bottom_menu_id' => 32,
            'category_none_id' => 7,
            'category_colors' => $this->categoryColors()
        ];
    }

    /**
     * Color array fo categories.
     *
     * @return array
     */
    public function categoryColors() {
        return [
            'vision' => '#c05989',
            'study' => '#5588a6',
            'concept' => '#43af90',
            'design' => '#89c15f',
            'development' => '#eeac3a',
            'evaluation' => '#d14958',
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }
}
