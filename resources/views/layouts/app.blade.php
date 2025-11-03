<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} - STAKAM</title>
    <link rel="icon" type="image/png" href="picture/logo/STAKAM_Logo.png">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script>  (() => {const getStoredTheme=()=>localStorage.getItem("theme"),setStoredTheme=e=>localStorage.setItem("theme",e),getPreferredTheme=()=>{const e=getStoredTheme();if(e)return e;return window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light"},setTheme=e=>{let t=e;"auto"===e&&(t=window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light"),document.documentElement.setAttribute("data-bs-theme",t)};setTheme(getPreferredTheme())})(); </script>
    <style>  :root{--primary-color:#2563eb;--bs-body-bg:#f8f9fa;--element-bg:#ffffff;--bs-body-color:#1f2937;--text-secondary:#6b7280;--border-color:#e5e7eb;--hover-bg:#f3f4f6;--shadow:0 1px 3px 0 rgba(0,0,0,.05)}[data-bs-theme=dark]{--primary-color:#3b82f6;--bs-body-bg:#111827;--element-bg:#1f2937;--bs-body-color:#f9fafb;--text-secondary:#9ca3af;--border-color:#374151;--hover-bg:#374151;--shadow:0 1px 3px 0 rgba(0,0,0,.2);--bs-offcanvas-bg:var(--element-bg);--bs-offcanvas-border-color:var(--border-color);--bs-btn-close-color:#fff;--bs-btn-outline-secondary-color:#adb5bd;--bs-btn-outline-secondary-border-color:#6c757d;--bs-btn-outline-secondary-hover-bg:#6c757d;--bs-btn-outline-secondary-hover-color:#fff;--bs-btn-outline-secondary-active-bg:#5c636a;--bs-btn-outline-secondary-active-color:#fff}body{font-family:'Inter',sans-serif;background-color:var(--bs-body-bg);color:var(--bs-body-color)}@media (min-width:992px){body{display:flex;min-height:100vh}.main-content-wrapper{flex-grow:1;overflow-x:hidden}}.solid-white-bg{background-color:var(--element-bg)}.sidebar-desktop{border-right:1px solid var(--border-color)}.top-navbar{border-bottom:1px solid var(--border-color)}.card{border:1px solid var(--border-color);box-shadow:var(--shadow);border-radius:1rem}.sidebar-brand,.sidebar-mobile-brand{color:var(--bs-body-color)}.nav-link{color:var(--text-secondary)}.sidebar-desktop .nav-link:hover,.sidebar-mobile .nav-link:hover{color:var(--primary-color);background-color:var(--hover-bg)}.nav-link.active{color:#fff;background-color:var(--primary-color);box-shadow:0 4px 12px rgba(37,99,235,.3)}[data-bs-theme=dark] .nav-link.active{box-shadow:0 4px 12px rgba(59,130,246,.3)}.sidebar-mobile .offcanvas-header{border-bottom:1px solid var(--border-color)}.sidebar-desktop{width:260px;flex-shrink:0;padding:1rem}.sidebar-brand{font-size:1.5rem;font-weight:700;padding:1rem .5rem}.sidebar-desktop .nav-link{font-size:1rem;font-weight:500;padding:12px 20px;margin-bottom:8px;border-radius:.75rem;transition:all .2s ease-in-out}.sidebar-desktop .nav-link .bi,.sidebar-mobile .nav-link .bi{margin-right:15px;font-size:1.2rem}.sidebar-mobile .nav-link{font-size:1.1rem;font-weight:500;padding:1rem 1.25rem;border-radius:.75rem;margin-bottom:4px;transition:all .2s ease-in-out}.sidebar-mobile-brand{font-size:1.5rem;font-weight:700}.top-navbar{position:sticky;top:0;z-index:1020}.avatar-initials{display:inline-flex;align-items:center;justify-content:center;font-weight:600;color:#fff;background-color:var(--primary-color);width:40px;height:40px}.sidebar-logo{max-height:40px;margin-right:10px}.theme-switcher-container{position:relative;display:inline-flex;background-color:var(--hover-bg);border-radius:.85rem;padding:5px}.theme-btn{border:none;background:transparent;color:var(--text-secondary);font-weight:500;padding:6px 16px;cursor:pointer;position:relative;z-index:1;transition:color .3s ease}.theme-btn.active{color:#fff}.theme-slider{position:absolute;top:5px;left:5px;height:calc(100% - 10px);background-color:var(--primary-color);border-radius:.75rem;z-index:0;transition:all .3s cubic-bezier(.25,.8,.25,1)}</style>
    @stack('styles')
</head>

<body>
 
    <nav class="sidebar-desktop d-none d-lg-flex flex-column solid-white-bg">
        <div>
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <img src="{{ asset('picture/logo/STAKAM_Logo.png') }}" alt="STAKAM Logo" class="sidebar-logo">
                <span>Dashboard</span>
            </div>
            
           
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-house-door-fill"></i>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.kontenHero') ? 'active' : '' }}" href="{{ route('dashboard.kontenHero') }}"><i class="bi bi-window-desktop"></i>Konten Hero</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.kontenProfil') ? 'active' : '' }}" href="{{ route('dashboard.kontenProfil') }}"><i class="bi bi-file-person-fill"></i>Konten Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.programStudi') ? 'active' : '' }}" href="{{ route('dashboard.programStudi') }}"><i class="bi bi-mortarboard-fill"></i>Program Studi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.pimpinan') ? 'active' : '' }}" href="{{ route('dashboard.pimpinan') }}"><i class="bi bi-person-workspace"></i>Pimpinan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.testimoni') ? 'active' : '' }}" href="{{ route('dashboard.testimoni') }}"><i class="bi bi-chat-quote-fill"></i>Testimoni</a></li>
            </ul>
        </div>
    </nav>

    
    <div class="offcanvas offcanvas-start sidebar-mobile" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title sidebar-mobile-brand d-flex align-items-center" id="mobileSidebarLabel"><img src="{{ asset('picture/logo/STAKAM_Logo.png') }}" alt="STAKAM Logo" class="sidebar-logo"><span>ADMIN PANEL</span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-2">
            
           
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-house-door-fill"></i>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.kontenHero') ? 'active' : '' }}" href="{{ route('dashboard.kontenHero') }}"><i class="bi bi-window-desktop"></i>Konten Hero</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.kontenProfil') ? 'active' : '' }}" href="{{ route('dashboard.kontenProfil') }}"><i class="bi bi-file-person-fill"></i>Konten Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.programStudi') ? 'active' : '' }}" href="{{ route('dashboard.programStudi') }}"><i class="bi bi-mortarboard-fill"></i>Program Studi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.pimpinan') ? 'active' : '' }}" href="{{ route('dashboard.pimpinan') }}"><i class="bi bi-person-workspace"></i>Pimpinan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard.testimoni') ? 'active' : '' }}" href="{{ route('dashboard.testimoni') }}"><i class="bi bi-chat-quote-fill"></i>Testimoni</a></li>
            </ul>
        </div>
    </div>

    <div class="main-content-wrapper">
        <header class="top-navbar p-3 solid-white-bg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <button class="btn d-lg-none p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar"><i class="bi bi-list fs-2"></i></button>
                <h5 class="d-none d-lg-block mb-0 fw-bold">{{ $title ?? 'Dashboard' }}</h5>
                <h5 class="d-lg-none mb-0 fw-bold">{{ $title ?? 'STAKAM' }}</h5>
                <div class="ms-auto d-flex align-items-center">
                    <div class="avatar-initials rounded-circle">A</div>
                    <div class="dropdown" id="settingsDropdown">
                        <button class="btn btn-link nav-link p-0 ms-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Pengaturan"><i class="bi bi-gear-fill fs-4"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="min-width: 250px;">
                            <li><div class="px-3 py-2"><strong class="d-block">Administrator</strong><small class="text-muted">Admin Utama</small></div></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><h6 class="dropdown-header">Pilih Tema</h6></li>
                            <li>
                                <div class="px-3 py-1">
                                    <div class="theme-switcher-container">
                                        <div class="theme-slider"></div>
                                        <button type="button" class="theme-btn" data-bs-theme-value="light" title="Tema Terang"><i class="bi bi-sun-fill"></i></button>
                                        <button type="button" class="theme-btn" data-bs-theme-value="dark" title="Tema Gelap"><i class="bi bi-moon-stars-fill"></i></button>
                                        <button type="button" class="theme-btn" data-bs-theme-value="auto" title="Tema Sistem"><i class="bi bi-circle-half"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider my-1"></li>
                            
                            
                            <li><a class="dropdown-item text-danger fw-medium d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <main class="container-fluid p-3 p-lg-4">
            @yield('konten')
        </main>
    </div>

 
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script> document.addEventListener("DOMContentLoaded",function(){const t=()=>localStorage.getItem("theme"),e=e=>localStorage.setItem("theme",e),o=()=>{const e=t();if(e)return e;return window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light"},a=e=>{let t=e;"auto"===e&&(t=window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light"),document.documentElement.setAttribute("data-bs-theme",t)};const n=document.querySelector(".theme-slider"),r=document.querySelectorAll(".theme-btn"),s=document.getElementById("settingsDropdown");function i(e){if(!e)return;const t=e.getBoundingClientRect(),o=e.parentElement.getBoundingClientRect();n.style.width=`${t.width}px`,n.style.transform=`translateX(${t.left-o.left}px)`}function l(){const e=o();r.forEach(e=>e.classList.remove("active"));const t=document.querySelector(`.theme-btn[data-bs-theme-value="${e}"]`);t&&t.classList.add("active")}r.forEach(t=>{t.addEventListener("click",()=>{const o=t.getAttribute("data-bs-theme-value");e(o),a(o),l(),i(t)})}),s&&s.addEventListener("show.bs.dropdown",()=>{setTimeout(()=>{const e=document.querySelector(".theme-btn.active");i(e)},10)}),l(),window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",()=>{if("auto"===t()){a("auto"),l()}})}); </script>
    @stack('scripts')
</body>
</html>