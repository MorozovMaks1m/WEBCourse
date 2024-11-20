<x-main-page-layout title="Work experience">
    @foreach($works as $work)
        <a href="/works/{{$work->id}}" class="mt-4">
            <h2 class="font-bold text-lg">{{$work->company}}</h2>
            <h2 class="text-lg">{{$work->title}}</h2>
            <div class="mt-4 md:mt-0 text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($work->start_date)->format('M Y') }} - 
                @if($work->end_date)
                    {{ \Carbon\Carbon::parse($work->end_date)->format('M Y') }}
                @else
                    Present
                @endif
            </div>
            <br>
        </a>
    @endforeach

</x-main-page-layout>