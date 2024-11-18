<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainPageLayout extends Component
{
    public $title;
    public $newYear;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $title = null)
    {
        $this->title = $title;
        $this->newYear = $this->isNewYear();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.page.main');
    }

    private function isNewYear(): bool {
        return today()->day == '1' && today()->month = '1';
    }
}
