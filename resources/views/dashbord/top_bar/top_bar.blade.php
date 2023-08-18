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

    <title>Dashbord Click 2 Buy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: rgb(17, 30, 50);
        }

        .page {
            display: grid;
            grid-template-columns: 1fr 3fr;
            height: 100vh;
        }



        .sidebar label {
            margin-bottom: 10px;
        }

        .sidebar input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: rgb(17, 30, 50);
        }

        .title {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .description {
            font-size: 18px;
            line-height: 1.5;
        }

        label {
            color: #fff;

        }

        .form {
            background-color: #2e3847;
            border-radius: 8px;
            padding: 22px;
            box-shadow: white 3px 3px 6px;
            margin: 15px;
        }

        .form {
            justify-content: space-between;
            align-items: center;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            margin-right: 10px;
            width: 100px;
        }

        .form-group input {
            flex: 1;
            max-width: 100%;
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .button {
            padding: 5px 10px;
            margin: 0px;
            background-color: rgb(21, 37, 60);
            border-radius: 5px;
            color: #fff;
            box-shadow: 2px 2px 4px #fff;
            margin-right: 20px;
        }

        .form_form {
            background-color: #2e3847;
            border-radius: 8px;
            padding: 22px;
            box-shadow: white 3px 3px 6px;
        }

        .h3 {
            margin-bottom: 16px;
            color: white;
            font-size: 23px;
            font-weight: bold;
        }

        article,
        aside,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
            margin: 0;
        }



        h1 {
            font-family: sans-serif;
            font-size: 2em;
            margin: 20px 0 0 0;
            text-align: center;
        }

        p {
            padding: 10px 0 0;
            color: #222;
            font-family: sans-serif;
            font-weight: bold;
            text-align: center;
        }

        img {
            display: block;
            width: 200px
        }

        .wrap {
            overflow: hidden;
            width: auto;
            margin: 0 auto;
            padding-top: 20px;
        }

        .tint {
            position: relative;
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            /* box-shadow: rgba(255, 255, 255, 0.2) 3px 5px 5px; */
        }

        .tint:before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            /* background: rgba(73, 87, 87, 0.5); */
            transition: all .3s linear;
        }

        .tint:hover:before {
            background: none;
        }

        .t2:before {
            background: rgba(0, 0, 255, 0.5);
        }

        .t3:before {
            background: rgba(255, 0, 0, 0.5);
        }

        .t4:before {
            background: rgba(0, 255, 0, 0.5);
        }

        .t5:before {
            background: rgba(255, 0, 240, 0.5);
        }

        .t6:before {
            background: rgba(255, 102, 0, 0.6);
        }

        .centered-images {
            display: flex;
            justify-content: center;
            height: 100vh;
        }

        .centered-images .wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .centered-images .tint {
            margin: 10px;
            padding-bottom: 50px
        }

        .pagination-links {
            margin-top: 20px;
            text-align: center;
            padding: 9px;
        }

        .pagination-links ul {
            display: inline-block;
            margin: 0;
            padding: 0;

        }

        .pagination-links li {
            display: inline-block;
            margin: 0 5px;
            padding: 0;

        }

        .pagination-links a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #eee;
            color: #333;
            text-decoration: none;
            border-radius: 3px;

        }

        .pagination-links a:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>
    @include('layouts.navigation')


    <div class="page">
        <div style="margin: 20px;">

            <form class="new-row-form" action="{{ route('add_photo_top_bar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="sidebar">
                    <div class="form-field field-5 short"
                        style="background-color: #2e3847;
                                            border-radius: 8px;padding: 22px;box-shadow: white 3px 3px 6px;">
                        <label for="photos"> Images:</label>
                        <input id="photos" type="file" name="photos[]" multiple>
                        <div id="preview"></div>
                        <button type="submit" class="button add" style="margin-top: 12px;">Add</button>
                    </div>


                </div>
            </form>
        </div>


        <ul class="centered-images">
            <li>
                <div class="wrap">
                    @foreach ($photo_top_bar as $photo)
                        <figure class="tint">
                            <img src="{{ asset('storage/' . $photo->photo) }}" alt="" width="400"
                                height="260" />
                        </figure>
                        <button class="" style="padding-bottom: 16rem;">
                            <a href="{{ route('soft_delete_photo_top_bar', $photo->id) }}"><img
                                    src="{{ asset('image/exit.png') }}" alt="exit" style="width:20px"></a>
                        </button>
                    @endforeach
                </div><!-- .wrap -->

            </li>

        </ul>

    </div>
    <div class="pagination-links">
        {!! $photo_top_bar->links() !!}
    </div>
    <footer style="background-color: rgba(40, 49, 64); padding: 20px; text-align: center;">
        <span style="margin: 0;
                    font-size: 16px;color:#fff">
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            All rights reserved to Click 2 Buy | This Website Is Made By
            <a href="{{ route('ourteam') }}" target=""
                style="color: rgb(228, 49, 49);
                                                          font-size: 16px;
                                                          margin-left: 5px;
                                                          margin-right: 5px;">
                Our Team
            </a>
        </span>
    </footer>


    </div>

</body>

</html>
