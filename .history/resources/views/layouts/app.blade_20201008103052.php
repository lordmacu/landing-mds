<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">


    <title>Hello, world!</title>
</head>

<body>
    <div id="app">
        @include('includes.header')

        @yield("content")
    </div>
 
</body>

</html>