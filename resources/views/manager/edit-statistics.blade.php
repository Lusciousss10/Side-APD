<x-apps-layout>
    <div class="py-3">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-4xl font-semibold text-center text-gray-900 dark:text-white">
                <h1>Edit Statistik Pelanggaran</h1>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <div class="bg-white dark:bg-gray-800 border border-gray-700 rounded-lg shadow">
                            <div class="bg-white dark:bg-gray-800 px-4 py-3 border-b border-gray-600 rounded-t-lg flex justify-between items-center">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Edit Statistik Pelanggaran</h3>
                            </div>
                            <div class="p-4">
                                @if (session('success'))
                                    <div class="mb-4 text-green-700 bg-green-100 border border-green-200 p-3 rounded">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="mb-4 text-red-700 bg-red-100 border border-red-200 p-3 rounded">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form action="{{ route('manager.statistics.update') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <div>
                                        <label for="jumlah_meninggal" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Jumlah Orang Meninggal</label>
                                        <input type="number" id="jumlah_meninggal" name="jumlah_meninggal" value="{{ old('jumlah_meninggal', $violationstatistic->jumlah_meninggal) }}" class="mt-1 block w-full border border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                        @error('jumlah_meninggal')
                                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="jumlah_kasus_ditindaklanjuti" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Jumlah Kasus Ditindaklanjuti</label>
                                        <input type="number" id="jumlah_kasus_ditindaklanjuti" name="jumlah_kasus_ditindaklanjuti" value="{{ old('jumlah_kasus_ditindaklanjuti', $violationstatistic->jumlah_kasus_ditindaklanjuti) }}" class="mt-1 block w-full border border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                        @error('jumlah_kasus_ditindaklanjuti')
                                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-apps-layout>
