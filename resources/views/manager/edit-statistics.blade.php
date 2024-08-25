<x-apps-layout>
    <div class="py-3">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-4xl font-semibold text-center text-white">
                <h1>Edit Statistik Pelanggaran</h1>
            </div>
        </div>
    </div>

    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <div class="rounded-lg shadow-lg bg-gray-800 text-white p-6">
            <form action="{{ route('update.statistics') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="deaths" class="block text-sm font-medium text-gray-100">Jumlah Orang Meninggal</label>
                    <input type="number" name="deaths" id="deaths" value="{{ $deaths }}" class="mt-1 block w-full border border-gray-600 bg-gray-700 text-gray-100 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    @error('deaths')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="resolved_cases" class="block text-sm font-medium text-gray-100">Jumlah Kasus Ditindaklanjuti</label>
                    <input type="number" name="resolved_cases" id="resolved_cases" value="{{ $resolvedCases }}" class="mt-1 block w-full border border-gray-600 bg-gray-700 text-gray-100 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    @error('resolved_cases')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-apps-layout>
