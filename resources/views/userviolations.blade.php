<x-apps-layout>
    <div class="bg-gray-900 min-h-screen text-white">
        <div class="py-6">
            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-4xl font-semibold text-center">
                    <h1>User - List of Violations</h1>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-800 border border-gray-700">
                    <thead>
                        <tr class="text-left text-gray-300">
                            <th class="py-2 px-4 border-b border-gray-700">Filename</th>
                            <th class="py-2 px-4 border-b border-gray-700">Date</th>
                            <th class="py-2 px-4 border-b border-gray-700">Time</th>
                            <th class="py-2 px-4 border-b border-gray-700">Image</th>
                            <th class="py-2 px-4 border-b border-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($violations as $violation)
                            <tr class="text-gray-200">
                                <td class="py-2 px-4 border-b border-gray-700">{{ $violation->filename }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{ $violation->date }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{ $violation->time }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">
                                    <a href="{{ asset('violations/' . $violation->filename) }}" data-lightbox="image-{{ $violation->id }}" data-title="{{ $violation->filename }}">
                                        <img src="{{ asset('violations/' . $violation->filename) }}" alt="{{ $violation->filename }}" class="w-24 h-auto cursor-pointer">
                                    </a>
                                </td>
                                <td class="py-2 px-4 border-b border-gray-700">
                                    <a href="{{ route('user.download', $violation->filename) }}" class="bg-blue-600 text-white px-4 py-2 rounded mt-2 inline-block">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-apps-layout>
