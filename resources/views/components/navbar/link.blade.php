@props(['icon','destination'])

@php
$active=(request()->routeIs($destination));

$color =( $active ?? false)
            ? 'text-blue-500'
            : 'text-gray-400 hover:text-blue-300 ';
$componentName="icons.".$icon;

@endphp

<a href="{{route($destination)}}" class="inline-flex items-center px-1 pt-1   text-base font-medium leading-5 {{$color}}">
    <x-dynamic-component :component="$componentName" class="block h-10  w-auto"/>
    {{$slot}}
</a>

