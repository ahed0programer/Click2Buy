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

        




    </style>
</head>

<body>
    @include('layouts.navigation')


    <div class="page">
        <div style="margin: 20px;">

            <form class="new-row-form" action="{{ route('create_size') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="sidebar">
                    <div class="form_form">
                        <h3 class="h3">add new size</h3>
                        <label for="size">size:</label>
                        <input id="size" type="text" name="size" placeholder="size">
                        <button type="submit" class="button add" style="margin-top: 12px;">Add</button>

                    </div>

                </div>
            </form>
        </div>


        <ul>
            @foreach ($sizes as $size)
                <li>
                    <form class="new-row-form" action="{{ route('edit_size', $size->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form">
                            <div class="form-group">
                                <label for="size">size :</label>
                                <input id="size" type="text" name="size" placeholder="size"
                                    value="{{ $size->size }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="button add">Save</button>
                                <a href="{{ route('soft_delete_size', $size->id) }}"><img src="image/delete.png"
                                        alt="delete" style="width:30px"></a>
                            </div>
                        </div>
                    </form>
                </li>
            @endforeach
        </ul>
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
