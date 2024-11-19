<x-main-page-layout title="Morozov Maksim Personal Page"> 

    @foreach($works as $work)
    <div class="mt-4">
        <h2 class="font-bold text-lg">{{$work->company}}</h2>
        <h3 class="font-bold text-lg">{{$work->title}}</h3>
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
        <p class="text-sm">{{$work->description}}</p>
    </div>
    @endforeach

    Hello world
</x-main-page-layout>