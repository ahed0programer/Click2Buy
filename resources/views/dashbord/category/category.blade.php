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

    <title>Category Click 2 Buy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }




        body {
            background-color: rgb(17, 30, 50);
            color: #fff;
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
            line-height: 1;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        h1 {
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        h2 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .container {
            margin: auto;
            width: 940px;
        }

        .ul-reset {
            padding-left: 0;
            margin-top: 0;
            margin-bottom: 0;
            list-style: none;
        }




        nav {
            background: rgb(17, 30, 50);
            ;
            font-size: 0;
            position: relative;
            border-bottom: white solid 2px
        }

        nav>ul>li {
            display: inline-block;
            font-size: 14px;
            padding: 0 15px;
            position: relative;
        }

        nav>ul>li:first-child {
            padding-left: 0;
        }

        nav>ul>li:last-child {
            padding-right: 0;
        }

        nav>ul>li>a {
            color: #fff;
            display: block;
            position: relative;
            padding: 20px 0;
            border-bottom: 3px solid transparent;
        }

        nav>ul>li:hover>a {
            color: #939fa5;
        }




        .mega-menu {
            background: rgba(40, 49, 64, 0.5);
            display: none;
            left: 0;
            position: absolute;
            text-align: left;
            width: 100%;
        }

        .mega-menu h3 {
            color: #444;
        }

        .mega-menu ul {
            float: left;
            width: 205px;
        }

        .mega-menu ul:last-child {
            margin-right: 0;
        }

        .mega-menu a {
            color: #fff;
            display: block;
            padding: 10px 0;
            margin-top: 10px;
        }

        .mega-menu a:hover {
            color: #939fa5;
        }




        .droppable {
            position: static;
        }

        .droppable>a:after {
            content: "\f107";
            font-family: FontAwesome;
            font-size: 12px;
            padding-left: 6px;
            position: relative;
            top: -1px;
        }

        .droppable:hover .mega-menu {
            display: block;
        }


        .cf:before,
        .cf:after {
            content: " ";
            display: table;
        }

        .cf:after {
            clear: both;
        }


        footer {
            background-color: rgba(40, 49, 64, 0.5);
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    @include('layouts.navigation')

    <div class="page">


        {{-- @foreach ($categories as $category)

            <x-show-category :category="$category" />
                
            @endforeach --}}


        <nav>
            <ul class="container ul-reset">

                @foreach ($categories as $category)
                    <li class='droppable'>
                        <a>{{ $category->name }}</a>
                        <button class="">
                            <i class="fa fa-pencil"></i>
                            <a href="{{ route('pageeditcategory', $category->id) }}"><img src="image/edit.png"
                                    alt="edit" style="width:20px"></a>
                        </button>
                        <button class="">
                            <i class="fa fa-trash"></i>
                            <a href="{{ route('softDeleteCategory', $category->id) }}"><img src="image/delete.png"
                                    alt="delete" style="width:20px"></a>
                        </button>
                        <div class='mega-menu'>
                            <div class="container cf">
                                @foreach ($category->children as $child)
                                    <ul class="ul-reset" style=" list-style-type: square;">
                                        <li>
                                            <a>{{ $child->name }}</a>
                                            <button class="">
                                                <i class="fa fa-pencil"></i>
                                                <a href="{{ route('pageeditcategory', $child->id) }}"><img
                                                        src="image/edit.png" alt="edit" style="width:20px"></a>
                                            </button>
                                            <button class="">
                                                <i class="fa fa-trash"></i>
                                                <a href="{{ route('softDeleteCategory', $child->id) }}"><img
                                                        src="image/delete.png" alt="delete" style="width:20px"></a>
                                            </button>
                                        </li>

                                        @foreach ($child->children as $subchild)
                                            <ul class="ul-reset" style="list-style-type: disc;margin-left: 20px">
                                                <li><a>{{ $subchild->name }}</a>
                                                    <button class="">
                                                        <i class="fa fa-pencil"></i>
                                                        <a href="{{ route('pageeditcategory', $subchild->id) }}"><img
                                                                src="image/edit.png" alt="edit" style="width:20px"></a>
                                                    </button>
                                                    <button class="">
                                                        <i class="fa fa-trash"></i>
                                                        <a href="{{ route('softDeleteCategory', $subchild->id) }}"><img
                                                                src="image/delete.png" alt="delete" style="width:20px"></a>
                                                    </button>
                                                </li>

                                                @foreach ($subchild->children as $sub2child)
                                                    <ul class="ul-reset"
                                                        style="list-style-type: circle;margin-left: 40px">
                                                        <li><a>{{ $sub2child->name }}</a>
                                                            <button class="">
                                                                <i class="fa fa-pencil"></i>
                                                                <a href="{{ route('pageeditcategory', $sub2child->id) }}"><img
                                                                        src="image/edit.png" alt="edit" style="width:20px"></a>
                                                            </button>
                                                            <button class="">
                                                                <i class="fa fa-trash"></i>
                                                                <a href="{{ route('softDeleteCategory', $sub2child->id) }}"><img
                                                                        src="image/delete.png" alt="delete" style="width:20px"></a>
                                                            </button>
                                                        </li>

                                                        @foreach ($sub2child->children as $sub3child)
                                                            <ul class="ul-reset"
                                                                style="list-style-type: disc;margin-left: 40px">
                                                                <li><a>{{ $sub3child->name }}</a>
                                                                    <button class="">
                                                                        <i class="fa fa-pencil"></i>
                                                                        <a href="{{ route('pageeditcategory', $sub3child->id) }}"><img
                                                                                src="image/edit.png" alt="edit" style="width:20px"></a>
                                                                    </button>
                                                                    <button class="">
                                                                        <i class="fa fa-trash"></i>
                                                                        <a href="{{ route('softDeleteCategory', $sub3child->id) }}"><img
                                                                                src="image/delete.png" alt="delete" style="width:20px"></a>
                                                                    </button>
                                                                </li>
                                                                @foreach ($sub3child->children as $sub4child)
                                                                    <ul class="ul-reset"
                                                                        style="list-style-type: circle;margin-left: 40px">
                                                                        <li><a>{{ $sub4child->name }}</a>
                                                                            <button class="">
                                                                                <i class="fa fa-pencil"></i>
                                                                                <a href="{{ route('pageeditcategory', $sub4child->id) }}"><img
                                                                                        src="image/edit.png" alt="edit" style="width:20px"></a>
                                                                            </button>
                                                                            <button class="">
                                                                                <i class="fa fa-trash"></i>
                                                                                <a href="{{ route('softDeleteCategory', $sub4child->id) }}"><img
                                                                                        src="image/delete.png" alt="delete" style="width:20px"></a>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </ul>
                                                        @endforeach
                                                    </ul>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </ul>
                                @endforeach

                            </div>
                        </div>
                    </li>
                @endforeach









            </ul><!-- .container .ul-reset -->
        </nav>

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
                        margin: 20px;
                        padding: 20px;">
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
