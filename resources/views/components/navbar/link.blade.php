@props(['icon','destination','class'])

@php
$active=(request()->routeIs($destination));

$color =( $active ?? false)
            ? 'text-blue-500'
            : 'text-gray-400 hover:text-blue-300 ';
$componentName="icons.".$icon;

@endphp

<a href="{{route($destination)}}" class="{{$class??'flex items-center px-1'}} {{$color}}">
    <x-dynamic-component :component="$componentName" class="flex block h-4 sm:h-5 md:h-6   pr-1 stroke-current fill-current"/>
    {{$slot}}
</a>

