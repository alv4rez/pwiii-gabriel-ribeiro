<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Usuários')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <main class="card">
        @include('layouts.partials.flash')

        <header class="mb-4">
            @yield('header')
        </header>

        @yield('content')
    </main>
</div>
</body>
</html>


