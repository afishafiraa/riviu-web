<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Riviu') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/starlight.css') }}" rel="stylesheet">
    {{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

    <style>
        body{
            background-color: red;
            padding: 20px;
            margin-top: 20px;
        }

        .abaru {
            display: inline-block;
            padding: 8px 16px;
            margin-left: 20px;
            margin-top: 10px;
        }

        .previous {
        background-color: #eb3d34;
        color: black;
        }
        .round {
        border-radius: 50%;
        }

        .boxy-center{
            background-color: white; 
            width: 95%; 
            height: 95%; 
            align: center;
            margin: 0 auto;
            overflow: auto;
            padding: 10px 10px;
            justify-content: space-around;
            float: none;
        }
    </style>
</head>
<body>
    <div class="boxy-center">
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    $("#input-id").rating();
</script>