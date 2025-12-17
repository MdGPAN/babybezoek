<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Header rechtsboven -->
    <header class="fixed top-4 right-6 flex gap-4">
        <a href="{{ route('plan-visit') }}"
            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Bezoek</a>

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 cursor-pointer">
                    Logout
                </button>
            </form>
            <a href="{{ route('dashboard') }}"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-emerald-900 text-white rounded-md hover:bg-emerald-700">
                Login
            </a>
        @endauth
    </header>


    @yield('content')
</body>

</html>
