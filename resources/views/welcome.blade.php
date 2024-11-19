<x-main-page-layout title="Morozov Maksim Personal Page"> 

    <h2 class="font-bold text-3xl">Work experience</h2>

    @foreach($works as $work)
    <div class="mt-4">
        <h2 class="font-bold text-2xl">{{$work->company}}</h2>
        <h2 class="font-bold text-xl">{{$work->title}}</h2>
        <div>
            From
            {{ \Carbon\Carbon::parse($work->start_date)->format('Y-m') }}
            to
            @if($work->end_date != null)
                {{  \Carbon\Carbon::parse($work->end_date)->format('Y-m') }}
            @else
                present
            @endif 

        </div>
        <p class="text-sm">{{$work->summary(100)}}</p>
    </div>
    @endforeach

</x-main-page-layout>