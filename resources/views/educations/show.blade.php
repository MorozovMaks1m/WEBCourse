<x-main-page-layout title="{{ $education->school_name }}">
    <div class="max-w-4xl ml-1 mr-1 bg-gradient-to-r bg-green-100 border-2 border-yellow-300 shadow-md hover:shadow-xl rounded-2xl p-8 transition-all duration-300 transform hover:-translate-y-1">
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

        <div style="display: flex;">
            @if ($education->media->first())
                <img 
                    src="{{ $education->media->first()->getUrl() }}" 
                    alt="Education Image" 
                    style="width: 450px; height: 338px; object-fit: cover;"
                >
            @endif
        </div>
        
        <!-- Description Section -->
        <div class="mt-6">
            <p class="text-gray-700 text-xl">
                {{ $education->description }}
            </p>
        </div>

        <div class="mt-4">
            @if ($education->thesis)
            <h4 class="text-md font-semibold text-gray-800">Thesis: {{ $education->thesis->title }}</h4>
            <ul class="list-disc list-inside mt-2 text-gray-700">
                <div>
                    {{$education->thesis->description}}
                </div>
                @foreach($education->thesis->skills as $skill)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
                @endforeach    
            </ul>
            @endif
        </div>

    </div>
</x-main-page-layout>