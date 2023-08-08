<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit PRoduct Click 2 buy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        /*START GENERAL CSS FOR BACKEND*/
        @import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css";
        @import url(//fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,900italic);

        * {
            font-family: Lato;
        }

        body {
            font-size: 16px;
            background: #f3f3f3;
            margin: 1px 0px 0px 0px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            letter-spacing: -0.035em;
            margin: 0px 0px 10px 0px;
        }

        h1 {
            font-size: 2.5em;
        }

        h2 {
            font-size: 1.8em;
        }

        h3 {
            font-size: 1.5em;
        }

        .input-quantity{
            appearance: none;
            background-color: #4b385a;
            border-color: #fff;
            border-width: 1px;
            border-radius: 20px;
            padding-top: 0.5rem;
            padding-right: 0.75rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5rem;
            --tw-shadow: 0 0 #0000;
            width: 100%;
        }

        img,
        p,
        a {
            margin: 0px;
        }

        a {
            color: #f44236;
            text-decoration: none;
        }

        a:hover,
        a:focus,
        a:active {
            color: #949494 !important;
        }

        button {
            font-size: 0.8em;
            text-transform: uppercase;
            padding: 5px 10px;
            margin: 0px;
            background: #f3f3f3;
            border: 1px solid rgba(0, 0, 0, .12);
            border-radius: 5px;
        }

        button:hover {
            cursor: pointer;
        }

        .header-content,
        .body-content,
        .footer-content {
            height: auto;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header-section {
            background: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, .12);
            height: auto;
            padding: 18px 0px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .platform-logo {
            width: auto;
            max-width: 250px;
            height: auto;
            max-height: 50px;
        }

        .header-nav .nav-icon {
            color: #414141;
            font-size: 1.5em;
            margin: 0px 8px;
        }

        .header-nav .nav-icon:hover {
            color: #f44236;
        }

        .body-root {
            min-height: 85.3vh;
        }

        .body-section {
            padding: 25px 0px;
        }

        .body-content {
            display: flex;
        }

        .sidebar {
            width: 27%;
            min-width: 200px;
            height: auto;
        }

        .main {
            width: 73%;
            height: auto;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            padding-top: 5px;
        }

        .sidebar-menu .menu-item {
            color: #414141;
            font-size: 1em;
            font-weight: 700;
            text-transform: uppercase;
            width: auto;
            max-width: 180px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            color: white
        }

        .sidebar-menu .menu-icon {
            font-size: 1.2em;
            text-align: center;
            width: 35px;
            margin-right: 12px;
        }

        .main-container {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, .12);
            border-radius: 5px;
            padding: 25px 30px;
            margin-bottom: 15px;
        }

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

        .hover-image{
            position: relative;
            top: -11%;
            left: -37%;
            width: 250px;
            height: auto;
        }

        .msh-logo {
            width: auto;
            max-width: 150px;
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.6em;
            }

            h3 {
                font-size: 1.3em;
            }

            button {
                font-size: 0.9em;
            }

            .header-content {
                justify-content: center;
            }

            .platform-logo {
                max-width: 225px;
            }

            .header-nav {
                display: none;
            }

            .body-root {
                min-height: 74.5vh;
            }

            .body-section {
                padding: 15px 0px;
            }

            .body-content {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .main {
                width: 100%;
            }

            .sidebar-menu {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
                padding-bottom: 2px;
            }

            .sidebar-menu .menu-item {
                width: 48%;
                margin-bottom: 15px;
            }

            .sidebar-menu .menu-icon {
                margin-right: 6px;
            }

            .main-container {
                padding: 15px 20px;
                margin: 0px -16px 15px;
                border-radius: 0px;
            }
        }

        /*END GENERAL CSS FOR BACKEND*/
        /*START CSS FOR CREATE BLOG PAGE*/
        form {
            padding-top: 10px;
        }

        label {
            display: block;
            font-size: 17px;
            padding-bottom: 5px;
        }

        input,
        textarea,
        select {
            font-size: 0.9em;
            width: 100%;
            margin: 0;
            padding: 10px 8px;
            box-sizing: border-box;
            border: 1px solid rgba(0, 0, 0, .12);
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        input,
        select {
            height: 40px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
        }

        .form-field {
            margin-bottom: 14px;
        }

        .form-field.short input,
        .form-field.short select,
        .form-field.short textarea {
            max-width: 250px;
        }

        .form-field.medium input,
        .form-field.medium select,
        .form-field.medium textarea {
            max-width: 450px;
        }

        input[type="checkbox"] {
            height: 20px;
            width: 20px;
        }

        .form-field.checkbox {
            display: flex;
        }

        .form-field.checkbox label {
            padding: 1px 0px 0px 3px;
        }

        input[readonly] {
            background: #f3f3f3;
        }

        button.publish,
        button.update {
            background: black;
            border-color: black;
            color: white;
        }

        .new-post-actions,
        .edit-post-actions {
            display: flex;
            margin-top: 25px;
        }

        .new-post-actions button,
        .edit-post-actions button {
            font-size: 0.9em;
            height: 40px;
            padding: 5px 15px;
            margin-right: 6px;
        }

        .checkbox-group {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .title {
            order: 1;
        }

        .form {
            order: 2;
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


        /* .text-editor {
            width: 60%;
            height: 100%;
        }

        .text-editor textarea {
            width: 100%;
            height: 100%;
        } */

        /*END CSS FOR CREATE BLOG PAGE*/
    </style>

    <style>
        label {
            color: white
        }

        .image-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0;
        }

        .image-grid img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .image-grid div {
            flex: 0 0 calc(25% - 10px);
            margin-bottom: 20px;
            margin-right: 10px;
            margin-left: 10px;
        }

        table {
            border-collapse: collapse;
            text-align: left;
            width: 100%;
        }

        th {
            border: 2px solid #fff;
            padding: 8px;
            color: white
        }

        td {
            border: 2px solid #fff;
            padding: 8px;
            color: black
        }

        label {
            /* display: inline-block;
            width: 100px; */
            /* color: white */
        }

        input[type="text"] {
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        #probabilities {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            /* color: white */
        }

        .checkbox-group {
            display: inline-block;
            margin-top: 10px;
        }

        .checkbox-group label {
            display: block;
        }

        .checkbox-group input[type=checkbox] {
            display: inline-block;
            margin-right: 5px;
        }

        .checkbox-group {
            display: flex;
            flex-direction: row;
        }

        .checkbox-group label {
            margin-right: 10px;
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
            <div class="body-root">
                <div class="body-section">
                    <div class="body-content">
                        <div class="sidebar">
                            <div class="sidebar-content"
                                style="background-color: #2e3847;
                            border-radius: 8px;
                            padding: 22px;
                            box-shadow: white 3px 3px 6px;
                            margin: 27px;">
                                <div class="sidebar-container sidebar-menu">
                                    <a href="{{ route('dashboard') }}" class="menu-item"><i
                                            class="fas fa-home menu-icon"></i>Dashboard</a>
                                    <a href="#" class="menu-item"><i class="fas fa-bolt menu-icon"></i>Create</a>
                                    <a href="#" class="menu-item"><i
                                            class="fas fa-folder menu-icon"></i>Content</a>
                                    <a href="#" class="menu-item"><i
                                            class="fas fa-comments menu-icon"></i>Community</a>
                                    <a href="#" class="menu-item"><i class="fas fa-trophy menu-icon"></i>Pro</a>
                                    <a href="#" class="menu-item"><i class="fas fa-tag menu-icon"></i>Shop</a>
                                    <a href="#" class="menu-item"><i
                                            class="fas fa-chart-area menu-icon"></i>Analytics</a>
                                    <a href="#" class="menu-item"><i class="fas fa-cog menu-icon"></i>Settings</a>
                                </div>
                            </div>

                        </div>
                        <div class="main">
                            <a href="{{ route('pageAddProduct') }}" style="color: #fff"><button class="button add">add
                                    new product</button></a>
                            <div class="main-content">
                                <div>
                                    <div class="new-post-form product">
                                        <form id="update_p" class="new-product-form" action="{{ route('editProduct', $product->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="container">
                                                <div class="title">
                                                    <h2 style="color: white"><i>Edit product</i> </h2>
                                                </div>
                                                <div class="form">
                                                    <div class="form-field field-8 short"
                                                        style="background-color: #2e3847;
                                                    border-radius: 8px;
                                                    padding: 18px;
                                                    box-shadow: white 3px 3px 6px;
                                                    margin: 15px;">
                                                        <label for="status">Product Status</label>
                                                        <select id="status" name="status">
                                                            <option value="1" class="option"
                                                                {{ $product->status == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                            <option value="0" class="option"
                                                                {{ $product->status == 0 ? 'selected' : '' }}>Draft
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-field field-1 medium"
                                                style="background-color: #2e3847;
                                        border-radius: 8px;padding: 22px;box-shadow: white 3px 3px 6px;">
                                                <label for="titel">Title : </label>
                                                <input id="titel" type="text" name="titel" placeholder="Title"
                                                    style="max-width: 100%;border-radius: 8px;"
                                                    value="{{ $product->titel }}">
                                            </div>

                                            <div class="form-field field-4 medium"
                                                style="background-color: #2e3847;
                                    border-radius: 8px;padding: 22px;box-shadow: white 3px 3px 6px;">
                                                <label for="descraption"> Description</label>
                                                <textarea id="descraption" type="text" rows="2" name="descraption" placeholder="Description"
                                                    style="max-width: 100%;border-radius: 8px;"> {!! $product->descraption !!}</textarea>
                                            </div>
                                            
                                            <div class="form-field field-4 medium"
                                                style="background-color: #2e3847;
                                    border-radius: 8px;padding: 22px;box-shadow: white 3px 3px 6px;">
                                                <label for="category_id">Category:</label>
                                                <select id="category_id" name="category_id" style="border-radius: 8px;">
                                                    @foreach ($category as $cat)
                                                        
                                                            
                                                            @if (count($cat->children) > 0)
                                                                <optgroup label="{{ $cat->name }}" style="font-size: 25px">
                                                                    @foreach ($cat->children as $child)
                                                                        @if (count($child->children) > 0)
                                                                            <optgroup label="&#9679;&nbsp;{{ $child->name }}" >
                                                                                @foreach ($child->children as $subchild)
                                                                                    @if (count($subchild->children) > 0)
                                                                                        <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $subchild->name }}">
                                                                                            @foreach ($subchild->children as $sub2child)
                                                                                                @if (count($sub2child->children) > 0)
                                                                                                    <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $sub2child->name }}">
                                                                                                        @foreach ($sub2child->children as $sub3child)
                                                                                                            @if (count($sub3child->children) > 0)
                                                                                                                <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $sub3child->name }}">
                                                                                                                    @foreach ($sub3child->children as $sub4child)
                                                                                                                        @if (count($sub4child->children) > 0)
                                                                                                                            <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $sub4child->name }}">
                                                                                                                                @foreach ($sub4child->children as $sub5child)
                                                                                                                                    <option value="{{ $sub5child->id }}" @if ($product->category_id == $sub5child->id) selected @endif class="option">
                                                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $sub5child->name }}
                                                                                                                                    </option>
                                                                                                                                @endforeach
                                                                                                                            </optgroup>
                                                                                                                        @else
                                                                                                                            <option value="{{ $sub4child->id }}" @if ($product->category_id == $sub4child->id) selected @endif class="option">
                                                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $sub4child->name }}
                                                                                                                            </option>
                                                                                                                        @endif
                                                                                                                    @endforeach
                                                                                                                </optgroup>
                                                                                                            @else
                                                                                                                <option value="{{ $sub3child->id }}" @if ($product->category_id == $sub3child->id) selected @endif class="option">
                                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $sub3child->name }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </optgroup>
                                                                                                @else
                                                                                                    <option value="{{ $sub2child->id }}" @if ($product->category_id == $sub2child->id) selected @endif class="option">
                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $sub2child->name }}
                                                                                                    </option>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </optgroup>
                                                                                    @else
                                                                                        <option value="{{ $subchild->id }}" @if ($product->category_id == $subchild->id) selected @endif class="option">
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;{{ $subchild->name }}
                                                                                        </option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @else
                                                                            <option value="{{ $child->id }}" @if ($product->category_id == $child->id) selected @endif class="option">
                                                                                &#9679;&nbsp;{{ $child->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </optgroup>
                                                            @else
                                                            <option value="{{ $cat->id }}" class="option"
                                                                @if ($product->category_id == $cat->id) selected @endif style="font-size:20px">
                                                               {{ $cat->name }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <label for="brand">Brand:</label>
                                                <input type="text" id="brand" name="brand" list="brands"
                                                    placeholder="Brand" value="{{ $brand_product }}"
                                                    style="border-radius: 8px;">
                                                <datalist id="brands">
                                                    @foreach ($brand as $brand)
                                                        <option value="{{ $brand->name }}">
                                                    @endforeach
                                                </datalist>
                                            </div>



                                            <div class="form-field field-2 medium"
                                                style="background-color: #2e3847;
                                                border-radius: 8px;padding: 22px;box-shadow: white 3px 3px 6px;">
                                                <h3 style="padding: 10px;color:white">To enter more than one adjective,
                                                    please put a
                                                    comma (,) </h3>
                                                <label for="colors">Colors:</label>
                                                <input type="text" id="colors" name="colors" list="colors"
                                                    placeholder="Colors" style="border-radius: 8px;"
                                                    value="@foreach ($colours as $colour){{$colour->name}}@if (!$loop->last),@endif @endforeach">
                                                <datalist id="Colors">
                                                    @if ($colours->count() > 0)
                                                        @foreach ($colours as $colour)
                                                            <option value="{{ $colour->name }}">
                                                        @endforeach
                                                    @endif
                                                </datalist>

                                                <label for="materials">Materials:</label>
                                                <input type="text" id="materials" name="materials" placeholder="Materials" style="border-radius: 8px;"
                                                value="@foreach($materials as $material){{$material->name}}@if(!$loop->last),@endif @endforeach">

                                                <div class="checkbox-group">
                                                    <label for="sizes">Sizes:</label><br>
                                                    @foreach ($size as $size)
                                                        @php
                                                            $isChecked = false;
                                                            foreach ($productsInventory as $inventory) {
                                                                if ($inventory->size_id == $size->id) {
                                                                    $isChecked = true;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                        <input type="checkbox" name="sizes[]" value="{{ $size->size }}" @if ($isChecked) checked @endif>{{ $size->size }}<br>
                                                    @endforeach
                                                </div>

                                                <div><button type="button" id="generate" onclick="generatePossibilities()" class="button" >Generate Possibilities</button></div>
                                                <br><br>
                                                <table id="possibilities-table" for="possibilities">
                                                    <thead>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th>Material</th>
                                                            <th>Size</th>
                                                            <th>Image</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="first_body">
                                                        @foreach ($productsInventory as $inventory)
                                                            <tr id="inventory_{{$inventory->id}}">
                                                                <th>{{$inventory->colour}}</th>
                                                                <th>{{$inventory->material}}</th>
                                                                <th>{{$inventory->size}}</th>
                                                                <th><img src="{{asset('image/delete.png')}}" alt="not avalible" style="width:150px"><input type="file"></th>
                                                                <th><input class="input-quantity" type="number" value="{{$inventory->price}}"></th>
                                                                <th><input class="input-quantity" type="number" value="{{$inventory->quantity}}"></th>
                                                                <th><button type="button" onclick="delete_inventory({{$inventory->id}})"> <img src="{{asset('image/delete.png')}}" alt="delete" style="width:20px"></button>
                                                                    <button type="button" onclick="update_inventory({{$inventory->id}})"> <img src="{{asset('image/edit.png')}}" alt="delete" style="width:20px"></button></th>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <input id="asset_path" type="hidden" value="{{asset("/")}}">
                                                    <tbody id="second_body" style="background-color: #277929">
                                                    </tbody>                           
                                                </table>
                                                <div class="hover-image">
                                                    <img src="{{asset("image/plus.png")}}" alt="">
                                                </div> 
                                            </div>

                                            <div class="form-field field-5 short"
                                                style="background-color: #2e3847;
                                                border-radius: 8px;padding: 22px;
                                                box-shadow: white 3px 3px 6px;">
                                                <label for="photos"> Images:</label>
                                                <input id="photos" type="file" name="photos[]" multiple>
                                                <div id="preview"></div>
                                                <div class="slider">
                                                    @foreach ($photos as $photo)
                                                        <div>
                                                            <img src="{{ asset('storage/'. $photo) }}"
                                                                alt="product image" style="width: 40%">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>



                                            <div class="form-field field-2 medium"
                                                style="background-color: #2e3847;
                                            border-radius: 8px;padding: 22px;box-shadow: white 3px 3px 6px;">
                                                <label for="offer">Offer:</label>
                                                <input type="number" id="offer" name="offer" min="1"
                                                    max="" step="1" placeholder="Offer"
                                                    style="border-radius: 8px;" value="{{$offer}}">
                                                <span class="percent-symbol" style="color: white">%</span>
                                            </div>

                                            <div class="form-field field-2 medium"
                                                style="background-color: #2e3847;
                                                border-radius: 8px;
                                                padding: 22px;
                                                box-shadow: white 3px 3px 6px;">
                                                <label for="row_id">Show In Row:</label>
                                                <select id="row_id" name="row_id" style="border-radius: 8px;">
                                                    @if (empty($row_product->row_id))
                                                        <option value="none" >none</option>

                                                        @foreach ($rows as $row)
                                                            <option value="{{$row->id}}">{{$row->title}}</option>
                                                        @endforeach
 
                                                    @else
                                                        <option value="none">none</option>

                                                        @foreach ($rows as $row)
                                                            <option value="{{$row->id}}" @if ($row->id == $row_product->row_id && $row_product->product_id == $product->id) selected @endif>{{$row->title}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>

                                            <div>
                                                <button type="submit" id="submit" class="button add">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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


{{-- to make rich text descraption --}}
<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#descraption',
        height: 200,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
<script>
    tinymce.init({
        selector: '#product-description'
    });
</script>

<script>
    function previewImages() {
        var preview = document.querySelector('#preview');
        var files = document.querySelector('input[type=file]').files;

        preview.innerHTML = '';
        if (files) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function() {
                    var image = new Image();
                    image.src = reader.result;
                    preview.appendChild(image);
                }

                reader.readAsDataURL(file);
            }
        }
    }

    document.querySelector('#photos').addEventListener('change', previewImages);

    $('.slider').slick({
        arrows: true,
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
</script>

{{-- generateing posipilities script  , Your UNCLE AHED-ooof--}}
<script>
    var possibilities = [];
    var assets_path = document.getElementById("asset_path").value;
    const selections = document.getElementById('selections')
    //var taken_options = {{json_encode($productsInventory)}}

    function check_if_option_not_taken(option){
        var table = document.getElementById('first_body');
        let R =true;
        for (let index = 0; index < table.rows.length; index++) {
            if(
            table.rows[index].cells[0].innerHTML == option.color &&
            table.rows[index].cells[1].innerHTML == option.material &&
            table.rows[index].cells[2].innerHTML == option.size
            ){
                R=false
                break;
            }
        }
        return R;
    }

    function generatePossibilities() {
        // Get user input
        var colors = document.getElementById("colors").value.split(",");
        var materials = document.getElementById("materials").value.split(",");
        var sizes = [];
        var checkboxes = document.getElementsByName("sizes[]");
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                sizes.push(checkboxes[i].value);
            }
        }

        // Generate possibilities
       
       for (var i = 0; i < colors.length; i++) {
           for (var j = 0; j < materials.length; j++) {
               for (var k = 0; k < sizes.length; k++) {
                   var possibility = {
                       color: colors[i],
                       material: materials[j],
                       size: sizes[k],
                       price: 0,
                       quantity: 0
                   };
       
                   var exists = possibilities.some(function (existingPossibility) {
                       return existingPossibility.color === possibility.color &&
                           existingPossibility.material === possibility.material &&
                           existingPossibility.size === possibility.size;
                   });
       
                   if (!exists && check_if_option_not_taken(possibility)) {
                       possibilities.push(possibility);
                   }
               }
           }
       }

        // Add possibilities to main array
        alert(possibilities)

        // Display possibilities in table
        var table = document.getElementById("second_body")
        table.innerHTML = "";
        for (var i = 0; i < possibilities.length; i++) {
            var possibility = possibilities[i];
            var row = table.insertRow();
            row.id="row"+i;
            var colorCell = row.insertCell(0);
            var materialCell = row.insertCell(1);
            var sizeCell = row.insertCell(2);
            var imageCell = row.insertCell(3);
            var priceCell = row.insertCell(4);
            var quantityCell = row.insertCell(5);
            var actionCell = row.insertCell(6);
            colorCell.innerHTML = possibility.color;
            materialCell.innerHTML = possibility.material;
            sizeCell.innerHTML = possibility.size;
            imageCell,innerHTML="<input type='file'>";
            priceCell.innerHTML = "<input type='number' min='0' value='0' onchange='updatePrice(" + i +
                ", this.value)'>";
            quantityCell.innerHTML = "<input type='number' min='0' value='0' onchange='updateQuantity(" + i +
                ", this.value)'>";
            actionCell.innerHTML = "<button type='button' onclick='deletePossibility("+ i +")'><img src='"+assets_path+"image/delete.png' style='width:20px' alt='Remove'></button>"
                                  +"<button type='button' onclick='add_inventory("+ i +")'><img src='"+assets_path+"image/plus.png' style='width:20px' alt='ADD'></button>";
        }

        //const selections = document.getElementById('selections')
        selections.value=possibilities;
    }

    function updatePrice(index, value) {
        possibilities[index].price = parseFloat(value);
    }

    function updateQuantity(index, value) {
        possibilities[index].quantity = parseInt(value);
    }
    
    
    function deletePossibility(index) {
        
        // Perform your desired action here
        
        // Get table and row
        var table = document.getElementById("second_body");
        // var row = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr")[index];

        // // Check if row is locked
        // if (row.getAttribute("data-locked") === "true") {
        //     alert("Cannot delete a locked possibility.");
        //     return;
        // }

        // Remove possibility from array
        possibilities.splice(index, 1);

        //const selections = document.getElementById('selections')
        //selections.value=possibilities;

        var row = document.getElementById("row"+index)
        // Remove row from table
        row.remove(row)
        //table.deleteRow(index);
    }


    function saveProduct() {
        var possibilities = generatePossibilities(); // توليد المصفوفة

        // قم باسترداد بيانات النموذج
        var formData = new FormData($(".new-product-form")[0]);

        // أضف المصفوفة المتولدة إلى بيان البيانات
        //formData.append("possibilities", JSON.stringify(possibilities));

        // إرسال طلب HTTP POST باستخدام AJAX
        $.ajax({
            type: "POST",
            url: "{{ route('creatProduct') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                alert("Product saved successfully.");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error saving product: " + errorThrown);
            }
        });
    }
</script>

{{--  save product script    , Your UNCLE AHED-ooof --}}
<script>
    // Assuming you have a form with id "myForm" and an array called "dataArray"
    const form = document.getElementById('update_p');
    
    form.addEventListener('submit', (event) => {
      event.preventDefault(); // Prevent default form submission
    
      const formData = new FormData(form); // Get form data
    
      // Append array data to form data
      formData.append('possibilities', JSON.stringify(possibilities));
    
     // Get reference to the submit button
     const submitButton = document.getElementById('submit');
     
     // Update button text to "Loading" on form submission
     submitButton.innerText = 'Loading...';
     
     // Send AJAX request
     fetch('{{route("editProduct",$product->id)}}', {
       method: 'POST',
       body: formData,
     })
       .then(response => response.json())
       .then(data => {
         // Handle the response from the server
         alert(data.message);
     
         // Revert button text after receiving response
         submitButton.innerText = 'Save';
       })
       .catch(error => {
         // Handle any errors
         alert(error);
     
         // Revert button text on error
         submitButton.innerText = 'Save';
       });
     });
</script>
 
 {{-- inventory operations script  , Your UNCLE AHED-ooof --}}
 <script>
    function delete_inventory(id){
        // Send AJAX request
        fetch('{{asset("/deleteInventory/")}}'+'/'+id, {
        method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            alert(data.message);
        })
        .catch(error => {
            // Handle any errors
            alert(error);
        });
    }

    function add_inventory(index){

        var row = document.getElementById("row"+index)
        // Send AJAX request
        fetch('{{asset("/addInventory-To-Product/")}}'+'/'+"{{$product->id}}", {
            method: 'POST',
            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            },
            body: JSON.stringify({"option":possibilities[index]})
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                alert(data.message);
                var table = document.getElementById('first_body');
                var possibility_row = document.getElementById('row'+index);
                    possibility_row.remove(possibility_row)
                var possibility = possibilities[index];
                var row = table.insertRow();
                row.style.color="white";
                var colorCell = row.insertCell(0);
                var materialCell = row.insertCell(1);
                var sizeCell = row.insertCell(2);
                var priceCell = row.insertCell(3);
                var quantityCell = row.insertCell(4);
                var actionCell = row.insertCell(5);
                colorCell.innerHTML = possibility.color;
                materialCell.innerHTML = possibility.material;
                sizeCell.innerHTML = possibility.size;
                priceCell.innerHTML="<input type='number' value='"+possibility.price+"'>";
                quantityCell.innerHTML="<input type='number' value='"+possibility.quantity+"'>";
                actionCell.innerHTML = "<button type='button' onclick='delete_inventory("+ data.id +")'><img src='"+assets_path+"image/delete.png' style='width:20px' alt='Remove'></button>";

            })
            .catch(error => {
                // Handle any errors
                alert(error);
            });
    }

    function update_inventory(id) {
        // Send AJAX request
        var trElement = document.getElementById("inventory_"+id);
        var inputElements = trElement.getElementsByTagName("input");

        // Access the values of input elements
        var price = inputElements[0].value;
        var quantity = inputElements[1].value;

        formData =new FormData();
        // Image_file = $('#image')[0].files[0];

        alert("q "+quantity +" p "+price)
        //formData.append('image',Image_file);
        formData.append('price',price);
        formData.append('quantity',quantity);


        fetch('{{asset("/updateInventory-Of-Product/")}}'+'/'+id, {
            method: 'POST',
            headers:{
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            },
            body:formData
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                alert(data.message)
            })
            .catch(error => {
                // Handle any errors
                alert(error);
            });
    }
</script>


</html>
