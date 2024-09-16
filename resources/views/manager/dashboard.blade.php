<x-apps-layout>
    <div class="py-6">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-4xl font-semibold text-center text-gray-900 dark:text-white">
                <h1>Manager Dashboard</h1>
            </div>
        </div>
    </div>

    <!-- Container Section -->
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8 mt-8">
        <!-- Grid layout with more spacing between containers -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
            <!-- Large Container (Left) -->
            <a href="/manager/equip" class="relative rounded-lg shadow-lg h-[450px] group block hover:bg-gray-900 transition duration-300 ease-in-out">
                <video src="{{ asset('videos/ML.mp4') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 pointer-events-none" muted loop></video>
                <div class="card-content absolute inset-0 flex items-center justify-center bg-black bg-opacity-10 backdrop-blur-sm text-white transition-opacity duration-300">
                    <div class="text-center p-4">
                        <h2 class="text-2xl font-bold">Panel CCTV Deteksi</h2>
                        <p>Tampilan CCTV Dengan Deteksi</p>
                    </div>
                </div>
            </a>

            <!-- Right Section: Two Containers with More Space -->
            <div class="flex flex-col space-y-8">
                <!-- First Right Container -->
                <a href="/manager/violations" class="relative rounded-lg shadow-lg h-[215px] group block bg-white dark:bg-gray-800 border-l-8 border-blue-500 transition-transform transform hover:scale-105">
                    <div class="card-content absolute inset-0 flex items-center justify-center text-gray-900 dark:text-gray-100">
                        <div class="text-center p-4">
                            <h2 class="text-xl font-bold">Violations History</h2>
                            <p>Melihat History Pelanggaran Yang Dilakukan</p>
                        </div>
                    </div>
                </a>
            
                <!-- Second Right Container -->
                <a href="{{ route('manager.statistics.edit') }}" class="relative rounded-lg shadow-lg h-[205px] group block bg-white dark:bg-gray-800 border-l-8 border-blue-500 transition-transform transform hover:scale-105">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center p-4">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">Statistik Pelanggaran</h2>
                            <p class="text-gray-900 dark:text-gray-300">Total Pelanggaran: {{ $totalViolations }}</p>
                            <p class="text-gray-900 dark:text-gray-300">Jumlah Orang Meninggal: {{ $violationstatistic->jumlah_meninggal }}</p>
                            <p class="text-gray-900 dark:text-gray-300">Jumlah Kasus yang Ditindaklanjuti: {{ $violationstatistic->jumlah_kasus_ditindaklanjuti }}</p>
                        </div>
                    </div>
                </a>
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

            /*function playVideo(container) {
        const video = container.querySelector('video');
        const card = container.querySelector('.card-content');
        video.play();
        card.style.opacity = 0;
    }

    function pauseVideo(container) {
        const video = container.querySelector('video');
        const card = container.querySelector('.card-content');
        video.pause();
        card.style.opacity = 1;
    }*/
</script>
