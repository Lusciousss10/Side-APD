<x-apps-layout>
    <div class="py-1">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-4xl font-semibold text-center text-gray-900 dark:text-white">
                <h1>Admin Dashboard</h1>
            </div>
        </div>
    </div>

    <!-- Container Section -->
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 px-4">
            <!-- Large Container (Left) -->
            <a href="/admin/equip" class="relative rounded-lg shadow-lg h-[618px] m-3 group block bg-white dark:bg-gray-800 transition-transform transform hover:scale-105">
                <video src="{{ asset('videos/ML.mp4') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 pointer-events-none" muted loop></video>
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 backdrop-blur-sm text-white transition-opacity duration-300 group-hover:bg-black group-hover:bg-opacity-70">
                    <div class="text-center p-4">
                        <h2 class="text-xl font-bold">Panel CCTV Model</h2>
                        <p>Tampilan CCTV Dengan Model</p>
                    </div>
                </div>
            </a>

            <!-- Right Containers (Top and Bottom) -->
            <div class="flex flex-col">
                <!-- Right Container (Top) -->
                <a href="/admin/crud" class="relative rounded-lg shadow-lg h-[190px] m-3 group block bg-white dark:bg-gray-800 border-l-8 border-blue-500 transition-transform transform hover:scale-105">
                    <div class="card-content absolute inset-0 flex items-center justify-center text-gray-900 dark:text-gray-100">
                        <div class="text-center p-4">
                            <h2 class="text-xl font-bold">User</h2>
                            <p>Mengatur User Yang Terdaftar</p>
                        </div>
                    </div>
                </a>

                <!-- Right Container (Bottom) -->
                <a href="/admin/violations" class="relative rounded-lg shadow-lg h-[190px] m-3 group block bg-white dark:bg-gray-800 border-l-8 border-blue-500 transition-transform transform hover:scale-105">
                    <div class="card-content absolute inset-0 flex items-center justify-center text-gray-900 dark:text-gray-100">
                        <div class="text-center p-4">
                            <h2 class="text-xl font-bold">Violations History</h2>
                            <p>Melihat History Pelanggaran Yang Dilakukan</p>
                        </div>
                    </div>
                </a>

                <!-- Right Container (Additional) -->
                <div class="relative rounded-lg shadow-lg h-[190px] m-3 bg-white dark:bg-gray-800 border-l-8 border-blue-500 transition-transform transform hover:scale-105">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center p-4 text-gray-900 dark:text-gray-100">
                            <h2 class="text-xl font-bold">Statistik Pelanggaran</h2>
                            <p>Total Pelanggaran: {{ $totalViolations }}</p>
                            <p>Jumlah Orang Meninggal: {{ $violationstatistic->jumlah_meninggal }}</p>
                            <p>Jumlah Kasus yang Ditindaklanjuti: {{ $violationstatistic->jumlah_kasus_ditindaklanjuti }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container Section -->
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
