<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * @var string fieldName of select
     */
    public string $fieldName;

    /**
     * @var string width of select
     */
    public string $width;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldName, $width)
    {
        $this->fieldName = $fieldName;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select');
    }
}
