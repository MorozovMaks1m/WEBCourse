<x-main-page-layout title="{{ $education->school_name }}">
    <!-- Header Section: Company and Duration -->
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $education->stage }}</h2>
        </div>
        <div class="mt-4 md:mt-0 text-sm text-gray-500">
            {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }} - 
            @if($education->end_date)
                {{ \Carbon\Carbon::parse($education->end_date)->format('M Y') }}
            @else
                Present
            @endif
        </div>
    </div>
    
    <!-- Description Section -->
    <div class="mt-6">
        <p class="text-gray-700 text-xl">
            {{ $education->description }}
        </p>
    </div>

    <div class="mt-4">
        <h4 class="text-md font-semibold text-gray-800">Thesis: {{ $education->thesis->title }}</h4>
        <ul class="list-disc list-inside mt-2 text-gray-700">
            <div>
                {{$education->thesis->description}}
            </div>
            @foreach($education->thesis->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
            @endforeach    
        </ul>
    </div>
</x-main-page-layout>