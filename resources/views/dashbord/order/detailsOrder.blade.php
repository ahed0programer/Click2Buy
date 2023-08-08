<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Details Order Click 2 Buy</title>

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

        .product-card-cart-container-inner {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.725rem;
            transition: all 0.5s ease;
            /* Can Be Removed*/
            height: 100%;
            flex-direction: column;
        }

        .product-card-cart,
        .product-card-cart>* {
            transition: all 0.6s ease;
        }

        .product-card-cart {
            display: flex;
            border-radius: 8px;
            box-shadow: 0 7px 25px -10px rgba(0, 0, 0, 0.33);
            width: 502px;
            max-width: 619px;
            height: 240px;
            background-color: #f3f3f3;
            margin-bottom: 20px
        }

        .product-card-cart-link {
            padding: 10px;
        }

        .product-card-cart-link img {
            width: 180px;
            height: 215px;
            object-fit: cover;
            object-position: center 32%;
            border-radius: 8px;
            box-shadow: 0 7px 25px -10px rgba(0, 0, 0, 0.33);
        }

        .product-card-cart-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 7px 25px -10px rgba(0, 0, 0, 0.33);
        }

        .product-card-cart-content>* {
            font-size: 18px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500 !important;
            color: #555555;
            display: flex;
            /*flex-direction: column;*/
            justify-content: space-between;
            row-gap: 0.5rem;
            align-items: center;
            padding: 0.5rem !important;
        }

        @media (max-width: 440px) {

            .product-card-cart-content>* {
                font-size: 17px;
            }

            .product-card-cart {
                flex-direction: column;
                width: 100%;
                height: 100%;
            }

            .product-card-cart-link img {
                width: 100%;
            }

        }

        button {
            margin: 20px;
        }

        .custom-btn {
            width: 130px;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        .btn-5 {
            width: 130px;
            height: 40px;
            line-height: 42px;
            padding: 0;
            border: none;
            background: rgb(255, 27, 0);
            background: linear-gradient(0deg, rgba(255, 27, 0, 1) 0%, rgba(251, 75, 2, 1) 100%);
        }

        .btn-5:hover {
            color: #f0094a;
            background: transparent;
            box-shadow: none;
        }

        .btn-5:before,
        .btn-5:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            height: 2px;
            width: 0;
            background: #f0094a;
            box-shadow:
                -1px -1px 5px 0px #fff,
                7px 7px 20px 0px #0003,
                4px 4px 5px 0px #0002;
            transition: 400ms ease all;
        }

        .btn-5:after {
            right: inherit;
            top: inherit;
            left: 0;
            bottom: 0;
        }

        .btn-5:hover:before,
        .btn-5:hover:after {
            width: 100%;
            transition: 800ms ease all;
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

            <div class="product-card-cart-container">

                <div class="container">

                    <div class="product-card-cart-container-inner mt-4 pt-4">
                        @foreach ($order_details as $order_detail)

                        <div class="product-card-cart">

                            <a href="#" class="product-card-cart-link">
                                <img src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1350&q=80"
                                    alt="">
                            </a>

                                
                            <div class="list-group list-group-flush product-card-cart-content">

                                <div class="product-card-cart-content-name-price list-group-item">
                                    <div class="product-card-cart-content-name">  </div>
                                    <div class="product-card-cart-content-price">
                                        <h4><span class="badge bg-dark"></span></h4>
                                    </div>
                                </div>

                                <div class="product-card-cart-content-size list-group-item">
                                    <div>Brand : </div>
                                    <h5><span class="badge bg-secondary">{{ $order_detail->product->brand->name }}</span></h5>
                                </div>

                                <div class="product-card-cart-content-size list-group-item">
                                    <div>Size : </div>
                                    <h5><span class="badge bg-secondary">{{ $order_detail->Inventory->size->size }}</span></h5>
                                </div>

                                <div class="product-card-cart-content-size list-group-item">
                                    <div>Colour : </div>
                                    <h5><span class="badge bg-secondary">{{ $order_detail->Inventory->colour->name }}</span></h5>
                                </div>

                                <div class="product-card-cart-content-size list-group-item">
                                    <div>Quantity : </div>
                                    <h5><span class="badge bg-secondary">{{ $order_detail->quantity }}</span></h5>
                                </div>

                                <div class="product-card-cart-content-remove list-group-item">
                                    <div class="product-card-cart-this-total"> price : </div>
                                    <p class="btn btn-outline-secondary"> {{ $order_detail->Inventory->price }}$ </p>
                                </div>

                                


                            </div>

                        </div>
                        @endforeach


                        <button class="custom-btn btn-5"><a href="{{ route('processing_order', $order_detail->order_id) }}" class=""
                                style="color: #ffffff">OK</a></button>


                    </div>


                </div>

            </div>










            {{-- <footer>
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
            </footer> --}}
        </div>
</body>



</html>
