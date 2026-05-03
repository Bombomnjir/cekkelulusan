<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">

        <!-- SIDEBAR -->
        <!-- SIDEBAR -->
<aside class="w-64 h-screen fixed top-0 left-0 bg-base-200 shadow-xl flex flex-col">

    <!-- LOGO / TITLE -->
    <div class="px-6 py-5 border-b flex items-center gap-3">
    
    <img src="/logo.png" alt="Logo Sekolah" class="w-12 h-12 object-contain">

    <div>
        <h1 class="text-sm font-bold leading-tight">
            SMKS Salafiyah
        </h1>
        <p class="text-xs opacity-60">
            Syafiiyah
        </p>
    </div>

</div>
    <!-- MENU -->
<ul class="menu p-4 space-y-6 flex-1">
       <li>
    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-3 rounded-xl px-12 py-4 text-base font-medium tracking-wide transition-all duration-200
       {{ request()->routeIs('dashboard') ? 'bg-primary text-white shadow-md' : 'hover:bg-base-300 text-gray-700' }}">
        
        <span class="text-xl">📊</span>
        <span class="leading-relaxed">Dashboard</span>
    </a>
</li>
<li>
    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-3 rounded-xl px-12 py-4 text-base font-medium tracking-wide transition-all duration-200
       {{ request()->routeIs('dashboard') ? 'bg-primary text-white shadow-md' : 'hover:bg-base-300 text-gray-700' }}">
        
        <span class="text-xl">📊</span>
        <span class="leading-relaxed">-------</span>
    </a>
</li>
<li>
    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-3 rounded-xl px-12 py-4 text-base font-medium tracking-wide transition-all duration-200
       {{ request()->routeIs('dashboard') ? 'bg-primary text-white shadow-md' : 'hover:bg-base-300 text-gray-700' }}">
        
        <span class="text-xl">📊</span>
        <span class="leading-relaxed">-------</span>
    </a>
</li>
<li>
    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-3 rounded-xl px-12 py-4 text-base font-medium tracking-wide transition-all duration-200
       {{ request()->routeIs('dashboard') ? 'bg-primary text-white shadow-md' : 'hover:bg-base-300 text-gray-700' }}">
        
        <span class="text-xl">📊</span>
        <span class="leading-relaxed">-------</span>
    </a>
</li>


    </ul>

    <!-- LOGOUT (AUTO DI BAWAH) -->
    <div class="p-4 border-t mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg
                           hover:bg-red-100 text-red-500 transition">
                🚪 Logout
            </button>
        </form>
    </div>

</aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col ml-64">


            <!-- CONTENT -->
            <main class="p-6">
                {{ $slot }}
            </main>

        </div>

    </div>
</body>
</html>
