<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'BattlegroundCalc - Management Score' }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    <style>
        * {
            -webkit-tap-highlight-color: transparent;
        }
    </style>

    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-xl font-bold tracking-tight text-gray-900">
                        Battleground<span class="text-red-600">Calc</span>
                    </a>
                </div>

                <div>
                    @auth
                        <form action="/logout" method="POST" class="inline">
                            @csrf

                            <button
                                type="submit"
                                class="text-sm font-medium text-red-600 hover:text-red-800 transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a
                            href="/login"
                            class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">
                            Admin Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts

</body>
</html>