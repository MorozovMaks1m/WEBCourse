<x-main-page-layout title="Create New Work">
    <form
        action="{{ route('user.works.store') }}"
        method="POST" 
        class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md">
        @csrf

        <!-- Company Field -->
        <div class="mb-4">
            <label for="company" class="block text-gray-700">Company</label>
            <input 
                type="text" 
                name="company" 
                id="company" 
                value="{{ old('company') }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                required
            >
            @error('company')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Title Field -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
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

        <!-- **Start Date Field** -->
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input 
                type="date" 
                name="start_date" 
                id="start_date" 
                value="{{ old('start_date') }}" 
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
                value="{{ old('end_date') }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
            >
            @error('end_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit and Undo Buttons -->
        <div class="flex justify-end items-center space-x-4">
            <a href="{{ route('user.works.index') }}" class="text-gray-600 hover:text-gray-800">
                Undo
            </a>
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors"
            >
                Add New Work
            </button>
        </div>
    </form>
</x-main-page-layout>
