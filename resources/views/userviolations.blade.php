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
                            <th class="py-2 px-4 border-b border-gray-600">Filename</th>
                            <th class="py-2 px-4 border-b border-gray-600">Date</th>
                            <th class="py-2 px-4 border-b border-gray-600">Time</th>
                            <th class="py-2 px-4 border-b border-gray-600">Image</th>
                            <th class="py-2 px-4 border-b border-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($violations as $violation)
                            <tr class="text-gray-200">
                                <td class="py-2 px-4 border-b border-gray-600">{{ $violation->filename }}</td>
                                <td class="py-2 px-4 border-b border-gray-600">{{ $violation->date }}</td>
                                <td class="py-2 px-4 border-b border-gray-600">{{ $violation->time }}</td>
                                <td class="py-2 px-4 border-b border-gray-600">
                                    <a href="#" onclick="openModal('{{ asset('violations/' . $violation->filename) }}')">
                                        <img src="{{ asset('violations/' . $violation->filename) }}" alt="{{ $violation->filename }}" class="w-24 h-auto cursor-pointer">
                                    </a>
                                </td>
                                <td class="py-2 px-4 border-b border-gray-600">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('user.download', $violation->filename) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Download</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-2"></div>
            <div class="d-flex justify-content-center">
                {{ $violations->links() }}
            </div>
            <!-- Modal -->
            <div id="imageModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 z-50 hidden flex items-center justify-center">
                <div class="relative bg-gray-800 p-4 rounded max-w-4xl max-h-screen">
                    <img id="modalImage" src="" alt="Full Size Image" class="w-full h-auto object-contain">
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        document.getElementById('imageModal').addEventListener('click', function(e) {
            // Close the modal if the click is outside the image
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</x-apps-layout>
