<x-apps-layout>
    <div class="py-9">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-4xl font-semibold text-center text-white">
                <h1>User</h1>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray overflow-hidden shadow-md rounded-lg">
                <div class="p-6">
                    <div class="container mx-auto">
                        <div class="bg-gray-900 border border-gray-800 rounded-lg shadow">
                            <div class="bg-gray-800 px-4 py-3 border-b border-gray-800 rounded-t-lg flex justify-between items-center">
                                <h3 class="text-lg font-medium text-white">User Management</h3>
                                <a href="add/user" class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-500 rounded hover:bg-green-600">Add New</a>
                            </div>
                            <div class="p-4">
                                @if (Session::has('success'))
                                    <div class="mb-4 text-green-700 bg-green-100 border border-green-200 p-3 rounded">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::has('fail'))
                                    <div class="mb-4 text-red-700 bg-red-100 border border-red-200 p-3 rounded">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                                <div class="overflow-x-auto">
                                    <table class="min-w-full bg-gray-800 border border-gray-900 rounded-lg">
                                        <thead class="bg-gray-900">
                                            <tr>
                                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Number</th>
                                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Name</th>
                                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Email</th>
                                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Usertype</th>
                                                <th colspan="2" class="px-4 py-2 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-900 divide-y divide-white">
                                            @if (count($all_users) > 0)
                                                @foreach ($all_users as $item)
                                                    <tr>
                                                        <td class="px-4 py-2 text-center text-gray-100 whitespace-nowrap">{{ $loop->iteration }}</td>
                                                        <td class="px-4 py-2 text-center text-gray-100 whitespace-nowrap">{{ $item->name }}</td>
                                                        <td class="px-4 py-2 text-center text-gray-100 whitespace-nowrap">{{ $item->email }}</td>
                                                        <td class="px-4 py-2 text-center text-gray-100 whitespace-nowrap">{{ $item->usertype }}</td>
                                                        <td class="px-4 py-2 text-center whitespace-nowrap">
                                                            <a href="/edit/{{ $item->id }}" class="inline-block px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded hover:bg-blue-900">Edit</a>
                                                        </td>
                                                        <td class="px-4 py-2 text-center whitespace-nowrap">
                                                            <a href="/delete/{{ $item->id }}" class="inline-block px-4 py-2 text-sm font-medium text-center text-white bg-red-500 rounded hover:bg-red-600">Delete</a>
                                                        </td>                                                        
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="8" class="px-4 py-2 text-center text-gray-500">No User Found!</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-apps-layout>
