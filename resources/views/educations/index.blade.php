<x-main-page-layout title="Education">
    @foreach($educations as $education)
        <div class="bg-green-100 border-2 border-yellow-300 shadow-lg rounded-xl p-6 hover:shadow-2xl transition-shadow duration-300">
            <a href="/educations/{{$education->id}}" class="mt-2 flex justify-between items-start">
                <div>
                    <h2 class="font-bold text-lg">{{$education->school_name}}</h2>
                    <h2 class="text-lg">{{$education->stage}}</h2>
                </div>
                <div class="flex flex-col items-end">
                    <div class="text-sm text-gray-500 mt-2">
                        {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }} - 
                        @if($education->endDate)
                            {{ \Carbon\Carbon::parse($education->end_date)->format('M Y') }}
                        @else
                            Present
                        @endif
                    </div>
                    <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                        GPA: {{ $education->gpa }}
                    </span>
                </div>
            </a>
        </div>
        <br>
    @endforeach
</x-main-page-layout>