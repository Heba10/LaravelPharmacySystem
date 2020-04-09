<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pharmacy System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            h1{
                color: #6A5CB4;
            }
            h2 a{
                text-decoration: none !important;
                color: #09c;
            }
            .link{
                border: 1px solid #6A5CB4;
                border-radius: 20px;
                cursor: pointer;
                transition: all .3s ease-in-out;
                box-shadow:none;
            }

            .link:hover{
                box-shadow: 4px 8px 6px #d6d6d6;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h1>Login As: </h1>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="link">
                            <h2 class="text-center p-3">
                                <a href="{{ route('admin.login') }}"> Admin</a>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="link">
                            <h2 class="text-center p-3">
                                <a href="{{ route('pharmacy.login') }}"> Pharmacy</a>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="link">
                            <h2 class="text-center p-3">
                                <a href="{{ route('doctors.login') }}"> Doctor</a>
                            </h2>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </body>
</html>
