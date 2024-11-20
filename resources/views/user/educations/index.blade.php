<x-main-page-layout title="Education Admin Panel">

    @if(session()->has('success'))
        <div class="bg-green-100 text-green-500 p-2">
            {!! session()->get('success') !!}
        </div>
    @endif


    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Education</h1>
        <a href="{{ route('user.educations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
            Add Education
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        School
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Stage
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($educations as $education)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                            {{ $education->school_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                            {{ $education->stage }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-right">
                            <a href="{{ route('user.educations.show', $education) }}" class="text-green-500 hover:text-green-700 mr-2">
                                Inspect
                            </a>
                            <!-- Edit Link -->
                            <a href="{{ route('user.educations.edit', $education) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                Edit
                            </a>
                        
                            <!-- Delete Form -->
                            <form action="{{ route('user.educations.destroy', $education) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    onclick="return confirm('Are you sure you want to delete this education experience?')" 
                                    class="text-red-500 hover:text-red-700 font-medium"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                            No education experiences found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main-page-layout>
