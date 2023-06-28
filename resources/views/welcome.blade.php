<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <title>Riviu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url(back-telkom.png);
                background-color:#636b6f;
                background-position: center;
                background-repeat: repeat;
                background-size: cover;
                color: #FFFFFF;
                font-family: 'Nunito', sans-serif;
                font-weight: 900;
                height: 100vh;
                margin: 0;
                overflow: hidden;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #FFFFFF;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .keyframes {
                0%   {background-color:red; left:0px; top:0px;}
                25%  {background-color:yellow; left:200px; top:0px;}
                50%  {background-color:blue; left:200px; top:200px;}
                75%  {background-color:green; left:0px; top:200px;}
                100% {background-color:red; left:0px; top:0px;}
            }

        </style>
    </head>
    <body>
           
        <div class="content">
            <div class="row justify-content-center" style="float:none;padding:10%;">
                <img src="logo.png" width="250" height="250">
                <h2> Riviu </h2>
                <div>
                        @if (Route::has('login'))
                                @auth
                                    <a class="btn btn-md btn-warning" href="{{ url('/home') }}">HOME</a>
                                @else
                                    <a class="btn btn-md btn-warning" href="{{ route('login') }}">LOGIN</a>
                                    @endif
                                @endauth
                
            </div>

        </div>
    </div>
    </body>
</html>
