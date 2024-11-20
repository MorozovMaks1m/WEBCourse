<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Education extends Component
{

    public $thesis;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $schoolName,
        public string $description,
        public string $stage,
        $thesis,
        public string $gpa,
        public string $startDate,
        public ?string $endDate,
    ) {
        $this->thesis = $thesis;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.education');
    }
}
