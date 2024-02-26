<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectList extends Component
{
    public $dataList;
    public $col;
    public $name;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($dataList, $col = null, $name = null, $value = null)
    {
        $this->dataList = $dataList;
        $this->col = $col ?: 'name';
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-list');
    }
}
