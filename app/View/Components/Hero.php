<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Hero extends Component
{
    /**
     * The hero title
     *
     * @var string
     */
    public $title;

    /**
     * The alert description.
     *
     * @var string
     */
    public $description;

    /**
     * The alert graphic.
     *
     * @var string
     */
    public $graphic;

    /**
     * Create the component instance.
     *
     * @param  string  $title
     * @param  string  $description
     * @param  string  $graphic
     * @return void
     */
    public function __construct($title = null, $description = null, $graphic = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->graphic = $graphic;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.hero');
    }
}
