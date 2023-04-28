<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatatableButtonIcon extends Component
{
    /**
     * @var string icon of button
     */
    public string $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon){
        $this->icon = $icon;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatable-button-icon');
    }
}
