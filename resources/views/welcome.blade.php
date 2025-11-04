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

<div class="relative flex items-center justify-center min-h-screen
                    bg-white
                    text-gray-800 p-4 overflow-hidden">

    <div class="animated-bg-elements">
        <div class="animated-bg-element"></div>
        <div class="animated-bg-element"></div>
        <div class="animated-bg-element"></div>
        <div class="animated-bg-element"></div>
        <div class="animated-bg-element"></div>
    </div>

    <div class="w-full max-w-lg p-8 sm:p-12 space-y-8
                        bg-white
                        rounded-2xl shadow-xl text-center z-10">

        <div class="flex justify-center">
            <div class="flex flex-col items-center space-y-3">

                <x-application-logo class="w-16 h-16" />

                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ config('app.name', 'Blogger') }}</h1>
                    <p class="text-sm text-gray-500">Parlez de ce qui vous passionne, à votre manière.</p>
                </div>
            </div>
        </div>

        <p class="text-gray-600">
            Connectez-vous ou créez un compte pour partager vos inspirations.
        </p>

        <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 sm:justify-center">

            <a href="{{ route('login') }}"
               class="inline-flex justify-center items-center px-8 py-3
                              border border-transparent text-base font-medium rounded-md
                              text-white bg-orange-400 hover:bg-orange-500
                              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400
                              transition duration-150 ease-in-out">
                Se connecter
            </a>

            <a href="{{ route('register') }}"
               class="inline-flex justify-center items-center px-8 py-3
                              border border-orange-400 text-base font-medium rounded-md
                              text-orange-500 bg-white hover:bg-orange-50
                              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400
                              transition duration-150 ease-in-out">
                S'inscrire
            </a>
        </div>

    </div>

    <div class="absolute bottom-8 z-10">
        <a href="{{ route('posts.index') }}"
           class="text-gray-500 hover:text-orange-600 font-medium underline transition duration-150 ease-in-out">
            Accéder au blog en tant qu'invité
        </a>
    </div>

</div>
</body>
</html>
