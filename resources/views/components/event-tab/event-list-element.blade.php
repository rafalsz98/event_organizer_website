@props(['event'])
@php

@endphp

<section class="flex flex-row flex-wrap font-mono">

    <div style="width: 50%; "  class="transition-all duration-150 flex bg-gray-50 bg-white rounded-lg shadow">

        <div style="float:left; width:50%; display: flex; align-items: center; ">
            <x-gallery :event="$event" />
        </div>

        <div class=" w-full items-stretch min-h-full pb-2 mb-1 transition-all duration-150 ">

            <div style="margin-top: 20px; " class="items-center flex-1 px-4   mx-auto">
                <p class="self-end text-xl font-bold tracking-normal text-gray-800">{{$event->name}}</p>

                <p class="flex flex-row flex-wrap w-full  text-sm text-gray-700">
                    Date: {{$event->datestart->format('d.m.Y')}}, time: {{$event->datestart->format('H:i')}}
                </p>

                <p class="flex flex-row flex-wrap w-full text-sm text-justify text-gray-700">
                    Place: {{$event->place}}
                </p>

                <hr style="margin: 5px;" class="border-gray-300" />
            </div>

            <div class="w-full px-4 py-1 overflow-auto text-sm text-justify text-gray-700">

                <div class="w-full">
                    {{$event->describe}}
                </div>

                <hr style="margin: 5px;"  class="border-gray-300" />

                <div   class="flex flex-row w-full">
                    <p class="px-2">{{$event->current_participants}}/{{$event->max_participants}} participants,</p>
                    <p class="px-2">price: {{$event->price}} pln</p>

                </div>

            </div>

        </div>
    </div>
</section>
