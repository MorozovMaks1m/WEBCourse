<x-main-page-layout title="Work Experience Admin Panel">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Work Experience</h1>
        <a href="{{ route('user.works.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
            Create Work
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Company
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($works as $work)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                            {{ $work->company }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                            {{ $work->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-right">
                            <a href="{{ route('user.works.edit', $work) }}" class="text-blue-500 hover:text-blue-700">
                                Edit
                            </a>
                            <!-- Optionally, add a delete button here -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                            No work experiences found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-main-page-layout>
