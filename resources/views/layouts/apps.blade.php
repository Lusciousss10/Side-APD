<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tugas Akhir Nopal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css'])
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/videojs-flash@2.1.0/dist/videojs-flash.min.js"></script>


    </head>
    <body>
        @include('layouts.sidebar')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
