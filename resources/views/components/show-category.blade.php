@props(['category'])

<ul style="float: left; padding-top: 10px; padding-right: 6%; font-size: 17px;line-height: 2;">
    {{ $category->name }}

    @foreach ($category->children as $child)
    <li style="margin-left: 50px; ">
        <x-show-category :category="$child" />
        
    </li>
    @endforeach
</ul>