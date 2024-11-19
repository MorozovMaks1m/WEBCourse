<!-- resources/views/components/work-experience.blade.php -->

@props([
    'employerName',
    'workTitle',
    'startDate',
    'endDate', // Can be null if currently employed
    'summary',
    'projects' => [], // Array of project names
])

<div class="bg-blue-100 border-2 border-orange-300 shadow-lg rounded-xl p-6 hover:shadow-2xl transition-shadow duration-300">
    <div class="flex justify-between items-center">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">{{ $workTitle }}</h3>
            <p class="text-gray-600">{{ $employerName }}</p>
        </div>
        <div class="text-sm text-gray-500">
            {{ \Carbon\Carbon::parse($startDate)->format('M Y') }} - 
            @if($endDate)
                {{ \Carbon\Carbon::parse($endDate)->format('M Y') }}
            @else
                Present
            @endif
        </div>
    </div>
    
    <div class="mt-4">
        <p class="text-gray-700">{{ $summary }}</p>
    </div>
    
    
    <div class="mt-4">
        <h4 class="text-md font-semibold text-gray-800">Projects:</h4>
        <ul class="list-disc list-inside mt-2 text-gray-700">
            @foreach($projects as $project)
                <li>{{ $project->title }}</li>

                <div>
                    @foreach($project->skills as $skill)
                        <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
                    @endforeach
                </div>
            @endforeach

        </ul>
    </div>
</div>

