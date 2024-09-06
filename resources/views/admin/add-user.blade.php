<x-apps-layout>
    <div class="py-1">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-4xl font-semibold text-center text-gray-900 dark:text-white">
                <h1>Add User</h1>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6">
                    <div class="container mx-auto">
                        <div class="bg-white dark:bg-gray-800 border border-gray-700 rounded-lg shadow">
                            <div class="bg-white dark:bg-gray-800 px-4 py-3 border-b border-gray-600 rounded-t-lg flex justify-between items-center">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Add New User</h3>
                            </div>
                            <div class="p-4">
                                @if (Session::has('fail'))
                                    <div class="mb-4 text-red-700 bg-red-100 border border-red-200 dark:text-red-300 dark:bg-red-900 dark:border-red-800 p-3 rounded">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                                <form action="{{ route('AddUser') }}" method="post" class="space-y-6">
                                    @csrf
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter Name">
                                        @error('name')
                                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter Email">
                                        @error('email')
                                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="usertype" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Usertype</label>
                                        <input type="text" name="usertype" value="{{ old('usertype') }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter Usertype">
                                        @error('usertype')
                                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Password</label>
                                        <input type="password" name="password" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter Password">
                                        @error('password')
                                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Confirm Password">
                                        @error('password_confirmation')
                                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
    
                                    <div class="flex justify-end">
                                        <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-md hover:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
</x-apps-layout>
