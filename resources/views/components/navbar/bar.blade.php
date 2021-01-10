@props(['logo','names','icons','destinations'])

@php
    $icons=explode(' ',$icons);
    $destinations=explode(' ',$destinations);
    $names=explode(' ',$names);
    $size=min(count($destinations),count($icons),count($names));
@endphp

<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                {{--LOGO--}}
                <div class="flex-shrink-0 flex ">
                    <a class="inline-flex items-center px-1 pt-1 text-3xl font-medium leading-5 text-blue-500">{{$logo}}</a>
                </div>

                {{--LINKS--}}
                <div class="hidden space-x-8 sm:-my-px px-20 sm:ml-10 sm:flex">

                    @for( $i=0;$i<$size;$i++)
                        <x-navbar.link :destination="(empty( $destinations[$i] ))?'events.index':$destinations[$i]"
                                       :icon="(empty( $icons[$i] ))?'view-list':$icons[$i]" >
                            {{ __(empty($names[$i]))?'Link':$names[$i] }}
                        </x-navbar.link>
                    @endfor

                </div>
            </div>

            {{--DROPDOWNMENU--}}

        </div>
    </div>
</nav>
