<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PreviousStepStepperComponent extends Component
{
    public $link;

    public $index;

    public $subfeature;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link, $index, $subfeature)
    {
        $this->index = $index;
        $this->link = $link;
        $this->subfeature = $subfeature;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.previous-step-stepper-component');
    }
}
