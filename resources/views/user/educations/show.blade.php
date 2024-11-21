<x-main-page-layout title="{{ $education->school_name }}">

    @if(session()->has('success'))
        <div class="bg-green-100 text-green-500 p-2">
            {!! session()->get('success') !!}
        </div>
    @endif

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

    <!-- Thesis Section -->
    <div class="mt-4">
        @if ($education->thesis)
            <!-- Display Existing Thesis -->
            <h4 class="text-md font-semibold text-gray-800">Thesis: {{ $education->thesis->title }}</h4>
            <ul class="list-disc list-inside mt-2 text-gray-700">
                <li>{{ $education->thesis->description }}</li>
                <li>
                    <!-- Display Skills as Badges -->
                    @foreach($education->thesis->skills as $skill)
                        <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{ $skill->name }}</span>
                    @endforeach    
                </li>
            </ul>

            <!-- Edit and Delete Buttons -->
            <div class="mt-4 flex space-x-2">
                <!-- Edit Thesis Button -->
                <a href="{{ route('user.theses.edit', $education->thesis->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
                    Edit Thesis
                </a>

                <!-- Delete Thesis Button -->
                <form action="{{ route('user.theses.destroy', $education->thesis->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this thesis?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors">
                        Delete Thesis
                    </button>
                </form>
            </div>
        @else
            <!-- Add Thesis Button -->
            <div class="mt-4">
                <a href="{{ route('user.theses.create', ['education_id' => $education->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition-colors">
                    Add Thesis
                </a>
            </div>
        @endif
    </div>
</x-main-page-layout>