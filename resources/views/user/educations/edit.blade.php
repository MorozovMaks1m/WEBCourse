<x-main-page-layout title="Edit Education">
    <form 
        action="{{ route('user.educations.update', $education) }}" 
        method="POST" 
        class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md"
    >
        @csrf
        @method('PUT')

        <!-- School Name Field -->
        <div class="mb-4">
            <label for="school_name" class="block text-gray-700">School name</label>
            <input 
                type="text" 
                name="school_name" 
                id="school_name" 
                value="{{ old('school_name', $education->school_name) }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                required
            >
            @error('school_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Stage Field -->
        <div class="mb-4">
            <label for="stage" class="block text-gray-700">Title</label>
            <input 
                type="text" 
                name="stage" 
                id="stage" 
                value="{{ old('stage', $education->stage) }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                required
            >
            @error('stage')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- GPA Field -->
        <div class="mb-4">
            <label for="gpa" class="block text-gray-700">GPA</label>
            <input 
                type="number" 
                name="gpa" 
                id="gpa" 
                value="{{ old('gpa', $education->gpa) }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                min="0" 
                max="5" 
                step="0.01" 
                required
            >
            @error('gpa')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description Field -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea 
                name="description" 
                id="description" 
                rows="4" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                required
            >{{ old('description', $education->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- **Start Date Field** -->
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input 
                type="date" 
                name="start_date" 
                id="start_date" 
                value="{{ old('start_date', $education->start_date ? $education->start_date->format('Y-m-d') : '') }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                required
            >
            @error('start_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">End Date <span class="text-gray-500">(Optional)</span></label>
            <input 
                type="date" 
                name="end_date" 
                id="end_date" 
                value="{{ old('end_date', $education->end_date ? $education->end_date->format('Y-m-d') : '') }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
            >
            @error('end_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit and Undo Buttons -->
        <div class="flex justify-end items-center space-x-4">
            <a 
                href="{{ route('user.educations.index') }}" 
                class="text-gray-600 hover:text-gray-800"
            >
                Undo
            </a>
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors"
            >
                Save Changes
            </button>
        </div>
    </form>
</x-main-page-layout>