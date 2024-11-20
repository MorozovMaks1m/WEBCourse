<x-main-page-layout title="Work experience">
    @foreach($works as $work)
        <a href="/works/{{$work->id}}" class="mt-4 flex justify-between items-start">
            <div>
                <h2 class="font-bold text-lg">{{$work->company}}</h2>
                <h2 class="text-lg">{{$work->title}}</h2>
            </div>
            <div class="flex flex-col items-end mt-4 md:mt-0 text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($work->start_date)->format('M Y') }} - 
                @if($work->end_date)
                    {{ \Carbon\Carbon::parse($work->end_date)->format('M Y') }}
                @else
                    Present
                @endif
            </div>
        </a>
        <br>
    @endforeach

</x-main-page-layout>