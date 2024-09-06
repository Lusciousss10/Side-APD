<x-apps-layout>
    <div class="py-6">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-4xl font-semibold text-center text-gray-900 dark:text-white">
                <h1>Manager Dashboard</h1>
            </div>
        </div>
    </div>

    <!-- Container Section -->
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 px-4 mt-8">
            <!-- Large Container (Top) -->
            <a href="/manager/equip" class="relative rounded-lg shadow-lg h-64 group block"
                onmouseenter="playVideo(this)" onmouseleave="pauseVideo(this)">
                <video src="{{ asset('videos/ML.mp4') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 pointer-events-none" muted loop></video>
                <div class="card-content absolute inset-0 flex items-center justify-center bg-black bg-opacity-10 backdrop-blur-sm text-white transition-opacity duration-300">
                    <div class="text-center p-4">
                        <h2 class="text-xl font-bold">Panel CCTV Deteksi</h2>
                        <p>Tampilan CCTV Dengan Deteksi</p>
                    </div>
                </div>
            </a>

            <!-- Grid layout for two smaller containers below the large container -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- History Container -->
                <a href="/manager/violations" class="relative overflow-hidden rounded-lg shadow-lg h-64 group block"
                    onmouseenter="playVideo(this)" onmouseleave="pauseVideo(this)">
                    <video src="{{ asset('videos/WERER.mp4') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 pointer-events-none" muted loop></video>
                    <div class="card-content absolute inset-0 flex items-center justify-center bg-black bg-opacity-10 backdrop-blur-sm text-white transition-opacity duration-300">
                        <div class="text-center p-4">
                            <h2 class="text-xl font-bold">Violations History</h2>
                            <p>Melihat History Pelanggaran Yang Dilakukan</p>
                        </div>
                    </div>
                </a>

                <!-- Statistik Container -->
                <div class="relative rounded-lg shadow-lg h-64  text-white overflow-hidden bg-white dark:bg-gray-800">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center p-4">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">Statistik Pelanggaran</h2>
                            <p class="text-gray-900 dark:text-gray-300">Total Pelanggaran: {{ $totalViolations }}</p>
                            <p class="text-gray-900 dark:text-gray-300">Jumlah Orang Meninggal: {{ $violationstatistic->jumlah_meninggal }}</p>
                            <p class="text-gray-900 dark:text-gray-300">Jumlah Kasus yang Ditindaklanjuti: {{ $violationstatistic->jumlah_kasus_ditindaklanjuti }}</p>
                            <a href="{{ route('manager.statistics.edit') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-apps-layout>

<script>
    document.querySelectorAll('.group').forEach(container => {
        const video = container.querySelector('video');

        container.addEventListener('mouseover', () => {
            video.play();
        });

        container.addEventListener('mouseout', () => {
            video.pause();
        });
    });
</script>
