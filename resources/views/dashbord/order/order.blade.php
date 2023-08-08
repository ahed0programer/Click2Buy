<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Order Click 2 Buy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        footer {
            background-color: rgba(40, 49, 64, 0.5);
            position: absolute;
            bottom: 0;
            width: 100%;
        }


        @import url('https://fonts.googleapis.com/css?family=Nunito:400,700');


        * {
            transition: all 0.3s ease-out;
        }

        html,
        body {
            height: 100%;
            font-family: "Nunito", sans-serif;
            font-size: 16px;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        h3 {
            color: #262626;
            font-size: 17px;
            line-height: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        p {
            font-size: 17px;
            font-weight: 400;
            line-height: 20px;
            color: #666666;

            &.small {
                font-size: 14px;
            }
        }

        .go-corner {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 32px;
            height: 32px;
            overflow: hidden;
            top: 0;
            right: 0;
            background-color: #182343;
            border-radius: 0 4px 0 32px;
        }

        .go-arrow {
            margin-top: -4px;
            margin-right: -4px;
            color: white;
            font-family: courier, sans;
        }



        .card2 {
            display: block;
            top: 0px;
            position: relative;
            max-width: 313px;
            background-color: #d0d0d0;
            border-radius: 4px;
            padding: 32px 24px;
            margin: 20px;
            text-decoration: none;
            z-index: 0;
            overflow: hidden;
            border: 1px solid #f2f8f9;
        }

        .card2:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: -16px;
            right: -16px;
            background: #00838d;
            height: 32px;
            width: 32px;
            border-radius: 32px;
            transform: scale(2);
            transform-origin: 50% 50%;
            transition: transform 0.15s ease-out;
        }

        .card2:hover:before {
            transform: scale(2.15);
        }

        .card2:hover {
            transition: all 0.2s ease-out;
            box-shadow: 0px 4px 8px rgba(38, 38, 38, 0.2);
            top: -4px;
            border: 1px solid #cccccc;
            background-color: white;
        }

        html,
        body {
            font-family: 'Exo 2', sans-serif;
            margin: 0;
            padding: 0;
        }


        .wrapper {
            width: 100%;
            max-width: 960px;
            margin: 0 auto;
            padding: 0;
        }

        .nav-bar-area {
            width: 100%;
            height: 60px;
            /* background-color: #000; */
            padding: 0;
            margin: 0 auto;
            position: relative;

        }

        ul {
            margin: 0 auto;
            padding: 0;
            width: 600px;
            height: 60px;
        }

        ul li {
            display: inline;
            float: left;
            padding: 10px 10px 10px 8px;
            margin: 0 10% 0 0;
            color: #fff;
            cursor: pointer;
            line-height: 225%;
        }

        li:hover {
            background-color: rgba(64, 73, 88, 0.5);
            border-radius: 10px;
            margin-top: 4px;
            color: red;
        }

        

        .menu {
            display: none;
            color: #fff;
            font-weight: bold;
        }

        #text {
            float: left;
        }

        #image {
            float: right;
            cursor: pointer;
        }



        @media screen and (max-width: 600px) {
            .nav-bar-area {
                height: auto;
                overflow: auto;
            }

            ul {
                width: 100%;
                height: auto;
                display: block;
                overflow: hidden;
            }

            ul li {
                width: 50%;
                float: left;
                position: relative;
                display: block;
                margin: -1px;
                padding: 10px 0 10px 0;
                text-indent: 25px;
                border-bottom: 1px solid #888888;
                border-right: 1px solid #888888;
            }

            .nav-bar {
                display: block;
            }


        }

        @media screen and (max-width: 480px) {

            .menu {
                display: block;
                padding: 20px 0 40px 0;
                border-bottom: 1px solid #fff;
            }

            #text {
                margin: 0 0 0 20px;
            }

            #image {
                margin: 0 30px 0 0;
            }

            .nav-bar {
                display: none;
            }

            .nav-bar {
                font-size: 0.8em;
            }


        }
    </style>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">


        <div class="backend-root">
            <header>

            </header>


            <div class="wrapper">
                <div class="nav-bar-area">
                    <div class="menu">
                        <div id="text">Menu</div>
                        {{-- <div id="image"><img src="http://www.rcunlocks.com/IMG_0468.PNG" /></div> --}}
                    </div>
                    <div class="nav-bar">
                        <ul>
                            <a href="{{ route('show_status_order', ['status' => 'waiting']) }}">
                                <li>Waiting</li>
                            </a>
                            <a href="{{ route('show_status_order', ['status' => 'processing']) }}">
                                <li>Processing</li>
                            </a>
                            <a href="{{ route('show_status_order', ['status' => 'delivering']) }}">
                                <li>Delivering</li>
                            </a>
                            <a href="{{ route('show_status_order', ['status' => 'delivered']) }}">
                                <li>Delivered</li>
                            </a>
                        </ul>

                    </div>
                </div>
            </div>




            <div class="container">

                @foreach ($orders as $order)
                    <a class="card2" href="{{ route('details_order', $order->id) }}">

                        <h3>User Name: {{ $order->user->name }}</h3>
                        {{-- <p> {{ $order->orderDetails }}</p> --}}
                        <p>Total Price: {{ $order->total_price }} $</p>
                        {{-- <p>Colour: {{ $order->deliveryCompanyAddress }} --}}
                        <div class="go-corner" href="">
                            <div class="go-arrow">
                                →
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>








            <footer>
                <div class="footer-section">
                    <div class="footer-content">
                        <div class="footer-container msh-power">
                            <div class="footer-text"
                                style="display: flex;
                            justify-content: center;
                            align-items: center;
                            flex-wrap: wrap;
                            text-align: center;
                            margin-top: 20px;padding-bottom: 20px">
                                <span style="margin: 0;
                                font-size: 16px;color:#fff">
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    All rights reserved to Click 2 Buy | This Website Is Made By
                                    <a href="{{ route('ourteam') }}" target="" style="color: rgb(228, 49, 49)"
                                        style="font-size: 16px;
                                    margin-left: 5px;
                                    margin-right: 5px;">Our
                                        Team</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script>
            $(document).ready(function() {
                $("#image").click(function() {
                    $(".nav-bar").slideToggle("swing");

                });

                $(window).resize(function() {
                    var w = $(window).width();
                    var navBar = $(".nav-bar");
                    if (w > 320 & navBar.is(":hidden")) {
                        navBar.removeAttr("style");
                    }

                });

            });
        </script>
</body>



</html>
