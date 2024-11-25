<x-main-page-layout title="{{ $work->title }}">
    @if ($work->media->first() != null) 
        <img src="{{$work->media->first()->getUrl()}}">
    @endif

    <!-- Header Section: Company and Duration -->
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $work->company }}</h2>
        </div>
        <div class="mt-4 md:mt-0 text-sm text-gray-500">
            {{ \Carbon\Carbon::parse($work->start_date)->format('M Y') }} - 
            @if($work->end_date)
                {{ \Carbon\Carbon::parse($work->end_date)->format('M Y') }}
            @else
                Present
            @endif
        </div>
    </div>
    
    <!-- Description Section -->
    <div class="mt-6">
        <p class="text-gray-700 text-xl">
            {{ $work->description }}
        </p>
    </div>


    <!-- Add Work Project Button -->
    <div class="mt-4">
        <a href="{{ route('user.workprojects.create', ['work_id' => $work->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition-colors">
            Add Work Project
        </a>
    </div>

    <!-- Work Projects Section -->
    <div class="mt-4">
        <h4 class="text-md font-semibold text-gray-800">Projects:</h4>

        @foreach($work->workprojects as $project)
            <!-- Display Existing Work Projects -->
            <h4 class="text-md font-semibold text-gray-800">Work Project: {{ $project->title }}</h4>
            <ul class="list-disc list-inside mt-2 text-gray-700">
                <li>{{ $project->description }}</li>
                <li>
                    <!-- Display Skills as Badges -->
                    @foreach($project->skills as $skill)
                        <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{ $skill->name }}</span>
                    @endforeach    
                </li>
            </ul>

            <!-- Edit and Delete Buttons -->
            <div class="mt-4 flex space-x-2">
                <!-- Edit Work Project Button -->
                <a href="{{ route('user.workprojects.edit', $project->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
                    Edit Work Project
                </a>

                <!-- Delete Work Project Button -->
                <form action="{{ route('user.workprojects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this work project?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors">
                        Delete Work Project
                    </button>
                </form>
            </div>
            <br>
        @endforeach
    </div>


    {{-- <div class="mt-4">
        <h4 class="text-md font-semibold text-gray-800">Projects:</h4>
        <ul class="list-disc list-inside mt-2 text-gray-700">
            @foreach($work->workprojects as $project)
                <li><b>{{ $project->title }}</b></li>
                <div>
                    {{ $project->description }}
                </div>

                <div>
                    @foreach($project->skills as $skill)
                        <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
                    @endforeach
                </div>
            @endforeach

        </ul>
    </div> --}}
</x-main-page-layout>