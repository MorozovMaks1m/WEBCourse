<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TitleWithInterval extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $mainTitle,
        public string $secondTitle,
        public string $dateStart,
        public ?string $dateEnd,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title-with-interval');
    }
}


// <h2 class="font-bold text-2xl">{{$mainTitle}}</h2>
// <h2 class="font-bold text-xl">{{$secondTitle}}</h2>
// <div>
//     From
//     {{ \Carbon\Carbon::parse($dateStart)->format('Y-m') }}
//     to
//     @if($dateEnd != null)
//         {{  \Carbon\Carbon::parse($dateEnd)->format('Y-m') }}
//     @else
//         present
//     @endif 
// </div>