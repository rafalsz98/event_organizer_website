@props(['names','icons','destinations'])

@php
    $icons=explode(' ',$icons);
    $destinations=explode(' ',$destinations);
    $names=explode(' ',$names);
    $size=count($destinations);
@endphp


<nav class="bg-white flex justify-between h-10 md:h-12 lg:h-14 xl:h-16 shadow">

    {{--LOGO--}}
    <div class="flex items-center pl-1 sm:pl-5">
        <a class="text-lg md:text-xl lg:text-2xl xl:text-3xl text-blue-500" href="{{route('events.index')}}">{{$slot}}</a>
    </div>

    {{--LINKS--}}
    <div class="flex  justify-center ">

        @for( $i=0;$i<$size;$i++)
            <x-navbar.link :destination="(empty( $destinations[$i] ))?'events.index':$destinations[$i]"
                           :icon="(empty( $icons[$i] ))?'view-list':$icons[$i]"
                           class="flex items-center px-1 sm:px-2 md:px-3 md:px-4 lg:px-5 text-sm md:text-base lg:text-md xl:text-lg">
                {{ __( empty($names[$i])?'suprise':$names[$i]) }}
            </x-navbar.link>
        @endfor

    </div>

    <div class="flex items-center pl-1 sm:pl-5">

        @if(Auth::check())
            <div class="flex items-center pr-1 sm:pr-5">
                <x-dropdown />
{{--                <form method="POST" action="{{ route('logout') }}">--}}
{{--                    @csrf--}}
{{--                    <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>--}}
{{--                </form>--}}
            </div>
        @else
            <a href="{{ route('login') }}" class="pr-1 sm:pr-5 text-gray-400">LOGIN</a>
            <a href="{{ route('register') }}" class=" pr-1 sm:pr-5 text-gray-400">REGISTER</a>
        @endif

    </div>



</nav>
