<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Book Store') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            brand: {
                                bg: '#0b0d12',
                                surface: '#13161f',
                                border: '#1f2430',
                                accent: '#ff5c35',
                                fg: '#f3f4f6',
                                muted: '#9ca3af'
                            }
                        }
                    }
                }
            }
        </script>
        <style>
            :root {
                --bg: #0b0d12;
                --surface: #13161f;
                --border: #1f2430;
                --accent: #ff5c35;
                --fg: #f3f4f6;
                --muted: #9ca3af;
                --font-display: 'Instrument Serif', serif;
                --font-body: 'Plus Jakarta Sans', sans-serif;
            }
            body {
                background-color: var(--bg);
                color: var(--fg);
                font-family: var(--font-body);
            }
        </style>
    </head>
    <body class="antialiased bg-[#0b0d12] text-gray-100 min-h-screen">
        <div class="min-h-screen flex flex-col bg-[#0b0d12]">
            @include('components.navbar')

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
