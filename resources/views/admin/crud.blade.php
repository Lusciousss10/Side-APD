<x-apps-layout>
    <div class="py-9">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-4xl font-semibold text-center text-gray-900 dark:text-white">
                <h1>User</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4">
        <!-- Add New Button -->
        <div class="flex justify-end mb-4">
            <a href="add/user" class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-500 rounded hover:bg-green-600">
                Add New
            </a>
        </div>
    
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-200 dark:bg-gray-900">
                    <tr class="text-left text-gray-700 dark:text-gray-300">
                        <th class="px-4 py-2 border-b text-center border-gray-300 dark:border-gray-600">Name</th>
                        <th class="px-4 py-2 border-b text-center border-gray-300 dark:border-gray-600">Email</th>
                        <th class="px-4 py-2 border-b text-center border-gray-300 dark:border-gray-600">Usertype</th>
                        <th colspan="2" class="px-4 py-2 text-center border-b border-gray-300 dark:border-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-200">
                    @if (count($all_users) > 0)
                        @foreach ($all_users as $item)
                            <tr class="border-b border-gray-300 dark:border-gray-600">
                                <td class="px-4 py-2 text-center">{{ $item->name }}</td>
                                <td class="px-4 py-2 text-center">{{ $item->email }}</td>
                                <td class="px-4 py-2 text-center">{{ $item->usertype }}</td>
                                <td class="px-4 py-2 text-center">
                                    <a href="/edit/{{ $item->id }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-500 dark:bg-blue-600 rounded hover:bg-blue-600 dark:hover:bg-blue-700">Edit</a>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <form action="/delete/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-500 dark:bg-red-600 rounded hover:bg-red-600 dark:hover:bg-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">No User Found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>    
</x-apps-layout>
