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
        .pagination-links {
            margin-top: 20px;
            text-align: center;
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .button {
            background-color: #2e3847;
            color: white;
            box-shadow: white 1px 1px 4px;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;

        }



        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .active {
            background-color: #4CAF50;
            color: white;
        }

        .draft {
            background-color: #f2f2f2;
            color: #555;
        }

        .page {
            display: flex;
            min-height: 100;
        }

        .sidebar {
            color: white;
            background-color: rgb(17, 30, 50);
            width: 240px;
            padding: 15px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 15px;
            padding: 15px;
            border-bottom: 1px solid rgb(255, 255, 255);
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            border-radius: 6px;
            margin-bottom: 5px;
        }

        .sidebar ul li:not(.active):hover {
            background-color: rgb(152 146 146 / 0.4);
        }

        .sidebar ul li.active {
            background-color: rgb(152 146 146 / 0.2);
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
        }

        .content {
            background-color: rgb(17, 30, 50);
            flex-grow: 1;
            padding: 20px;
        }

        .statistics {
            display: flex;
            justify-content: space-between;
        }

        .statistics .box {
            color: grey;
            padding: 20px;
            background-color: white;
            border-bottom: 3px solid black;
            margin-bottom: 15px;
            height: 100px;
            flex-basis: 24%;
            border-radius: 3px;
        }

        .statistics .box .number {
            font-weight: bold;
            font-size: 30px;
            display: block;
        }

        .statistics .views {
            border-color: rgb(31 41 55);
        }

        .statistics .views .number {
            color: rgb(31 41 55);
            ;
        }

        .statistics .members {
            border-color: #6ca810;
        }

        .statistics .members .number {
            color: green;
        }

        .statistics .comments {
            border-color: rgb(30, 116, 214);
        }

        .statistics .comments .number {
            color: blue;
        }

        .statistics .articles {
            border-color: #rgb(31 41 55);
            ;
        }

        .statistics .articles .number {
            color: rgb(31 41 55);
            ;
        }

        .images {
            display: flex;
            justify-content: space-between;
        }

        .image {
            background-color: white;
            padding: 10px;
            margin-bottom: 15px;
            height: 200px;
            flex-basis: 30%;
        }

        .content .images img {
            height: 180px;
            width: 20px;
        }

        .w50 {
            width: 50px;
        }

        .h50 {
            height: 50px;
        }

        .table {
            display: flex;
            height: 100%;

        }

        .table-product {
            width: 100%;
            margin-bottom: 15px;
            border-spacing: 0px;
            background-color: #2e3847;
            color: white;
            box-shadow: white 3px 3px 6px;
        }

        .table-product thead {
            background-color: rgb(31 41 55);
            ;
            color: white;
        }

        .table-product td {
            padding: 10px;
            text-align: center;

        }

        .table-product thead td {
            font-weight: bold;
        }

        .table-product tbody tr:hover {
            background-color: rgba(27, 41, 63, 0.5);
        }

        .table-product tbody tr {
            border-bottom: rgb(28, 40, 61) solid 3px
        }

        .table-product tfoot td {
            border-top: 1px solid #8080801a;
        }

        .table-product tfoot .total {
            text-align: right;
        }

        .table-product tfoot .total-sold {
            color: rgb(31 41 55);

        }

        .edit {
            background-color: #008CEA;
        }

        .delete {
            background-color: #f44336;
        }

        footer {
            background-color: rgba(40, 49, 64);
            position: absolute;
            bottom: -271px;
            width: 100%;
        }

        #notification-counter {
            float: right;
            margin-right: 29px;
            margin-top: -37px;
        }
    </style>
</head>

<body>
    @include('layouts.navigation')

    <div class="page">
        <div class="sidebar">
            <ul>
                <li class="active" style="box-shadow: white 3px 3px 6px;margin-top: 10px;"><a>Sitting</a>
                </li>

                <li class="active"
                    style="box-shadow: white 3px 3px 6px;width: 85%;margin-reight: auto;margin-top: 20px;">
                    <a href="{{ route('show_order') }}">Order</a>
                    <span id="notification-counter">0</span>
                </li>

                <li class="active"
                    style="box-shadow: white 3px 3px 6px;width: 85%;margin-reight: auto;margin-top: 20px;"><a
                        href="{{ route('showrows') }}">Row Home Page</a></li>

                <li class="active"
                    style="box-shadow: white 3px 3px 6px;width: 85%;margin-reight: auto;margin-top: 20px;"><a
                        href="{{ route('top_bar') }}">Top Bar</a></li>

                <li class="active"
                    style="box-shadow: white 3px 3px 6px;width: 85%;margin-reight: auto;margin-top: 20px;">
                    <a>Category</a>
                </li>

                <li class="active" style="box-shadow: white 3px 3px 6px;width: 75%;margin-reight: auto;"><a
                        href="{{ route('showcategory') }}">Show Category</a></li>

                <li class="active" style="box-shadow: white 3px 3px 6px;width: 75%;margin-reight: auto;"><a
                        href="{{ route('pageaddcategory') }}">Add Category</a></li>

                <li class="active"
                    style="box-shadow: white 3px 3px 6px;width: 85%;margin-reight: auto;margin-top: 20px;"><a
                        href="{{ route('show_size') }}">Size</a></li>

                <li class="active"
                    style="box-shadow: white 3px 3px 6px;width: 85%;margin-reight: auto;margin-top: 20px;"><a
                        href="{{ route('ourteam') }}">Our Team</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="table">
                <table class="table-product">
                    <thead>
                        <tr>
                            <td>Image</td>
                            <td>Title</td>
                            <td>Category</td>
                            <td>Status</td>
                            <td>Option</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $prod)
                            <tr>
                                <td style="display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/'.$prod->photo) }}" alt="photo product" width="60px">
                                </td>
                                <td>{{ $prod->Product->titel }}</td>
                                <td>{{ $prod->Product->category->name }}</td>
                                @if ($prod->Product->status == 1)
                                    <td><span class="status active">Active</span></td>
                                @else
                                    <td><span class="status draft">Draft</span></td>
                                @endif
                                <td>
                                    <button class="">
                                        <i class="fa fa-pencil"></i>
                                        <a href="{{ route('pageEditProduct', $prod->Product->id) }}"><img src="image/edit.png"
                                                alt="edit" style="width:30px"></a>
                                    </button>
                                    <button class="">
                                        <i class="fa fa-trash"></i>
                                        <a href="{{ route('softDeleteProduct', $prod->Product->id) }}"><img
                                                src="{{ asset('image/delete.png') }}" alt="delete"
                                                style="width:30px"></a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                <button class="button add"><a href="{{ route('pageAddProduct') }}"> Add
                                        Product</a></button>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                    
                </table>
               
            </div>
            
            <div class="pagination-links">
                {!! $product->links() !!}
            </div>
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
        // استدعاء العنصر الذي تم إنشاؤه
        const counter = document.getElementById("notification-counter");

        // زيادة العداد الرقمي بمقدار 1 عند وصول الإشعار
        function increaseCounter() {
            let count = parseInt(counter.innerHTML);
            count += 1;
            counter.innerHTML = count.toString();
        }

        // ربط العداد الرقمي بالإشعارات
        // يتم استدعاء increaseCounter() عند وصول الإشعار
        // يتم استخدام setTimeout() لإضافة تأخير إلى زيادة العداد الرقمي
        // يمكن تغيير وقت الانتظار حسب متطلبات المشروع
        $(document).ready(function() {
            // استدعاء increaseCounter() بعد 5 ثوانٍ
            setTimeout(function() {
                increaseCounter();
            }, 5000);
        });
    </script>
</body>

</html>
