<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue sur {{ config('app.name', 'Blogger') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div class="relative min-h-screen bg-white text-gray-800">

    <header class="absolute top-0 left-0 right-0 z-10 bg-primary-600">
        <div class="max-w-7xl mx-auto flex justify-between items-center p-4 sm:p-6">
            <a href="/" class="flex items-center space-x-2">
                <x-application-logo-white class="w-10 h-10" />
                <span class="font-bold text-xl text-white">{{ config('app.name', 'Blogger') }}</span>
            </a>

            <nav class="space-x-4">
                <a href="{{ route('posts.index') }}" class="text-sm font-medium text-gray-100 hover:text-white">Blog</a>
                @auth
                <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-100 hover:text-white">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-100 hover:text-white">Se connecter</a>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-primary-700 bg-white hover:bg-gray-100">
                    S'inscrire
                </a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="flex items-center justify-center min-h-screen pt-24 pb-12">
        <div class="max-w-3xl mx-auto text-center px-6">
            <x-application-logo class="w-24 h-24 mx-auto" />
            <h1 class="mt-6 text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                Partagez vos inspirations.
            </h1>
            <p class="mt-6 text-lg text-gray-600 max-w-xl mx-auto">
                Bienvenue sur {{ config('app.name', 'Blogger') }}, la plateforme minimaliste pour vos idées. Créez, partagez et découvrez des articles inspirants.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('register') }}"
                   class="inline-flex justify-center items-center px-8 py-3
                                  border border-transparent text-base font-medium rounded-md
                                  text-white bg-primary-600 hover:bg-primary-700
                                  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500
                                  transition duration-150 ease-in-out">
                    Commencer à écrire
                </a>
                <a href="{{ route('posts.index') }}"
                   class="inline-flex justify-center items-center px-8 py-3
                                  border border-gray-300 text-base font-medium rounded-md
                                  text-gray-700 bg-white hover:bg-gray-50
                                  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500
                                  transition duration-150 ease-in-out">
                    Explorer le blog
                </a>
            </div>
        </div>
    </main>
</div>
</body>
</html>
