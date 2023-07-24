{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Our Team</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        .footer-section {
            background: rgb(31 41 55);
            border-top: 1px solid rgba(27, 41, 63, 0.5);
            height: auto;
            padding: 20px 0px;
        }

        .footer-container.msh-power {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-container.msh-power p {
            font-size: 0.9em;
            text-transform: uppercase;
            padding-right: 7px;
            color: white
        }

        .footer-content {
            height: auto;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0px 15px;
        }
        footer {
  position: absolute;
  bottom: 0;
  width: 100%;
}
    </style>

    <style>
        .testimony-card {
            border-top: 5px solid #4aa5ad;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            max-width: 815px;
            margin: 0 auto;
            padding: 32px 48px;
            color: #fff;
        }

        [type=radio] {
            // display: none;
        }

        #slider {
            height: 35vw;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        #slider label {
            margin: auto;
            width: 60%;
            border-radius: 4px;
            position: absolute;
            left: 0;
            right: 0;
            cursor: pointer;
            transition: transform 0.4s ease;

            .testimony-card {

                .testimony,
                .writer-photo {
                    opacity: 0;
                }
            }
        }

        #s1:checked~#slide4,
        #s2:checked~#slide5,
        #s3:checked~#slide1,
        #s4:checked~#slide2,
        #s5:checked~#slide3 {
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
            transform: translate3d(-30%, 0, -200px);
            background-color: rgba(53, 28, 77, 0.93);
            opacity: .3;
        }

        #s1:checked~#slide5,
        #s2:checked~#slide1,
        #s3:checked~#slide2,
        #s4:checked~#slide3,
        #s5:checked~#slide4 {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3), 0 2px 2px 0 rgba(0, 0, 0, 0.2);
            transform: translate3d(-15%, 0, -100px);
            background-color: rgba(53, 28, 77, 0.93);
            opacity: 0.75;
        }

        #s1:checked~#slide1,
        #s2:checked~#slide2,
        #s3:checked~#slide3,
        #s4:checked~#slide4,
        #s5:checked~#slide5 {
            box-shadow: 0 13px 25px 0 rgba(0, 0, 0, 0.3), 0 11px 7px 0 rgba(0, 0, 0, 0.19);
            transform: translate3d(0, 0, 0);
            background-color: rgba(53, 28, 77, 0.93);

            .testimony-card {
                padding: 46px 46px 34px;

                .testimony,
                .writer-photo {
                    opacity: 1;
                }
            }
        }

        #s1:checked~#slide2,
        #s2:checked~#slide3,
        #s3:checked~#slide4,
        #s4:checked~#slide5,
        #s5:checked~#slide1 {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.3), 0 2px 2px 0 rgba(0, 0, 0, 0.2);
            transform: translate3d(15%, 0, -100px);
            background-color: rgba(53, 28, 77, 0.93);
            opacity: 0.75;
        }

        #s1:checked~#slide3,
        #s2:checked~#slide4,
        #s3:checked~#slide5,
        #s4:checked~#slide1,
        #s5:checked~#slide2 {
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
            transform: translate3d(30%, 0, -200px);
            background-color: rgba(53, 28, 77, 0.93);
            opacity: .3;
        }

        #s1 {
            position: absolute;
            bottom: 43%;
            right: 32%;
            z-index: 100;
        }

        #s2 {
            position: absolute;
            bottom: 43%;
            right: 30%;
            z-index: 100;
        }

        #s3 {
            position: absolute;
            bottom: 43%;
            right: 28%;
            z-index: 100;
        }

        #s4 {
            position: absolute;
            bottom: 43%;
            right: 26%;
            z-index: 100;
        }

        #s5 {
            position: absolute;
            bottom: 43%;
            right: 24%;
            z-index: 100;
        }
        body{
            overflow-y: hidden
        }
        .outeam{
            text-align: center;
            font-size: 50px;
            font-weight: 900;
            font-family: 'initial'
        }
    </style>
</head>

<body>
    @include('layouts.navigation')



    <section class="" >
        <h1 class="outeam"><i>Our Team</i></h1>
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-xs-12">

                    <div id="slider">
                        <input type="radio" name="slider" id="s1" checked>
                        <input type="radio" name="slider" id="s2">
                        <input type="radio" name="slider" id="s3">
                        <input type="radio" name="slider" id="s4">
                        <input type="radio" name="slider" id="s5">
                        <label for="s1" id="slide1">
                            <div class="testimony-card">
                                <div class="row">
                                    
                                    <div class="col-md-4 col-sm-12 align-self-center">
                                        <div class="writer-photo">
                                            <img class="img-fluid"
                                                src="image/fadi.jpg"
                                                alt="writer-photo" draggable="false" style="width: 30%">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="testimony">
                                            <p></p>
                                            <h3 class="italic">Fadi Abo Asali</h3>
                                            <h4><span >Back End Developer</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                        <label for="s2" id="slide2">
                            <div class="testimony-card">
                                <div class="row">
                                    
                                    <div class="col-md-4 col-sm-12 align-self-center">
                                        <div class="writer-photo">
                                            <img class="img-fluid"
                                            src="image/sukare.jpg"
                                            alt="writer-photo" draggable="false" style="width: 20%">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="testimony">
                                            
                                            <h3 class="italic">Abd Al Rahman Al Rukabi Al succari</h3>
                                            <h4><span >Front End Developer</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                        <label for="s3" id="slide3">
                            <div class="testimony-card">
                                <div class="row">
                                    
                                    <div class="col-md-4 col-sm-12 align-self-center">
                                        <div class="writer-photo">
                                            <img class="img-fluid"
                                                src="https://uc.uxpin.com/files/91911/99228/5F8C5D50-DDB6-4F06-AA15-ACB30D8D910D-200w-e3c509.jpeg"
                                                alt="writer-photo" draggable="false">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="testimony">
                                            
                                            <h3 class="italic">Ahed Suliman</h3>
                                            <h4><span >Back End Developer</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                        <label for="s4" id="slide4">
                            <div class="testimony-card">
                                <div class="row">
                                    
                                    <div class="col-md-4 col-sm-12 align-self-center">
                                        <div class="writer-photo">
                                            <img class="img-fluid"
                                                src="https://uc.uxpin.com/files/91911/99228/5F8C5D50-DDB6-4F06-AA15-ACB30D8D910D-200w-e3c509.jpeg"
                                                alt="writer-photo" draggable="false">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="testimony">
                                            
                                            <h3 class="italic">Abd Al Rahman Ahmed Mohsen</h3>
                                            <h4><span >Front End Developer</span></h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </label>
                        <label for="s5" id="slide5">
                            <div class="testimony-card">
                                <div class="row">
                                    
                                    <div class="col-md-4 col-sm-12 align-self-center">
                                        <div class="writer-photo">
                                            <img class="img-fluid"
                                                src="https://uc.uxpin.com/files/91911/99228/5F8C5D50-DDB6-4F06-AA15-ACB30D8D910D-200w-e3c509.jpeg"
                                                alt="writer-photo" draggable="false">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="testimony">
                                            
                                            <h3 class="italic">ARNAUD FERRERI</h3>
                                            <h4><span >Front End Developer</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
</body>

</html>
