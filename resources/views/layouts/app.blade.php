<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rutas y Escapadas')</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>
<body>
    <header>
        <h1>Agencia de Viajes: Rutas y Escapadas</h1>
    </header>

    <nav>
        <ul>
            @include('layouts.menu')
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Rutas y Escapadas - Viaja diferente</p>
    </footer>
</body>
</html>