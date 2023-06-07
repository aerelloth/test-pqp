<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plus que PROjection</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            @include('layouts.bootstrap._header')
        </header>
        <main>
            <div class="container mt-5">
                @yield('content')
            </div>
        </main>
        <footer>
            @include('layouts.bootstrap._footer')
        </footer>
    </body>
</html>
