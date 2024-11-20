<!-- resources/views/components/work-experience.blade.php -->

@props([
    'schoolName',
    'description',
    'stage',
    'thesis',
    'gpa',
    'startDate',
    'endDate', // Can be null if currently employed
])

<div class="bg-green-100 border-2 border-yellow-300 shadow-lg rounded-xl p-6 hover:shadow-2xl transition-shadow duration-300">
    <!-- Header Section -->
    <div class="flex justify-between items-start">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">{{ $schoolName }}</h3>
            <p class="text-gray-600">{{ $stage }}</p>
        </div>
        <div class="flex flex-col items-end">
            <div class="text-sm text-gray-500 mt-2">
                {{ \Carbon\Carbon::parse($startDate)->format('M Y') }} - 
                @if($endDate)
                    {{ \Carbon\Carbon::parse($endDate)->format('M Y') }}
                @else
                    Present
                @endif
            </div>
            <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                GPA: {{ $gpa }}
            </span>
        </div>
    </div>
    
    <!-- Description Section -->
    <div class="mt-4">
        <p class="text-gray-700">{{ $description }}</p>
    </div>
    
    <!-- Thesis and Skills Section -->
    @if ($thesis)
        <div class="mt-4">
            <div class="flex justify-between items-center">
                <p class="text-gray-700">Thesis: <span class="font-semibold">{{ $thesis->title }}</span></p>
            </div>
            <div class="mt-2 flex flex-wrap gap-2">
                @foreach($thesis->skills as $skill)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>
    @endif
</div>