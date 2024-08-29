<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tugas Akhir Nopal</title>
  <link rel="stylesheet" href="sidebar.css" />
  @vite(['resources/css/sidebar.css','resources/css/app.css', 'resources/js/app.js'])

  <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/videojs-flash@2.1.0/dist/videojs-flash.min.js"></script>


</head>
<body>
  <section class="sidebar">
    <div class="nav-header">
      <p class="logo">CCTV Monitoring</p>
      <i class="bx bx-menu btn-menu"></i>
    </div>
    <a href="/profile" class="user-account block mt-3 py-3 px-2 ml-[-10px] transition-all duration-300 rounded-lg overflow-hidden hover:bg-gray-200 dark:hover:bg-blue-900">
      <div class="user-profile flex items-center text-gray-900 dark:text-white">
        <img src="{{ asset('images/blank.jpg') }}" alt="profile-img" class="w-10 h-10 rounded-full transition-all duration-300">
        <div class="user-detail ml-6 whitespace-nowrap">
          <h3 class="transition-all duration-300">{{ Auth::user()->name }}</h3>
          <span class="transition-all duration-300">{{ Auth::user()->email }}</span>
        </div>
      </div>
    </a>

    {{-- admin links --}}
    @if (Auth::user()->usertype == 'admin')
    <ul class="nav-links">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bx bxs-grid-alt"></i>
                <span class="title">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{ url('admin/equip') }}" class="{{ request()->routeIs('admin.equip') ? 'active' : '' }}">
                <i class="bx bxs-cctv"></i>
                <span class="title">Equipped CCTV</span>
            </a>
            <span class="tooltip">Equipped CCTV</span>
        </li>
        <li>
          <a href="{{ url('admin/violations') }}" class="{{ request()->routeIs('admin.violation') ? 'active' : '' }}">
            <i class='bx bx-history'></i>
              <span class="title">Violations History</span>
          </a>
          <span class="tooltip">Violations History</span>
      </li>
        <li>
            <a href="{{ url('admin/crud') }}" class="{{ request()->routeIs('admin.crud') ? 'active' : '' }}">
                <i class="bx bxs-user-account"></i>
                <span class="title">Manage User</span>
            </a>
            <span class="tooltip">Manage User</span>
        </li>
        <li>
          <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); if(confirm('Are you sure you want to log out?')) { document.getElementById('logout-form').submit(); }">
            <i class='bx bxs-log-out'></i>
            <span class="title">Log Out</span>
          </a>
          <span class="tooltip">Log Out</span>
        </li>
          <!-- Logout Form -->
          <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
              @csrf
          </form>
    </ul>
    @endif

    {{-- user links --}}
    @if (Auth::user()->usertype == 'user')
    <ul class="nav-links">
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bx bxs-grid-alt"></i>
                <span class="title">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="equip" class="{{ request()->routeIs('user.equip') ? 'active' : '' }}">
              <i class="bx bxs-cctv"></i>
              <span class="title">Equipped CCTV</span>
          </a>
          <span class="tooltip">Equipped CCTV</span>
        </li>
        <li>
            <a href="userviolations" class="{{ request()->routeIs('user.violation') ? 'active' : '' }}">
                <i class="bx bx-history"></i>
                <span class="title">Violations History</span>
            </a>
            <span class="tooltip">Violations History</span>
        </li>
        <li>
          <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); if(confirm('Are you sure you want to log out?')) { document.getElementById('logout-form').submit(); }">
            <i class='bx bxs-log-out'></i>
            <span class="title">Log Out</span>
          </a>
          <span class="tooltip">Log Out</span>
        </li>        
          <!-- Logout Form -->
          <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
              @csrf
          </form>
    </ul>
    @endif

    {{-- manager links --}}
    @if (Auth::user()->usertype == 'manager')
    <ul class="nav-links">
        <li>
            <a href="{{ route('manager.dashboard') }}" class="{{ request()->routeIs('manager.dashboard') ? 'active' : '' }}">
                <i class="bx bxs-grid-alt"></i>
                <span class="title">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{ url('manager/equip') }}" class="{{ request()->routeIs('manager.equip') ? 'active' : '' }}">
                <i class="bx bxs-cctv"></i>
                <span class="title">Equipped CCTV</span>
            </a>
            <span class="tooltip">Equipped CCTV</span>
        </li>
        <li>
            <a href="{{ url('manager/violations') }}" class="{{ request()->routeIs('manager.violation') ? 'active' : '' }}">
                <i class='bx bx-history'></i>
                <span class="title">Violations History</span>
            </a>
            <span class="tooltip">Violations History</span>
        </li>
        <li>
          <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); if(confirm('Are you sure you want to log out?')) { document.getElementById('logout-form').submit(); }">
            <i class='bx bxs-log-out'></i>
            <span class="title">Log Out</span>
          </a>
          <span class="tooltip">Log Out</span>
        </li>
            <!-- Logout Form -->
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
    </ul>
    @endif
    </section>

  <section class="home">
    <p>{{ $slot }}</p>
    <footer class="sticky-footer">
      <p>&copy; 2024 Tugas Akhir Nopal. All Rights Reserved.</p>
    </footer>
  </section>



  <script>
    const btn_menu = document.querySelector(".btn-menu");
    const side_bar = document.querySelector(".sidebar");

    btn_menu.addEventListener("click", function () {
      side_bar.classList.toggle("expand");
      changebtn();
    });

    function changebtn() {
      if (side_bar.classList.contains("expand")) {
        btn_menu.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        btn_menu.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }

    const btn_theme = document.querySelector(".theme-btn");
    const theme_ball = document.querySelector(".theme-ball");

    const localData = localStorage.getItem("theme");

    if (localData == null) {
      localStorage.setItem("theme", "light");
    }

    if (localData == "dark") {
      document.body.classList.add("dark-mode");
      theme_ball.classList.add("dark");
    } else if (localData == "light") {
      document.body.classList.remove("dark-mode");
      theme_ball.classList.remove("dark");
    }

    btn_theme.addEventListener("click", function () {
      document.body.classList.toggle("dark-mode");
      theme_ball.classList.toggle("dark");
      if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
      } else {
        localStorage.setItem("theme", "light");
      }
    });
    
  </script>
</body>

</html>