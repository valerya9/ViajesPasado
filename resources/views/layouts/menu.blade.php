{{-- 
    Menú de navegación principal.
    Este parcial se incluye en el layout app.blade.php
    Cada enlace usa route() con el nombre de la ruta para generar las URLs.
--}}
<ul>
    <li>
        <a href="{{ url('/') }}">Inicio</a>
    </li>
    <li>
        <a href="{{ route('destinations.index') }}">Destinos</a>
    </li>
    <li>
        <a href="{{ route('activities.index') }}">Actividades</a>
    </li>
    <li>
        <a href="{{ route('comments.index') }}">Comentarios</a>
    </li>
    <li>
        <a href="{{ route('tours.index') }}">Tours</a>
    </li>
    <li>
        <a href="{{ route('guides.index') }}">Guías</a>
    </li>
</ul>