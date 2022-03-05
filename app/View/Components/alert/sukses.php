<?php

namespace App\View\Components\alert;

use Illuminate\View\Component;

class sukses extends Component
{
    public $title, $desc, $class, $another;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $desc, $class='', $another='')
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->class = $class;
        $this->another = $another;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert.sukses');
    }
}
