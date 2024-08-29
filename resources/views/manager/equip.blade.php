<x-apps-layout>
    <!-- Include Video.js CSS and JavaScript -->
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/video.js@7.11.4/dist/video.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

    <div class="py-4">
        <div class="max-w-9xl mx-auto sm:px-12 lg:px-8">
            <div class="p-6 text-4xl font-semibold text-center text-white">
                <h1>Modelled CCTV</h1>
                <div class="flex items-center justify-center">
                    <!-- Invisible container -->
                    <div class="p-6 flex justify-center items-center rounded-lg shadow-lg w-fit">
                        <!-- Video.js Player -->
                        <video id="videoPlayer" class="video-js vjs-default-skin" controls width="1280" height="780" class="rounded-lg">
                            <source src="http://127.0.0.1:8000/videos/playlist.m3u8" type="application/x-mpegURL">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-apps-layout>    

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var player = videojs('videoPlayer');

        player.ready(function() {
            if (Hls.isSupported()) {
                var hls = new Hls({
                    liveSyncDuration: 1, // Sync to the latest segment with a short duration
                    maxMaxBufferSize: 10 * 1000 * 1000 // Set maximum buffer size to 10MB
                });

                hls.loadSource('http://127.0.0.1:8000/videos/playlist.m3u8');
                hls.attachMedia(player.tech_.el_);
                hls.on(Hls.Events.MANIFEST_PARSED, function() {
                    player.play();
                });

                // Handle errors
                hls.on(Hls.Events.ERROR, function (event, data) {
                    if (data.fatal === Hls.ErrorTypes.NETWORK_ERROR) {
                        console.error('Network error occurred.');
                    } else if (data.fatal === Hls.ErrorTypes.MEDIA_ERROR) {
                        console.error('Media error occurred.');
                    }
                });

            } else if (player.canPlayType('application/vnd.apple.mpegurl')) {
                player.src({
                    src: 'http://127.0.0.1:8000/videos/playlist.m3u8',
                    type: 'application/x-mpegURL'
                });
                player.play();
            }
        });
    });
</script>
