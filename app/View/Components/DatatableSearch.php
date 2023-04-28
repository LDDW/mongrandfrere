<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatatableSearch extends Component
{
    /**
     * @var string placeholder of input
     */
    public string $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatable-search');
    }
}
