@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto">
        <div class="h-20"></div>
        <h1 class="text-3xl font-semibold text-center text-white">Contact us</h1>

        <!-- Inline Style pro Grid -->
        <style>
            /* Styl pro mapu */
            #map {
                height: 500px; /* Zvětšená výška mapy */
                width: 80%; /* Zvětšená šířka mapy */
                margin: 2rem auto; /* Středové zarovnání mapy */
                border-radius: 8px; /* Zaoblené rohy pro moderní vzhled */
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Jemný stín pro lepší vzhled */
                overflow: hidden; /* Zabrání překročení zaoblených rohů */
            }

            /* Styl pro iframe mapu */
            iframe {
                border: none; /* Odstraníme výchozí rámeček iframe */
                border-radius: 8px; /* Zaoblené rohy iframe pro konzistentní vzhled */
            }
        </style>

        <div class="position-absolute bottom-0 w-full">
            @include('components.contact-form')
        </div>

        <!-- Mapa (OpenStreetMap iframe) -->
        <div id="map">
            <iframe
                src="https://www.openstreetmap.org/export/embed.html?bbox=17.6600%2C49.2200%2C17.6700%2C49.2300&layer=mapnik"
                width="100%"
                height="100%"
                frameborder="0"
                allowfullscreen
            ></iframe>
        </div>
    </div>
@endsection
