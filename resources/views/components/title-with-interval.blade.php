<h2 class="font-bold text-2xl">{{$mainTitle}}</h2>
<h2 class="font-bold text-xl">{{$secondTitle}}</h2>
<div>
    From
    {{ \Carbon\Carbon::parse($dateStart)->format('Y-m') }}
    to
    @if($dateEnd != null)
        {{  \Carbon\Carbon::parse($dateEnd)->format('Y-m') }}
    @else
        present
    @endif
</div>