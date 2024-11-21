<x-main-page-layout title="Create New Thesis">
    <form
        action="{{ route('user.theses.store') }}"
        method="POST" 
        class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md">
        @csrf

        <!-- Education Field -->
        <input type="hidden" name="education_id" value="{{$education->id}}">

        <!-- Title Field -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Thesis Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title') }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                required
            >
            @error('title')
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
            >{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit and Undo Buttons -->
        <div class="flex justify-end items-center space-x-4">
            <a href="{{ route('user.educations.show', ['education' => $education->id]) }}" class="text-gray-600 hover:text-gray-800">
                Undo
            </a>
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors"
            >
                Add New Thesis
            </button>
        </div>
    </form>
</x-main-page-layout>
