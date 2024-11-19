<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WorkExperience extends Component
{

    public string $employerName;
    public string $workTitle;
    public string $startDate;
    public ?string $endDate;
    public string $summary;
    public $projects; // Ensure projects is an array

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $employerName,
        string $workTitle,
        string $startDate,
        ?string $endDate,
        string $summary,
        $projects // Default to empty array if not provided
    ) {
        $this->employerName = $employerName;
        $this->workTitle = $workTitle;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->summary = $summary;
        $this->projects = $projects;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.work-experience');
    }
}
