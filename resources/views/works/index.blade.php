<x-main-page-layout title="Work experience">
    @foreach($works as $work)
        <div class="bg-blue-100 border-2 border-orange-300 shadow-lg rounded-xl p-6 hover:shadow-2xl transition-shadow duration-300">
            <a href="/works/{{$work->id}}" class="mt-2 flex justify-between items-start">
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
        </div>
        <br>
    @endforeach

</x-main-page-layout>