<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Andele uzdevums</title>
    </head>
    <body>
        <p>
            <b>/characters/{id}</b> - Viena tēla informācija
        </p>
        <p>
            <b>/characters</b> - Visu tēlu informācija. Filtrēšanai strādā visi API pieejamie query string parametri: <b>name, status, species, type, gender</b><br>
            Lapošanai jānorāda <b>page</b> query string parametrs
        </p>

        <p>Linku piemēri:</p>
        <ul>
            <li><a href="{{ url('/characters/123') }}">{{ url('/characters/123') }}</a>
            <li><a href="{{ url('/characters?name=morty&status=alive') }}">{{ url('/characters?name=morty&status=alive') }}</a>
            <li><a href="{{ url('characters?species=alien&status=unknown&gender=male') }}">{{ url('characters?species=alien&status=unknown&gender=male') }}</a>
            <li><a href="{{ url('characters?name=rick&page=3') }}">{{ url('characters?name=rick&page=3') }}</a>
        </ul>
    </body>
</html>
