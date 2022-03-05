<?php

namespace App\View\Components\alert;

use Illuminate\View\Component;

class info extends Component
{
    public $title, $desc, $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $desc, $class='')
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert.info');
    }
}
