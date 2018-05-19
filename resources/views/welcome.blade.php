<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Protect against cross-site forgery in order to use Vue front end --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" >
        <script>window.Laravel = { csrfToken: '{{csrf_token()}}' }</script>

        <title>BookWorm</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app">
            <h1>Welcome to BookWorm, ya filthy animal</h1>
            <div class="container">
                <books></books>
            </div>
        </div>

    <script src="{{ asset('js/app.js') }}" ></script>
    </body>
</html>
